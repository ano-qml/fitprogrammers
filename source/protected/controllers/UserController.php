<?php

class UserController extends Controller
{
	public function actionLogin()
	{
        $model = new UserLogin;
        $this->performAjaxValidation($model);
        if (isset($_POST['UserLogin'])) {
            $model->attributes = $_POST['UserLogin'];
            if ($model->validate()) {
                $user = $model->find('fitportal_id = :fitportal AND password = :password',array(
                    'fitportal'=>$model->fitportal_id,
                    'password'=>  md5($model->password)
                ));
                $userinfo = new FUserInfo();
                // Login
                if ($user != null) {
                    $userinfo->user = $user;
                    FMembership::saveSession($userinfo);
                }
                $this->redirect(Yii::app()->createUrl('home/index'));
            }
        }
		$this->render('login', array('model'=>$model));
	}

	public function actionLogout()
	{
        session_destroy();
        $this->redirect(Yii::app()->createUrl('home/index'));
	}

	public function actionRegister()
	{
		$this->render('register');
	}
    
    
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}