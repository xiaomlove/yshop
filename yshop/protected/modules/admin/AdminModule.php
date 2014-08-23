<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
		$this->defaultController = 'index';
		//重新设置该模型的组件，相当于覆盖了主配置文件的信息
		Yii::app()->setComponents(array(
			'user' => array(
				'loginUrl' => Yii::app()->createUrl('admin/user/login'),
			)
		));
		//自己乱来，正规方法是怎么来的？？？不行，验证码出不来了
// 		if(Yii::app()->user->isGuest)
// 		{
// 			if(Yii::app()->request->url != '/index.php?r=admin/user/login')
// 			{
// 				header("Location:index.php?r=admin/user/login");
// 			}
// 		}
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
// 			d($controller);//控制器对象，
// 			d($action);//方法对象
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
