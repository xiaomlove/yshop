<?php

class CategoryBrandController extends AdminController
{
	public function init()
	{
		$this->breadcrumbs[] = '商品管理';
		$this->breadcrumbs['商品分类'] = array('category/list');
		parent::init();
	}
	
	public function actionIndex($catId)
	{
		if(!ctype_digit($catId))
		{
			throw new Exception('参数不正确');
		}
		$categoryInfo = Category::model()->findByPk($catId)->getAttributes();
		$this->breadcrumbs[] = '分类品牌';
		$this->render('categoryBrandIndex', array('catInfo'=>$categoryInfo));
	}
	
	public function actionList($catId)
	{
// 		if(!Yii::app()->request->isAjaxRequest)
// 		{
// 			$this->redirect(array('categoryBrand/index'));
// 			exit;
// 		}
		
		$sql = "SELECT * FROM {{item_category_brand}} cb LEFT JOIN {{brand}} b 
				ON cb.brand_id=b.brand_id WHERE cb.item_category_id=".$catId;
		if($_GET['keywords'] !== 'null')
		{
			$sql .= " AND (brand_name LIKE '%".$_GET['keywords']."%' OR brand_english_name LIKE '%".$_GET['keywords']."%')";
		}
		if($_GET['sortField'] == 'id')
		{
			$sql .= " ORDER BY item_category_brand_sort ASC";
		}else{
			$sql .= " ORDER BY ".$_GET['sortField']." ".$_GET['sortType'];
		}
		$offset = (intval($_GET['page'])-1)*intval($_GET['perPage']);
		$limit = intval($_GET['perPage']);
		if($limit !== 0 )
		{
			$sql .= " LIMIT ".$offset.','.$limit;
		}
		
		$brandList = Yii::app()->db->createCommand($sql)->queryAll();
		
		
		$sql = "SELECT count(*) as count FROM {{item_category_brand}} cb LEFT JOIN {{brand}} b 
				ON cb.brand_id=b.brand_id WHERE cb.item_category_id=".$catId;
		if($_GET['keywords'] !== 'null')
		{
			$sql .= " AND (brand_name LIKE '%".$_GET['keywords']."%' OR brand_english_name LIKE '%".$_GET['keywords']."%')";
		}
		$count = Yii::app()->db->createCommand($sql)->queryScalar();
		$this->renderPartial('categoryBrandList', array('brandList'=>$brandList, 'count'=>$count), false);
	
	}
}