<?php
class CategoryController extends AdminController
{
	
// 	public $breadcrumbs = array(
// 		'主页'=>array('index/index'),
// 		'商品管理',
		
// 	);

	public function init()
	{
		$this->breadcrumbs[] = '商品管理';
		parent::init(); 
	}
	
	public function actionList()
	{
		$parentId = 0;
		if(isset($_POST['parentId']))
		{
			$parentId = $_POST['parentId'];
			if(!ctype_digit(strval($parentId)))
			{
				return null;
			}
			
		}
		$categoryModel = Category::model();
		$categoryList = $categoryModel->findAllBySql(
			'SELECT * FROM {{item_category}} WHERE item_category_pid='.$parentId.' ORDER BY item_category_sort DESC'
		);

		if(!empty($categoryList))
		{
			foreach($categoryList as &$vv)
			{
				$vv = $vv->getAttributes();
				$vv['item_category_add_time'] = date('Y-m-d H:i', $vv['item_category_add_time']);
			}
		}
		
// 		$categoryList = array_map(create_function('$record', 'return $record->attributes;'), $categoryList);
		//AR对象不能直接js_encode()，需要转换为数组或者用CJSON类
// 		$jsonData = CJSON::encode($categoryList);
// 		d($categoryList);die();
		$this->breadcrumbs['商品分类'] = array('category/list');

		if($parentId === 0)
		{
			$this->render('categoryList', array('categoryList'=>$categoryList));
		}else{
			$this->renderPartial('subCategoryList', array('subCategoryList'=>$categoryList));
		}
			
	
	}
	
	public function actionSaveCategorySort()
	{
		if(is_array($_POST) && count($_POST))
		{
			$insertArr = array();
			$sql = 'UPDATE {{item_category}} SET item_category_sort=CASE item_category_id ';
			$inStr = '';
			foreach($_POST as $k=>$v)
			{
				$sort = 100;
				$arr = explode(',', $v[0]);
				if(count($arr))
				{
					foreach($arr as $categoryId)
					{
						$sql .= sprintf('WHEN %d THEN %d ', $categoryId, $sort);
						$sort--;
						
					}
				}
				$inStr .= $v[0].',';
			}
			$sql .= 'END WHERE item_category_id IN ('.rtrim($inStr, ',').')';
			
			$command = Yii::app()->db->createCommand($sql);
			echo $command->execute();
		}else{
			echo FALSE;
		}
	}
	
}