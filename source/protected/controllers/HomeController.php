<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
        $criteria = new CDbCriteria();
        $criteria->condition = 'is_a_question = 1';
        
        // Paging
        $count = Posts::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 1;
        $pages->applyLimit($criteria);
        
        $models = Posts::model()->findAll($criteria);
        foreach ($models as $model) {
            $model->tags = explode(",", $model->tags);
        }
        
		$this->render('index', array('models'=>$models,'pages'=>$pages,'count'=>$count));
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