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
            
            $model->attributes = $_POST['Posts'];
            // Make a new question
            $model->post_unique_id = FApp::guid();
            $model->last_version_id = -1;
            $model->author = FMembership::getUser()->user->member_id;
            $model->parent_unique_id = 0;
            $model->created_date = date('Y-m-d H:i:s');
            $model->is_a_question = true;
            $model->is_answered = false;
            // Process Tags
            FTags::makeTags($model->tags);
            
            if ($model->insert()) $this->redirect (Yii::app()->createUrl('home/index'));
        }
		$this->render('post',array('model'=>$model));
	}
    
    public function actionDetails($uid)
	{
        $question = Posts::model()->find('post_unique_id = :uid AND is_a_question = 1', array(
            'uid'=>$uid
        ));
        // Update view count
        $question->setAttribute('view_count', $question->getAttribute('view_count')+1);
        $question->save();
        
        $question->tags = explode(",", $question->tags);
        
        $answers = Posts::model()->findAll('parent_unique_id = :uid AND is_a_question = 0', array(
            'uid'=>$uid
        ));
        
        // Model for answers
        $model = new Posts;
        $model->scenario = 'registerwcaptcha';
        $this->performAjaxValidation($model);
        if (isset($_POST['Posts'])) {
            // Check identity - Required Login
            FSecurity::requiredLogin();
            
            // NULL Captcha
            //$model->scenario = NULL;
            // Post an answer
            $model->attributes = $_POST['Posts'];
            if (strlen(trim($model->body)) != 0) {
                $model->post_unique_id = FApp::guid();
                $model->last_version_id = -1;
                $model->title = null;
                $model->author = FMembership::getUser()->user->member_id;
                $model->parent_unique_id = $uid;
                $model->created_date = date('Y-m-d H:i:s');
                $model->is_a_question = false;
                $model->tags = null;

                /* 
                * Update post statistics
                */
                $question->setAttribute('answer_count', $question->getAttribute('answer_count')+1);
                $question->save();

                // Insert
                if ($model->insert()) $this->redirect (Yii::app()->createUrl('questions/details', array('uid'=>$uid)));
            }
        }
        
		$this->render('details',array(
            'question'=>$question,
            'answers'=>$answers,
            'model'=>$model
        ));
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