<?php if(!empty($subCategoryList)):?>
<ul class="category-sub-<?php echo $subCategoryList[0]['item_category_deep']?>">
	<?php foreach($subCategoryList as $subCategory):?>
		<li id="<?php echo $subCategory['item_category_id']?>" deep="<?php echo $subCategory['item_category_deep']?>" path="<?php echo $subCategory['item_category_path']?>" found="0" sort = "<?php echo $subCategory['item_category_sort']?>">
			<input type="checkbox">
			<span class="name"><i class="fa fa-caret-right"></i><?php echo $subCategory['item_category_name']?></span><span><i class="fa fa-hand-o-up"></i></span><span><?php echo $subCategory['item_category_add_time']?></span><span><a href="#">编辑</a><a href="<?php echo $this->createUrl('categoryBrand/index', array('catId'=>$subCategory['item_category_id']))?>">品牌</a><a href="#">商品</a><a href="#">删除</a></span></li>
	<?php endForeach?>
</ul>
<?php endIf?>