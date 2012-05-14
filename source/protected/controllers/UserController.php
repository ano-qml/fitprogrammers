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
                else {
                    echo "<script>alert('Oops! It seems that your username or password is incorrect')</script>";
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
    
    public function actionChangePassword() {
        $model = UserChangePassword::model()->find('member_id = '.FMembership::getUser()->user->member_id);
        $compare = Members::model()->find('member_id = '.FMembership::getUser()->user->member_id);
        $this->performAjaxValidation($model);
        
        if (isset($_POST['UserChangePassword'])) {
            $model->attributes = $_POST['UserChangePassword'];
            if ($model->validate()) {
                if ($compare->password === md5($model->oldPassword)) {
                    // change password
                    $compare->password = md5($model->password);
                    $compare->update();
                    $this->redirect(Yii::app()->createUrl('user/logout'));
                }
            }
        }
        
        $this->render('changepassword', array('model'=>$model));
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