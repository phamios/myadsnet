<?php

class CategoryController extends Controller
{
	public function actionIndex()
	{
        $model = new Category('search');

        $model->unsetAttributes();
        if(isset($_GET['Category'])) {
            $model->attributes=$_GET['Category'];
        }

        $this->render('index', array(
            'model'=>$model
        ));
	}

    public function actionCreate()
    {
        $model = new Category('create');

        if (isset($_POST['Category'])) {
            $model->attributes = $_POST['Category'];

            if ($model->save()) {
                // Redirect to view page
                $this->redirect(array('/Dashboard/category/index'));
            }
        }

        $this->render('create', array(
            'model'=>$model
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'update';

        if (isset($_POST['Category'])) {
            $model->attributes = $_POST['Category'];

            if ($model->save()) {
                // Redirect to view page
                $this->redirect(array('/Dashboard/category/index'));
            }
        }

        $this->render('update', array(
            'model'=>$model
        ));
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
        $model = Category::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}