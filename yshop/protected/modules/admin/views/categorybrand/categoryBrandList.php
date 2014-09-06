<?php if(count($brandList)):?>
    <?php foreach($brandList as $kk=>$brand):?>
        <tr id="<?php echo $brand['brand_id']?>">      	
            <td><input type="checkbox" class="my-checkbox">
            <?php if(Yii::getConfig('brandLogoImgResize')):?>
            	<?php if(file_exists($img = BRAND_LOGO_URL.$brand['brand_english_name'].'-thumb.jpg')):?>
            		<img src="<?php echo $img?>" style="max-height:35px">
            	<?php endIf?>
            <?php else:?>
            	<?php if(file_exists($img = BRAND_LOGO_URL.$brand['brand_english_name'].'-origin.jpg')):?>
            		<img src="<?php echo $img?>" style="max-height:35px">
            	<?php endIf?>
            <?php endIF?>
            
            </td>
            <td><?php echo $brand['brand_name']?></td>
            <td><?php echo $brand['brand_english_name']?></td>
            <td><i class="fa fa-hand-o-up move"></i></td>
        
            <td class="action-href">
            <a class="delete" href="javascript:void(0)">删除</a>
            </td>
        </tr>
     <?php endForeach?>
     <input type="hidden" id="count" value="<?php echo $count?>">
     
     <script type="text/javascript">
	var ajaxSaveSortUrl = '<?php echo $this->createUrl('saveCategoryBrandSort')?>';
	</script>
	<script type="text/javascript" src="<?php echo UILIBS_URL?>jqueryui-sortable/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo UILIBS_URL?>jquery.json.min.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>category.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo UILIBS_URL?>jqueryui-sortable/jquery-ui.min.css"></link>
<?php endIf?>
      
		   