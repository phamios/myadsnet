<?php

class AdsController extends Controller
{
	public function actionIndex()
	{
        $model = new Ads('search');

        $model->unsetAttributes();
        if(isset($_GET['Ads'])) {
            $model->attributes=$_GET['Ads'];
        }

        $this->render('index', array(
            'model'=>$model
        ));
	}

    public function actionCreate()
    {
        $model = new Ads('create');
        $model_category = new AdsCategory('create');
        $list_category = array();



        if (isset($_POST['Ads']) && isset($_POST['AdsCategory'])) {
            $valid=true;
            $model->attributes = $_POST['Ads'];
            $model->ad_create_date = date('Y-m-d H:i:s');

            if (isset($_POST['AdsCategory'])) {
                foreach ($_POST['AdsCategory']['id_category'] as $id_category) {
                    $list_category[$id_category] = array('selected'=>true);
                }
            }

            $images = CUploadedFile::getInstancesByName('Images');

            $list_image = array();
            if (isset($images) && count($images) > 0) {
                foreach ($images as $image => $pic) {
                    $pic_name = time().'_'.strtolower($pic->name);
                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$pic_name)) {
                        $img_add = new Image();
                        $img_add->img_link = $pic_name;
                        if ($img_add->save()) {
                            $list_image[] = $img_add->id;
                        }
                    }
                    else {
                        //handles failed saving image
                    }
                }
            }

            if ($model->validate() && $valid) {
                if ($model->save()) {
                    if (isset($_POST['AdsCategory'])) {
                        foreach ($_POST['AdsCategory']['id_category'] as $id_category) {
                            $adscategory = new AdsCategory();
                            $adscategory->id_ads = $model->id;
                            $adscategory->id_category = $id_category;
                            $adscategory->save();
                        }
                    }
                    foreach ($list_image as $id_image) {
                        $topic_image = new AdsImage();
                        $topic_image->id_ads = $model->id;
                        $topic_image->id_image = $id_image;
                        $topic_image->save();
                    }
                    // Redirect to view page
                    $this->redirect(array('/Dashboard/ads/view', 'id'=>$model->id));
                }
            }
        }

        $this->render('create', array(
            'model'=>$model,
            'model_category'=>$model_category,
            'list_category'=>$list_category
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'update';
        $model_category = new AdsCategory('create');
        $list_category = array();

        if (!isset($_POST['AdsCategory']) && !empty($model->categories)) {
            foreach ($model->categories as $category) {
                $list_category[$category->id] = array('selected'=>true);
            }
        }

        if (isset($_POST['Ads']) && isset($_POST['AdsCategory'])) {
            $valid=true;
            $model->attributes = $_POST['Ads'];

            if (isset($_POST['AdsCategory'])) {
                foreach ($_POST['AdsCategory']['id_category'] as $id_category) {
                    $list_category[$id_category] = array('selected'=>true);
                }
            }

            $images = CUploadedFile::getInstancesByName('Images');

            $list_image = array();
            if (isset($images) && count($images) > 0) {
                foreach ($images as $image => $pic) {
                    $pic_name = time().'_'.strtolower($pic->name);
                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$pic_name)) {
                        $img_add = new Image();
                        $img_add->img_link = $pic_name;
                        if ($img_add->save()) {
                            $list_image[] = $img_add->id;
                        }
                    }
                    else {
                        //handles failed saving image
                    }
                }
            }

            if ($model->validate() && $valid) {
                if ($model->save()) {
                    if (isset($_POST['AdsCategory'])) {
                        $new_ads_list = array();
                        foreach ($_POST['AdsCategory']['id_category'] as $id_category) {
                            $temp = AdsCategory::model()->findByAttributes(array('id_ads'=>$model->id, 'id_category'=>$id_category));

                            if (empty($temp)) {
                                $adscategory = new AdsCategory();
                                $adscategory->id_ads = $model->id;
                                $adscategory->id_category = $id_category;
                                if ($adscategory->save()) {
                                    $new_ads_list[] = $adscategory->id;
                                }
                            }
                            else {
                                $new_ads_list[] = $temp->id;
                            }
                        }

                        $temp = AdsCategory::model()->findAllByAttributes(array('id_ads'=>$model->id));

                        foreach ($temp as $category) {
                            if (!in_array($category->id, $new_ads_list)) {
                                $category->delete();
                            }
                        }
                    }

                    foreach ($list_image as $id_image) {
                        $topic_image = new AdsImage();
                        $topic_image->id_ads = $model->id;
                        $topic_image->id_image = $id_image;
                        $topic_image->save();
                    }

                    // Redirect to view page
                    $this->redirect(array('/Dashboard/ads/view', 'id'=>$model->id));
                }
            }
        }

        $this->render('update', array(
            'model'=>$model,
            'model_category'=>$model_category,
            'list_category'=>$list_category
        ));
    }

    public function actionImage()
    {
        if (isset($_POST['id_ads']) && isset($_POST['id_image'])) {
            $id_ads = $_POST['id_ads'];
            $id_image = $_POST['id_image'];

            $ads_image = AdsImage::model()->findByAttributes(array('id_ads'=>$id_ads, 'id_image'=>$id_image));

            if (!empty($ads_image)) {
                $ads_image->delete();
            }

            $image = Image::model()->findByPk($id_image);

            if (!empty($image)) {
                $image->delete();
            }

            echo "success";
        }
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);

        $this->render('view', array(
            'model'=>$model
        ));
    }

    public function actionDelete($id)
    {
        $model = $this->loadModel($id)->delete();
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    public function loadModel($id)
    {
        $model = Ads::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}