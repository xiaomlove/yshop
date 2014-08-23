<?php
class User extends CActiveRecord
{
	public $new_user_password;//attributeLabels,数据库没有的字段需要定义一下
	public $re_new_user_password;
	/*  必不可少方法一，返回模型 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);	
	}
	
	/*必不可少方法二，返回表名  */
	public function tableName()
	{
		return '{{user}}';
	}
	
	public function attributeLabels()
	{
		return array(
				'user_name' => '用户名',
				'user_password' => '密码',
				'new_user_password' => '新密码',
				're_new_user_password' => '确认密码',
				'user_real_name' => '真实姓名',
				'user_email' => '邮箱',
				'user_phone' => '手机号码',
				'user_qq' => 'QQ号码',
				'user_birthday' => '出生日期'
		
		);
	}
	
	//验证之前先判断是否为空
	public function beforeValidate()
	{
		$flag = true;
		if(trim($this->user_qq) != '')
		{
			if(!preg_match('/^\d{5,12}$/', trim($this->user_qq)))
			{
				$this->addError('user_qq', '请填写正确的QQ号码');
				$flag = false;
			}
		}
		if(trim($this->user_phone) != '')
		{
			if(!preg_match('/^1\d{10}$/', trim($this->user_phone)))
			{
				$this->addError('user_phone', '请填写正确的手机号码');
				$flag = false;
			}
		}
		
		if(($new_user_password = trim($this->new_user_password)) != '')
		{
			if(preg_match('/\w{6,12}/', $new_user_password))
			{
				if($new_user_password !== trim($this->re_new_user_password))
				{
					$this->addError('re_new_user_password', '确认密码必须与新密码一致');
					$flag = false;
				} 
			} else {
				$this->addError('new_user_password', '密码为6~12位的数字字母下划线');
				$flag = false;	
			}
			
		}
		if($flag)
		{
			return true;
		} else {
			return false;
		}

	}
	
	public function rules()
	{
		return array(
				array('user_name', 'required',  'message' => '用户名不能为空'),
				array('user_password', 'required', 'message' => '密码不能为空'),
				array('new_user_password', 'safe'),
				array('re_new_user_password', 'safe'),
				array('user_password', 'checkPassword', 'on' => 'editProfile'),
				array('user_qq', 'safe'),//安全字段，不设置无法被赎值，无法在beforeValidate中验证
				array('user_phone', 'safe'),
				array('user_birthday', 'safe'),
				
		);
		
	}
	
	public function checkPassword()
	{
		$userInfo = $this->findByPk(Yii::app()->user->id);//模型内直接$this为当前模型

		$user_salt = $userInfo->user_salt;
		$user_password = $userInfo->user_password;
		
		if(md5(md5($user_salt).$this->user_password) !== $userInfo->user_password)
		{
			$this->addError('user_password', '密码不正确');
		}
	}
}