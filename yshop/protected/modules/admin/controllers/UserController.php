<?php
class UserController extends AdminController
{
	public function actions()
	{
		return array(
			'captcha' => array(
					'class' => 'system.web.widgets.captcha.CCaptchaAction',
					'height' => 40,
					'width' => 100,
					'minLength' => 4,
					'maxLength' => 4,
					'padding' => 0,
					'offset' => 3,
					
					
			)
		);
	}
	public function actionLogin()
	{
		//获取bing每日图片作为背景
		$str = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
		$imgurl = '';
		if(preg_match("/<url>(.+?)<\/url>/ies", $str, $matches)){
			$imgurl = 'http://cn.bing.com'.$matches[1];
		}
		$loginForm = new LoginForm();
		if(isset($_POST['LoginForm']))
		{
			$loginForm->attributes = $_POST['LoginForm'];

			if($loginForm->validate() && $loginForm->login())
			{
				$userInfo = User::model()->findByPk(Yii::app()->user->id);
				$userInfo->user_last_login_ip = $userInfo->user_this_login_ip;
				$userInfo->user_last_login_time = $userInfo->user_this_login_time;
				$userInfo->user_this_login_ip = Yii::app()->request->userHostAddress;
				$userInfo->user_this_login_time = time();
				$userInfo->user_login_count += 1;
				
				$result = $userInfo->save(false);//不验证保存
// 				d($userInfo->getErrors());
				if($result)
				{
					Yii::app()->session['loginTime'] = date('Y-m-d H:i:s', time());
					$this->redirect(array('index/index'));
				} else {
					$loginForm->addError('username','保存登陆信息失败！请重试。');
				}
				
			}
		}
		$this->renderPartial('login', array('loginForm' => $loginForm, 'imgurl'=>$imgurl));
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout(true);
		$this->redirect(array('login'));
	}
	
	public function actionProfile()
	{
		$userInfo = User::model()->findByPk(Yii::app()->user->id);
		$userModel = User::model();
		$submit = null;
		if(isset($_POST['User']))
		{
			
			$submit = 'submit';
			$userModel->scenario = 'editProfile';//必须先指定场景，因为rules里指定了场景，否则无法给attributes赎值，验证也就通不过。rules里没有规定规则的字段是无法放到attributes里面的。
			$userModel->setAttributes($_POST['User']);		
			if($userModel->validate())
			{
				$data = $_POST['User'];
				if($data['new_user_password'] !== '')
				{
					$data['user_password'] = md5(md5($userInfo->user_salt).$data['new_user_password']);
				} else {
					$data['user_password'] = md5(md5($userInfo->user_salt).$data['user_password']);
				}
				if(empty($data['user_birthday']))
				{
					$data['user_birthday'] = null;
				}
				unset($data['new_user_password']);
				unset($data['re_new_user_password']);
				
				$result = $userModel->updateByPk($userInfo->user_id, $data);
			
				if($result)
				{
					Yii::app()->user->setFlash('success', '修改成功！');
				}
			}
			
		}
		$this->render('profile', array('userInfo' => $userInfo, 'userModel' => $userModel, 'submit' => $submit));
	}
}