<?php

class QuestionsController extends Controller
{
	public function actionIndex()
	{
        $this->redirect('home/index');
		$this->render('index');
	}
    
    public function actionUnanswered()
	{
		$this->render('unanswered');
	}

	public function actionPost()
	{
        $model = new Posts;
        $this->performAjaxValidation($model);
        if (isset($_POST['Posts'])) {
            // Required Login
            FSecurity::requiredLogin();
            // Get attributes
            $model->attributes = $_POST['Posts'];
            $model->body = $_POST['Posts']['body'];
            // Prepare data for validate
            $model->post_unique_id = FApp::guid();
            $model->last_version_id = -1;
            $model->author = FMembership::getUser()->user->member_id;
            $model->parent_unique_id = 0;
            $model->created_date = date('Y-m-d H:i:s');
            $model->is_a_question = 1;
            $model->is_answered = 0;
            // Validate
            if ($model->validate() && strlen(trim($model->body))) {
                // Process Tags
                //FTags::makeTags($model->tags);
                if ($model->insert()) $this->redirect(Yii::app()->createUrl('home/index'));
            }
        }
		$this->render('post',array('model'=>$model));
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
     * 
     */

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'captcha'=>'CCaptchaAction',
		);
	}
	
}