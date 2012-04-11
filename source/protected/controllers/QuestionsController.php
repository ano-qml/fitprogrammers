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
		$this->render('post');
	}
    
    public function actionDetails()
	{
		$this->render('details');
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