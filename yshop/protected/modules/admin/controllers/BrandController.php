<?php
class BrandController extends AdminController
{
	public function init()
	{
		$this->breadcrumbs[] = '商品管理';
		parent::init();
	}
	
	public function actionIndex()
	{
		$this->breadcrumbs['品牌列表'] = array('brand/index');
		$this->render('brandIndex');
	}
	public function actionList()
	{
		
		$condition = $_GET['keywords'] == "null"? "1=1": "(brand_name LIKE '%".$_GET['keywords']."%' OR brand_english_name LIKE '%".$_GET['keywords']."%')";
		$orderField = $_GET['sortField'] == 'id'? 'brand_id': $_GET['sortField'];
		$brandModel = Brand::model();
		$CDbCriteria = new CDbCriteria();
		$CDbCriteria->condition = $condition;
		$CDbCriteria->order = $orderField.' '.$_GET['sortType'];
		$CDbCriteria->offset = (intval($_GET['page'])-1)*intval($_GET['perPage']);
		$CDbCriteria->limit = intval($_GET['perPage']);
		$brandList = $brandModel->findAll($CDbCriteria);
		$count = $brandModel->count($CDbCriteria);
		if(count($brandList))
		{
			foreach($brandList as &$vv)
			{
				$vv = $vv->getAttributes();
			}
		}

		$this->renderPartial('brandList', array('brandList'=>$brandList, 'count'=>$count), false);		
	
	}
}