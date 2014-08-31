<?php
class Brand extends CActiveRecord
{
	
	/*  必不可少方法一，返回模型 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);	
	}
	
	/*必不可少方法二，返回表名  */
	public function tableName()
	{
		return '{{brand}}';
	}
	
	public function attributeLabels()
	{
		return array(
				'brand_name' => '品牌名',
				'brand_english_name' => '品牌英文名',
				'brand_description' => '描述',
				'brand_logo_img' => '品牌logo',
				'brand_home_url' => '品牌官网',
				'brand_add_time' => '添加时间',
				'brand_modify_time' => '编辑时间',
		
		);
	}
	
	//验证之前先判断是否为空
	/*
	public function beforeValidate()
	{
		$flag = true;
		if(trim($this->brand_qq) != '')
		{
			if(!preg_match('/^\d{5,12}$/', trim($this->brand_qq)))
			{
				$this->addError('brand_qq', '请填写正确的QQ号码');
				$flag = false;
			}
		}
		if(trim($this->brand_phone) != '')
		{
			if(!preg_match('/^1\d{10}$/', trim($this->brand_phone)))
			{
				$this->addError('brand_phone', '请填写正确的手机号码');
				$flag = false;
			}
		}
		
		if(($new_brand_password = trim($this->new_brand_password)) != '')
		{
			if(preg_match('/\w{6,12}/', $new_brand_password))
			{
				if($new_brand_password !== trim($this->re_new_brand_password))
				{
					$this->addError('re_new_brand_password', '确认密码必须与新密码一致');
					$flag = false;
				} 
			} else {
				$this->addError('new_brand_password', '密码为6~12位的数字字母下划线');
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
	*/
	public function rules()
	{
		return array(
				array('brand_name', 'required',  'message' => '品牌名不能为空'),
				array('brand_name', 'unique', 'on'=>'add', 'message' => '该品牌名已经存在'),
				array('brand_english_name', 'required', 'message' => '品牌英文名不能为空'),
				array('brand_english_name', 'unique', 'on'=>'add', 'message' => '该英文名已经存在'),
				array('brand_logo_img, brand_home_url, brand_description, brand_add_time, brand_modify_time', 'safe'),
		);
		
	}
	
	
}