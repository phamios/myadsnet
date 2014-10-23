<?php

class DefaultController extends Controller
{
	public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index', 'changepasswd', 'logout'),
                'users'=>array('@'),
            ),
            array('allow',
                'actions'=>array('login'),
                'users'=>array('?'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogin()
    {
        $this->layout = '//layouts/login';

        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->createUrl('/Dashboard/default/index'));
        }

        $model = new LoginForm;

        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            if($model->validate() && $model->login()) {
                $this->redirect(array('/Dashboard/default/index'));
            }
        }

        $this->render('login', array(
            'model'=>$model
        ));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('/Dashboard/default/index'));
    }

    public function actionChangepasswd()
    {
        $model = Admin::model()->findByPk(Yii::app()->user->id);

        if (empty($model)) {
        	throw new CHttpException(404,'The requested page does not exist.');
        }

        $model->scenario = 'changePassword';

        if (isset($_POST['Admin'])) {
            $model->attributes = $_POST['Admin'];

            if ($model->validate()) {
                if (md5(APP_SALT.'-'.$model->current_password) == $model->admin_pass) {
                    $model->admin_pass = md5(APP_SALT.'-'.$model->new_password);

                    if ($model->save()) {
                        Yii::app()->user->setFlash('message', "Your password has changed successfully!");

                        $this->redirect(array('/Dashboard/default/index'));
                    }
                }
            }
        }

        $this->render('changepasswd', array(
            'model'=>$model
        ));
    }

}