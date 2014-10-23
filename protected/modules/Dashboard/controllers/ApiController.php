<?php

class ApiController extends Controller
{
    private $errors = array();
    private $data = array();
    private $body = null;

    private function parseRequest()
    {
        $this->body = json_decode(Yii::app()->request->rawBody);
        return $this->body;
    }

    private function sendResponse()
    {
        header('Content-type: application/json', true, 200);
        echo json_encode([
            'data' => $this->data,
            'errors' => $this->errors
        ]);
        Yii::app()->end();
    }

    public function actionIndex()
    {
        $this->parseRequest();

        if (isset($this->body->{'action'})) {
            $action = $this->body->{'action'};

            $this->data = array(
                'action' => $action
            );
        }
        else {
            $this->errors[] = 'Invalid request';
        }

        $this->sendResponse();
    }

    public function actionAds()
    {
        $this->parseRequest();

        if (isset($this->body->{'action'})) {
            $action = $this->body->{'action'};

            if ($action != 'ads') {
                $this->errors[] = 'Invalid request';
                $this->sendResponse();
            }

            $criteria=new CDbCriteria;
            $criteria->condition = "t.ad_status = 'active'";
            $criteria->order = 't.ad_create_date DESC';

            $model = Ads::model()->findAll($criteria);

            $data = array();
            foreach ($model as $ads) {
                $categories = array();
                if (!empty($ads->categories)) {
                    foreach ($ads->categories as $key => $category) {
                        $categories[] = $category->cate_name;
                    }
                }
                $images = array();
                $image_url = Yii::app()->getBaseUrl(true).'/';
                if (!empty($ads->images)) {
                    foreach ($ads->images as $key => $image) {
                        $images[] = $image_url.$image->img_link;
                    }
                }
                $data[] = array(
                    'id'=>$ads->id,
                    'ad_name'=>$ads->ad_name,
                    'ad_type'=>$ads->ad_type,
                    'ad_link'=>$ads->ad_link,
                    'ad_create_date'=>$ads->ad_create_date,
                    'categories'=>$categories,
                    'images'=>$images
                );
            }

            $this->data = $data;
        }
        else {
            $this->errors[] = 'Invalid request';
        }

        $this->sendResponse();
    }

    public function actionAdsInCategory()
    {
        $this->parseRequest();

        if (isset($this->body->{'action'}) && isset($this->body->{'id'})) {
            $action = $this->body->{'action'};
            $id = $this->body->{'id'};

            if ($action != 'ads') {
                $this->errors[] = 'Invalid request';
                $this->sendResponse();
            }

            $category = Category::model()->findByPk($id);

            if (empty($category)) {
                $this->errors[] = 'Invalid request';
                $this->sendResponse();
            }

            $criteria=new CDbCriteria;
            $criteria->condition = "t.ad_status = 'active'";
            $criteria->order = 't.ad_create_date DESC';
            $criteria->with = array(
                'categories' => array(
                    'condition' => 'categories.id='.$id
                )
            );

            $model = Ads::model()->findAll($criteria);

            $data = array();
            foreach ($model as $ads) {
                $categories = array();
                if (!empty($ads->categories)) {
                    foreach ($ads->categories as $key => $category) {
                        $categories[] = $category->cate_name;
                    }
                }
                $images = array();
                $image_url = Yii::app()->getBaseUrl(true).'/';
                if (!empty($ads->images)) {
                    foreach ($ads->images as $key => $image) {
                        $images[] = $image_url.$image->img_link;
                    }
                }
                $data[] = array(
                    'id'=>$ads->id,
                    'ad_name'=>$ads->ad_name,
                    'ad_type'=>$ads->ad_type,
                    'ad_link'=>$ads->ad_link,
                    'ad_create_date'=>$ads->ad_create_date,
                    'images'=>$images
                );
            }

            $this->data = $data;
        }
        else {
            $this->errors[] = 'Invalid request';
        }

        $this->sendResponse();
    }

    public function actionCategory()
    {
        $this->parseRequest();

        if (isset($this->body->{'action'})) {
            $action = $this->body->{'action'};

            if ($action != 'category') {
                $this->errors[] = 'Invalid request';
                $this->sendResponse();
            }

            $criteria=new CDbCriteria;
            $criteria->condition = "t.cate_status = 'active' AND t.cate_root=0";

            $model = Category::model()->findAll($criteria);

            $data = array();
            foreach ($model as $category) {
                $child_categories = array();
                if (!empty($category->child_categories)) {
                    foreach ($category->child_categories as $key => $child_category) {
                        $child_categories[] = $child_category->cate_name;
                    }
                }
                $data[] = array(
                    'id'=>$category->id,
                    'cate_name'=>$category->cate_name,
                    'child_categories'=>$child_categories
                );
            }

            $this->data = $data;
        }
        else {
            $this->errors[] = 'Invalid request';
        }

        $this->sendResponse();
    }


}