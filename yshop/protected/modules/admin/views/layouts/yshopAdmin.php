<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台首页</title>
	<link rel="stylesheet" type="text/css" href="<?php echo UILIBS_URL?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo UILIBS_URL?>font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>admin.css">
	<script type="text/javascript" src="<?php echo UILIBS_URL?>jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo UILIBS_URL?>bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>admin.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="top navbar-fixed-top">
				<div class="col-xs-12">
					<ul class="list-unstyled list-inline user-info">
						<li>当前时间：<span id="time"></span></li>
						<li><a href="<?php echo $this->createUrl('user/profile')?>" title="我的信息"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo Yii::app()->user->name?></a></li>
						<li><a href="<?php echo $this->createUrl('user/logout')?>" title="退出"><i class="fa fa-sign-out"></i></a></li>
						
					</ul>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-xs-2 left">
				<ul class="list-unstyled">
					<li><span><i class="fa fa-list-ul"></i></span></li>
					<li>
						<a  href="<?php echo $this->createUrl('index/index')?>">
							<i class="fa fa-home"></i>
							<span>主页</span>
						</a>
					</li>
					<li>
						<a>
							<i class="fa fa-archive"></i>
							<span>商品管理</span>
							<span class="drop-icon"><i class="fa fa-chevron-left"></i></span>
						</a>
						<ul class="list-unstyled">
							<li><a href="<?php echo $this->createUrl('category/list')?>">商品分类</a></li>
							<li><a href="#">商品列表</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							
						</ul>
					</li>
					<li>
						<a>
							<i class="fa fa-user"></i>
							<span>用户管理</span>
							<span class="drop-icon"><i class="fa fa-chevron-left"></i></span>
						</a>
						<ul class="list-unstyled">
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							
						</ul>
					</li>
					<li>
						<a>
							<i class="fa fa-list-alt"></i>
							<span>订单管理</span>
							<span class="drop-icon"><i class="fa fa-chevron-left"></i></span>
						</a>
						<ul class="list-unstyled">
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							
						</ul>
					</li>
					<li>
						<a>
							<i class="fa fa-gear"></i>
							<span>设置</span>
							<span class="drop-icon"><i class="fa fa-chevron-left"></i></span>
						</a>
						<ul class="list-unstyled">
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							<li><a>子菜单</a></li>
							
						</ul>
					</li>
					
					
				</ul>
			</div>
			<div class="col-xs-offset-2 col-xs-10 main">
			<?php echo $content?>
			</div>
		
		</div>
		<div class="row foot">
			<div class="copy-right">Create By xiaomiao|晨雨零稀 &copy 2014</div>
		</div>		
	</div>
	<div id="bgDiv"  style="display:none"></div>
	<div id="loadingImg" class="loadingImg">
		<img src="<?php echo ADMIN_IMG_URL?>712.gif" style="width:50px;display:none">
		<div class='saveSuccess' style="display:none">保存成功！</div>
	</div>

</body>
</html>
        

