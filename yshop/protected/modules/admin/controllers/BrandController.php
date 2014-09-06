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
					$this->_uploadLogoImg($brandModel);
					Yii::app()->user->setFlash('success', '编辑成功');
				}
			}
		}
// 		d($brandModel->attributes);exit;
		$this->breadcrumbs['品牌列表'] = array('brand/index');
		$this->breadcrumbs['编辑品牌信息'] = array('brand/edit', 'id'=>$id);
		$this->render('brandForm', array('brandModel'=>$brandModel, 'action'=>'edit'));
		
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
					$this->_uploadLogoImg($brandModel);
					Yii::app()->user->setFlash('success', '添加成功');
				}
			}
		}
	
		$this->breadcrumbs['品牌列表'] = array('brand/index');
		$this->breadcrumbs['添加品牌'] = array('brand/add');
		$this->render('brandForm', array('brandModel'=>$brandModel, 'action'=>'add'));
	
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
				@unlink(BRAND_LOGO_URL.$brandInfo->brand_english_name.'-thumb.jpg');
				@unlink(BRAND_LOGO_URL.$brandInfo->brand_english_name.'-origin.jpg');
				echo 1;
			}else{
				echo ACTION_FAILED;
			}
		}else{
			echo NOT_EXIST;
		}
	}
	
	private function _uploadLogoImg($model)
	{
		$image = CUploadedFile::getInstance($model, 'brand_logo_img');
		if(is_object(($image)) && get_class($image) == 'CUploadedFile' && in_array(substr($image->type, 6), Yii::getConfig('brandLogoImgType')))
		{
			if(!is_dir(BRAND_LOGO_URL))
			{
				mkdir(BRAND_LOGO_URL, 0777, TRUE);
			}
			$path = BRAND_LOGO_URL.$_POST['Brand']['brand_english_name'];
// 			$suffix = substr($image->name, strrpos($image->name, '.'));
			$suffix = '.jpg';
			if($image->saveAs($path.'-origin'.$suffix) && Yii::getConfig('brandLogoImgResize'))
			{
				//生成缩略图
				$thumb = Yii::app()->thumb;
				$thumb->image = $path.'-origin'.$suffix;
				$thumb->width = BRAND_LOGO_WIDTH;
				$thumb->height = BRAND_LOGO_HEIGHT;
				$thumb->mode = 4;
				$thumb->directory = BRAND_LOGO_URL;
				$thumb->defaultName = $_POST['Brand']['brand_english_name'].'-thumb';
				$thumb->createThumb();
				$thumb->save();
			}
		}
	}
	
	public function actionDeleteLogoImg($name)
	{
		$fileOrigin = BRAND_LOGO_URL.$name.'-origin.jpg';
		if(Yii::getConfig('brandLogoImgResize'))
		{
			$file = BRAND_LOGO_URL.$name.'-thumb.jpg';
		}else{
			$file = BRAND_LOGO_URL.$name.'-origin.jpg';
		}
		if(file_exists($file))
		{
			if(unlink($file))
			{
				@unlink($fileOrigin);
				echo 1;
			}else{
				echo ACTION_FAILED;
			}
		}else{
			echo NOT_EXIST;
		}
		
	}
}