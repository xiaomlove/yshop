<?php
class CategoryBrand extends CActiveRecord
{
	/*  必不可少方法一，返回模型 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
	
	/*必不可少方法二，返回表名  */
	public function tableName()
	{
		return '{{item_category_brand}}';
	}
	
	//配置表关联信息
	public function relations()
	{
		return array(
			'brand'=>array(self::BELONGS_TO, 'Brand', 'brand_id'),
		);
	}
}