

<div class="row">
	<div class="col-xs-12">
		<h3 class="">商品分类</h3>
	</div>
	<div class="col-xs-12 category-list">
		<div class="">
			<button class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>添加分类</button>
			<button class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>保存更改</button>
		</div>
		<div class="select-all">
			<div class="btn btn-default"><label><input type="checkbox" name="checkbox">全选</label></div>
			<div class="btn btn-default">批量删除</div>
			<div class="pull-right"><span>展开</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>收起</span></div>
			
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
			
				
				
			</ul>
			<div class="category-line"></div>
			<div class="category-line"></div>
			<div class="category-line"></div>
		</div>
		<!-- 
		<table class="table table-bordered" id="category-table">
			<tr>
				<th class="th-category-name">分类名称</th>
				<th>移动</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
			<?php if(!empty($categoryList)):?>
			<?php foreach($categoryList as $k=>$v):?>
			<tr id="<?php echo $v['item_category_path']?>">
				<td class="td-category-name">
					<input type="checkbox">
					<a class="sub-category-i-<?php echo $v['item_category_deep']?>"><i class="fa fa-caret-right"></i></a>
					<span class="sub-category-name-<?php echo $v['item_category_deep']?>"><?php echo $v['item_category_name']?></span>
				</td>
				
				<td><i class="fa fa-hand-o-up"></i></td>
				<td><?php echo date('Y-m-d H:i', $v['item_category_add_time'])?></td>
				<td>查看&nbsp;&nbsp;删除</td>
			</tr>
			<?php endForeach?>
			<?php endIf?>
			
		
		</table>
		
		 -->
	</div>
</div>


<script>
	var data = <?php echo $jsonData?>;
	var $wrap = $("#category-body").children("ul");
	for(var i = 0; i<data.length; i++){
		if(i == 0){
// 			console.log('第一个，'+i);
// 			console.log(data[i].item_category_name);
// 			console.log("wrap插入");
			$wrap.append('<li id="'+data[i].item_category_path+'" deep="'+data[i].item_category_deep+'"><input type="checkbox"><span><i class="fa fa-caret-right"></i>'+data[i].item_category_name+'</span><span><i class="fa fa-hand-o-up"></i></span><span>'+data[i].item_category_add_time+'</span><span>查看</span></li>');
		}else if(data[i].item_category_deep == data[i-1].item_category_deep){
// 			console.log('=，'+i);
// 			console.log(data[i].item_category_name);
// 			console.log("前一个的父亲插入");
			$("#"+(data[i-1].item_category_path)).parent().append('<li id="'+data[i].item_category_path+'" deep="'+data[i].item_category_deep+'"><input type="checkbox"><span><i class="fa fa-caret-right"></i>'+data[i].item_category_name+'</span><span><i class="fa fa-hand-o-up"></i></span><span>'+data[i].item_category_add_time+'</span><span>查看</span></li>');
		}else if(data[i].item_category_deep == parseInt(data[i-1].item_category_deep)+1){
// 			console.log(data[i-1].item_category_path);
// 			console.log(data[i].item_category_name);
// 			console.log("前一个自己插入ul");
// 			console.log($("#"+data[i-1].item_category_path));
			$("#"+(data[i-1].item_category_path)).append('<ul class="category-sub-'+data[i].item_category_deep+'"><li id="'+data[i].item_category_path+'" deep="'+data[i].item_category_deep+'"><input type="checkbox"><span><i class="fa fa-caret-right"></i>'+data[i].item_category_name+'</span><span><i class="fa fa-hand-o-up"></i></span><span>'+data[i].item_category_add_time+'</span><span>查看</span></li></ul>');
		}else if(data[i].item_category_deep < data[i-1].item_category_deep){
// 			console.log('<，'+i);
// 			console.log(data[i].item_category_name);
// 			console.log("同deep的最后一个ul插入");
			var deep = data[i].item_category_deep;
			$(".category-sub-"+deep).last().append('<li id="'+data[i].item_category_path+'" deep="'+data[i].item_category_deep+'"><input type="checkbox"><span><i class="fa fa-caret-right"></i>'+data[i].item_category_name+'</span><span><i class="fa fa-hand-o-up"></i></span><span>'+data[i].item_category_add_time+'</span><span>查看</span></li>');
		}
	}
	
</script>

<script>
	$("#category-body").find("li").find("i:first").each(function(){
		$(this).click(function(){
			var $i = $(this),
				$li = $i.parent().parent(),
				$deep = parseInt($li.attr("deep")),
				$id = $li.attr("id");
			$children = $li.find("li[id^='"+$id+"-']").filter(function(){
				var $childDeep = parseInt($(this).attr("deep"));
				if($childDeep == ($deep + 1)){
					return true;
				}else{
					return false;
				}
			});
			if($children.hasClass("open")){//要收起
				$children.removeClass("open").slideUp();
				
			}else{
				if($li.children("ul").length){
					
					$children.addClass("open").slideDown();
					$li.css("padding-bottom", 0);
					$li.children("ul").css("margin-top", "10px");
					$li.find("li").css({
						'border-right':'0',
						'border-bottom':'0',
						'border-left':'0'
					})
				}
			}
			
		})
			
		
	})
</script>