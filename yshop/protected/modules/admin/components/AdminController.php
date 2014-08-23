<?php
class AdminController extends Controller
{
	//方法过滤器
	public function filters()
	{
		return array(
// 			'guolvqi+actionA,actionB',//自定义的过滤器，方法A,B在执行时都被该方法过滤,先执行此方法
			'accessControl',//设置的access control过滤器将应用于AdminController里每个动作。过滤器具体的授权规则通过重载控制器的CController::accessRules方法来指定。
		);
	}
	
	public function guolvqi($filterChain)
	{
		d('aaaa');//方法执行时先输出aaa
		$filterChain->run();//方法的执行输出，这块不懂！！！filters里返回的必须是父类定义了的？
		d('bbb');//方法执行后输出bbb
	}
	
	//为accessControl制定访问控制规则
	public function accessRules()
	{
		return array(
			array(
				'allow',
				'actions'=>array('login', 'captcha'),//匹配的方法，这里不能用*之类的。
				'users'=>array('*'),//匹配的用户，@为验证了的用户即登陆用户
			),
			array(
				'allow',//actions不写允许所有actions
// 				'actions'=>array('index', 'profile', 'list', 'logout', 'saveCategorySort'),
				'users'=>array('@'),
			),
			array(
				'deny',//阻止所有用户，这里不能再写actions了？
				'users'=>array('*')
			)
			
		);
	}
}