<div class="row">
	<div class="col-xs-12">
		<div class="action-table">
		<!-- 
			<div class="per-page">
				<select name="" id="per-page">
					<option value="5">5</option>
					<option value="20">20</option>
					<option value="50">50</option>					
				</select>
			</div>
		 -->
			<div class="btn btn-primary btn-xs" id="add-brand"><i class="fa fa-minus"></i>批量删除</div>
			<a class="btn btn-primary btn-xs" id="" href="<?php echo $this->createUrl('brand/add')?>"><i class="fa fa-plus"></i>添加品牌</a>
			<a class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>保存更改</a>
			<div class="table-title">分类【<?php echo $catInfo['item_category_name']?>】下的品牌</div>
			<div class="pull-right search"><input type="text" name="search" id="search" placeholder="搜索"><i class="fa fa-search search-icon"></i></div>
		</div>
		<table class="table table-bordered" id="table">
			 <thead>
		        <tr>
		        	<th id="brand_logo"><input type="checkbox" id="select-all" class="my-checkbox">品牌logo</th>	   
		        	<th id="brand_name">品牌名称</th>	   
		            <th id="brand_english_name">品牌英文名</th>	            
		            <th id="brand_home_url">移动</th>	            
		        	<th>操作</th>
		        
		        </tr>
		    </thead>
		 
		 
		    <tbody id="tbody">
		   
		    </tbody>
		</table>
		<div class="after-table">
			<div class="pull-left record-number" id="record-number">
				共<span id="total"></span>条数据，分<span id="totalPage"></span>页显示，当前显示<span id="begin"></span>—<span id="end"></span>
			</div>
			<div class="pull-right" id="pagination">
				
			</div>
			
		</div>
	</div>
</div>

<style>
	#tbody tr>td:first-of-type{padding-top:5px;padding-bottom:5px}
	td{vertical-align:middle !important}
</style>

<script type="text/javascript">
	var dataUrl = "<?php echo $this->createUrl('categoryBrand/list', array('catId'=>$catInfo['item_category_id']))?>";
	var deleteUrl = "<?php echo $this->createUrl('categoryBrand/delete', array('catId'=>$catInfo['item_category_id']))?>"
	var showPagination = false;
	$(document).ready(function(){
		getData(dataUrl, false, false, false, showPagination);
		sortField('brand_name', 'brand_english_name');
	});	
</script>
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>table.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>brand.js"></script>
