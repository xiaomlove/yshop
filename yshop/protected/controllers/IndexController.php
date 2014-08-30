<?php

class IndexController extends Controller
{
	
	public function actionIndex()
	{
		$this->renderPartial('welcome');
	}
}