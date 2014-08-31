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
		if(!Yii::app()->request->isAjaxRequest)
		{
			$this->redirect(array('brand/index'));
			exit;
		}
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
	
	public function actionEdit($id)
	{
		if(!ctype_digit(strval($id)))
		{
			die('参数错误');
		}
		$brandModel = Brand::model()->findByPk($id);
// 		$info = $brandModel->findByPk($id);//正确做法应该是上面，不用再info了
		if(array_key_exists('Brand', $_POST))
		{
			$_POST['Brand']['brand_add_time'] = strtotime($_POST['Brand']['brand_add_time']);
			$_POST['Brand']['brand_modify_time'] = strtotime("now");
			$brandModel->scenario = 'add';//rules里面添加场景有点多余了在这里
			$brandModel->setAttributes($_POST['Brand']);
			if($brandModel->validate())
			{
				$result = $brandModel->updateByPk($id, $_POST['Brand']);
				if($result)
				{
					Yii::app()->user->setFlash('success', '编辑成功');
				}
			}
		}
		
		$this->breadcrumbs['品牌列表'] = array('brand/index');
		$this->breadcrumbs['编辑品牌信息'] = array('brand/edit', 'id'=>$id);
		$this->render('brandForm', array('brandModel'=>$brandModel));
		
	}
	
	public function actionAdd()
	{
		$brandModel = new Brand();
		if(array_key_exists('Brand', $_POST))
		{
			$_POST['Brand']['brand_add_time'] = strtotime("now");
			$_POST['Brand']['brand_modify_time'] = strtotime("now");
			$brandModel->scenario = 'add';
			$brandModel->setAttributes($_POST['Brand']);
			if($brandModel->validate())
			{
				$result = $brandModel->save();
				if($result)
				{
					Yii::app()->user->setFlash('success', '添加成功');
				}
			}
		}
	
		$this->breadcrumbs['品牌列表'] = array('brand/index');
		$this->breadcrumbs['添加品牌'] = array('brand/add');
		$this->render('brandForm', array('brandModel'=>$brandModel));
	
	}
	
	public function actionDelete($id)
	{
		if(!ctype_digit(strval($id)))
		{
			echo PARAM_ERROR;exit;
		}
		$brandInfo = Brand::model()->findByPk($id);
		if(count($brandInfo))
		{
			if($brandInfo->delete())
			{
				echo 1;
			}else{
				echo ACTION_FAILED;
			}
		}else{
			echo NOT_EXIST;
		}
	}
}