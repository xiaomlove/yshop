
<div class="row">
	<div class="col-xs-12 category-list">
		<div class="">
			<button class="btn btn-primary btn-xs" id="add-category"><i class="fa fa-plus"></i>添加分类</button>
			<button class="btn btn-primary btn-xs pull-right" id="saveCategorySort"><i class="fa fa-plus"></i>保存更改</button>
		</div>
		<div class="select-all">
			<div class="btn btn-default"><label><input type="checkbox" name="checkbox">全选</label></div>
			<div class="btn btn-default">批量删除</div>
			<div class="pull-right"><span id="expandAll">展开</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span id="closeAll">收起</span></div>
			
		</div>
		
		<div class="category-head">
			<div class="category-head-name">分类名称</div>
			<div class="category-head-move">移动</div>
			<div class="category-head-time">创建时间</div>
			<div class="category-head-action">操作</div>
			<div class="category-line"></div>
			<div class="category-line"></div>
			<div class="category-line"></div>
		</div>
		<!-- 
		<div class="category-body" id="category-body">
			<ul class="category-sub-0">
			
				<li id="1" deep="0"><input type="checkbox"><span><i class="fa fa-caret-right"></i>男装</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span></li>
				<li id="2" deep="0">
					<input type="checkbox"><span><i class="fa fa-caret-right"></i>手机</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span>
					<ul class="category-sub-1">
						<li id="2,3" deep="1">
							<input type="checkbox"><span><i class="fa fa-caret-right"></i>智能手机</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span>
							<ul class="category-sub-2">
								<li id="2,3,4" deep="2">
									<input type="checkbox"><span><i class="fa fa-caret-right"></i>3G手机</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span>
								</li>
								<li id="2,3,5" deep="2">
									<input type="checkbox"><span><i class="fa fa-caret-right"></i>4G手机</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span>
								</li>
							
							</ul>
						</li>
						<li id="2,6" deep="1">
							<input type="checkbox"><span><i class="fa fa-caret-right"></i>功能手机</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span>
						</li>
					</ul>
				</li>
				<li id="3" deep="0">
					<input type="checkbox"><span><i class="fa fa-caret-right"></i>女装</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span>
					<ul class="category-sub-1">
						<li id="3,7" deep="1">
							<input type="checkbox"><span><i class="fa fa-caret-right"></i>衬衫</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span>
						</li>
						<li id="3,8" deep="1">
							<input type="checkbox"><span><i class="fa fa-caret-right"></i>连衣裙</span><span><i class="fa fa-hand-o-up"></i></span><span>2014-12-31</span><span>查看</span>
						</li>
					</ul>
				</li>
				
				
			</ul>
		</div>
	 	-->
	 	
	 	<div class="category-body" id="category-body">
			<ul class="category-sub-0">
			<?php if(!empty($categoryList)):?>
				<?php foreach($categoryList as $category):?>
					<li id="<?php echo $category['item_category_id']?>" deep="<?php echo $category['item_category_deep']?>" path="<?php echo $category['item_category_path']?>" found = "0" sort = "<?php echo $category['item_category_sort']?>"><input type="checkbox"><span class="name"><i class="fa fa-caret-right"></i><?php echo $category['item_category_name']?></span><span><i class="fa fa-hand-o-up"></i></span><span><?php echo $category['item_category_add_time']?></span><span><a href="#">编辑</a><a href="<?php echo $this->createUrl('categoryBrand/index', array('catId'=>$category['item_category_id']))?>">品牌</a><a href="#">商品</a><a href="#">删除</a></span></li>
				<?php endForeach?>	
			<?php endIf?>	
			</ul>
			<div class="category-line"></div>
			<div class="category-line"></div>
			<div class="category-line"></div>
		</div>

	</div>
</div>


<script type="text/javascript">
	var ajaxSaveSortUrl = '<?php echo $this->createUrl('saveCategorySort')?>';
	var ajaxExpandCategoryUrl = '<?php echo $this->createUrl('list')?>';
</script>
<script type="text/javascript" src="<?php echo UILIBS_URL?>jqueryui-sortable/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo UILIBS_URL?>jquery.json.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>category.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo UILIBS_URL?>jqueryui-sortable/jquery-ui.min.css"></link>
