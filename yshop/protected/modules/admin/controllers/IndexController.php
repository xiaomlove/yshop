<?php

class IndexController extends AdminController
{

	public function actionIndex()
	{
// 		d(Yii::app()->getConfig('navMenu'));//怎么无法使用getConfig()
		$this->render('index');
	}
}