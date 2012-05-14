<?php

class PostController extends Controller
{
	public function actionIndex($uid)
	{
        $question = Posts::model()->find('post_unique_id = :uid AND is_a_question = 1', array(
            'uid'=>$uid
        ));
        // Update view count
        $question->setAttribute('view_count', $question->getAttribute('view_count')+1);
        $question->update();
        
        $question->tags = explode(",", $question->tags);
        
        $answers = Posts::model()->findAll('parent_unique_id = :uid AND is_a_question = 0', array(
            'uid'=>$uid
        ));
        
        // Model for answers
        $model = new Posts;
        // Perforam ajax validation
        $this->performAjaxValidation($model);
        if (isset($_POST['Posts'])) {
            // Check identity - Required Login
            FSecurity::requiredLogin();
            // Get attributes
            $model->attributes = $_POST['Posts'];
            // Prepare data for validate
            $model->post_unique_id = FApp::guid();
            $model->last_version_id = -1;
            $model->title = $question->title;
            $model->body = $_POST['Posts']['body'];
            $model->author = FMembership::getUser()->user->member_id;
            $model->parent_unique_id = $uid;
            $model->created_date = date('Y-m-d H:i:s');
            $model->is_a_question = 0;
            $model->tags = $question->tags;
            var_dump($model->attributes);
            // Validate
            if ($model->validate()) {
                // Post an answer
                if (strlen(trim($model->body)) > 0) {
                    /* 
                    * Update post statistics
                    */
                    $answer_count = $question->getAttribute('answer_count') + 1;
                    $question->tags = implode(",", $question->tags);
                    Yii::app()->db->createCommand()
                            ->update('posts', 
                                    array(
                                        'answer_count'=>$answer_count
                                    ),
                                    'post_unique_id = :id',
                                    array('id'=>$question->getAttribute('post_unique_id')));
                    
                    // Insert
                    try {
                        Yii::app()->db->createCommand()
                            ->insert(
                                'posts',
                                array(
                                    'post_unique_id'=>$model->post_unique_id,
                                    'last_version_id'=>-1,
                                    'title'=>$model->title,
                                    'body'=>$model->body,
                                    'author'=>$model->author,
                                    'parent_unique_id'=>$model->parent_unique_id,
                                    'tags'=>$question->tags,
                                    'created_date'=>$model->created_date,
                                    'is_a_question'=>$model->is_a_question
                                )
                        );
                        $this->redirect (Yii::app()->createUrl('post/index', array('uid'=>$uid)));
                        
                    }
                    catch (CDbException $e) {
                        throw new CDbException($e->getMessage());
                    }
                }
            }
        }
        
		$this->render('index',array(
            'question'=>$question,
            'answers'=>$answers,
            'model'=>$model
        ));
	}

	public function actionEdit($uid)
	{
        $model = Posts::model()->find("post_unique_id LIKE '".$uid."'");
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
                if ($model->update()) $this->redirect(Yii::app()->createUrl('home/index'));
            }
        }
		$this->render('edit',array('model'=>$model));
	}

	public function actionEditanswer()
	{
        // Model for answers
        $model = Posts::model()->find("post_unique_id LIKE '".$uid."'");
        // Perforam ajax validation
        $this->performAjaxValidation($model);
        if (isset($_POST['Posts'])) {
            // Check identity - Required Login
            FSecurity::requiredLogin();
            // Get attributes
            $model->attributes = $_POST['Posts'];
            // Prepare data for validate
            $model->post_unique_id = FApp::guid();
            $model->last_version_id = -1;
            $model->title = $question->title;
            $model->author = FMembership::getUser()->user->member_id;
            $model->parent_unique_id = $uid;
            $model->created_date = date('Y-m-d H:i:s');
            $model->is_a_question = 0;
            $model->tags = $question->tags;
            // Validate
            if ($model->validate()) {
                // Post an answer
                if (strlen(trim($model->body)) > 0) {
                    // Insert
                    if ($model->update()) $this->redirect (Yii::app()->createUrl('post/index', array('uid'=>$uid)));
                }
            }
        }
        
		$this->render('editanswer',array(
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