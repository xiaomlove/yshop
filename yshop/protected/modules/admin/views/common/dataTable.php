<div class="row">
	<div class="col-xs-12">
		<div class="before-table">
			<button class="btn btn-primary btn-xs" id="add-brand"><i class="fa fa-plus"></i>添加品牌</button>
			<button class="btn btn-primary btn-xs pull-right" id=""><i class="fa fa-plus"></i>保存更改</button>
		</div>
		<div class="action-table">
			<div class="pull-left per-page" id="per-page">
				<select name="">
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="50">50</option>					
				</select>
			</div>
			<div class="pull-right search" id="search"><input type="text" name="search" placeholder="搜索"></div>
		</div>
		<table class="table table-bordered" id="brandTable">
			 <thead>
		        <tr>
		            <th>品牌Logo</th>
		            <th>品牌名称</th>
		            <th>品牌英文名</th>
		            <th>品牌官网</th>
		            <th>操作</th>
		        </tr>
		    </thead>
		 
		 
		    <tbody>
		    <?php if(count($brandList)):?>
		    <?php foreach($brandList as $brand):?>
		        <tr>
		            <td><?php echo $brand['brand_logo_img']?></td>
		            <td><?php echo $brand['brand_name']?></td>
		            <td><?php echo $brand['brand_english_name']?></td>
		            <td><?php echo $brand['brand_home_url']?></td>
		            <td class="action-href"><a href="#">编辑</a><a href="#">删除</a></td>
		        </tr>
		     <?php endForeach?>
		     <?php endIf?>
		        
		    </tbody>
		</table>
		<div class="after-table">
			<div class="pull-left record-number" id="">共xxx条数据，当前显示1-10</div>
			<div class="pull-right" id="">
				<ul class="pagination">
				  <li><a href="#">&laquo;</a></li>
				  <li><a href="#">1</a></li>
				  <li><a href="#">2</a></li>
				  <li class="active"><a href="#">3</a></li>
				  <li><a href="#">4</a></li>
				  <li><a href="#">5</a></li>
				  <li><a href="#">&raquo;</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
