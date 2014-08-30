<?php

class IndexController extends AdminController
{
	public function beforeAction($action)
	{
		array_shift($this->breadcrumbs);
		return true;
	}
	public function actionIndex()
	{
// 		d($this->leftMenu);exit;
		$this->render('index');
	}
}