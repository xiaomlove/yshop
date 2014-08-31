<div class="row">
	<div class="col-xs-12">
		<?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off')))?>
		  <div class="form-group"> 
		    <?php echo $form->labelEx($brandModel, 'brand_name', array('class' => 'col-sm-2 control-label'))?>
		    <div class="col-sm-6">
		      <?php echo $form->textField($brandModel, 'brand_name', array('class' => 'form-control', 'id' => 'brand_name', 'value' => $brandModel->brand_name))?>
		    </div>
		    <?php echo $form->error($brandModel, 'brand_name', array('class' => 'col-xs-6 col-xs-offset-2'))?>
		  </div>
		  
		  <div class="form-group"> 
		    <?php echo $form->labelEx($brandModel, 'brand_english_name', array('class' => 'col-sm-2 control-label'))?>
		    <div class="col-sm-6">
		      <?php echo $form->textField($brandModel, 'brand_english_name', array('class' => 'form-control', 'id' => 'brand_english_name', 'value' => $brandModel->brand_english_name))?>
		    </div>
		    <?php echo $form->error($brandModel, 'brand_english_name', array('class' => 'col-xs-6 col-xs-offset-2'))?>
		  </div>
		  
		  <div class="form-group"> 
		    <?php echo $form->labelEx($brandModel, 'brand_logo_img', array('class' => 'col-sm-2 control-label'))?>
		    <div class="col-sm-6">
		      <?php echo $form->fileField($brandModel, 'brand_logo_img', array('class' => 'form-control', 'id' => 'brand_logo_img', 'value' => $brandModel->brand_logo_img))?>
		    </div>
		    <?php echo $form->error($brandModel, 'brand_logo_img', array('class' => 'col-xs-6 col-xs-offset-2'))?>
		    <div class="brand-logo-img col-xs-2 col-xs-offset-2"><img src=""></div>
		  </div>
		  <div class="form-group"> 
		    <?php echo $form->labelEx($brandModel, 'brand_home_url', array('class' => 'col-sm-2 control-label'))?>
		    <div class="col-sm-6">
		      <?php echo $form->textField($brandModel, 'brand_home_url', array('class' => 'form-control', 'id' => 'brand_home_url', 'value' => $brandModel->brand_home_url))?>
		    </div>
		    <?php echo $form->error($brandModel, 'brand_home_url', array('class' => 'col-xs-6 col-xs-offset-2'))?>
		    
		  </div>
		  <div class="form-group"> 
		    <?php echo $form->labelEx($brandModel, 'brand_description', array('class' => 'col-sm-2 control-label'))?>
		    <div class="col-sm-6">
		      <?php echo $form->textArea($brandModel, 'brand_description', array('class' => 'form-control', 'id' => 'brand_description', 'rows'=>'4', 'value' => $brandModel->brand_description))?>
		    </div>
		    <?php echo $form->error($brandModel, 'brand_description', array('class' => 'col-xs-6 col-xs-offset-2'))?>
		  </div>
		  <div class="form-group"> 
		    <?php echo $form->labelEx($brandModel, 'brand_add_time', array('class' => 'col-sm-2 control-label'))?>
		    <div class="col-sm-6">
		      <?php echo $form->textField($brandModel, 'brand_add_time', array('class' => 'form-control', 'id' => 'brand_add_time', 'readonly'=>'readonly', 'value' => empty($brandModel->brand_add_time)? '': date('Y-m-d H:i',$brandModel->brand_add_time)))?>
		    </div>
		    <?php echo $form->error($brandModel, 'brand_add_time', array('class' => 'col-xs-6 col-xs-offset-2'))?>
		  </div>
		  <div class="form-group"> 
		    <?php echo $form->labelEx($brandModel, 'brand_modify_time', array('class' => 'col-sm-2 control-label'))?>
		    <div class="col-sm-6">
		      <?php echo $form->textField($brandModel, 'brand_modify_time', array('class' => 'form-control', 'id' => 'brand_modify_time', 'readonly'=>'readonly', 'value' => empty($brandModel->brand_add_time)? '': date('Y-m-d H:i',$brandModel->brand_modify_time)))?>
		    </div>
		  </div>
		 
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-6">
		      <button type="submit" class="btn btn-primary">保存</button>
		    </div>
		  </div>
		<?php $this->endWidget()?>
	</div>
</div>
<script type="text/javascript">
	
</script>
<script type="text/javascript" src=""></script>
