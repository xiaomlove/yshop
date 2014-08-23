<div class="row welcome">
	<div class="col-xs-12">
		<h2 class="page-header">欢迎光临管理后台</h2>
		<table class="table table-striped table-bordered">
			<tr>
				<td>用户名</td>
				<td><?php echo Yii::app()->user->name?></td>
			</tr>
			<tr>
				<td>登陆时间</td>
				<td><?php echo Yii::app()->session['loginTime']?></td>
			</tr>
			<tr>
				<td>登陆IP</td>
				<td><?php echo Yii::app()->request->userHostAddress?></td>
			</tr>
			

			<tr>
				<td colspan="2"><i class="fa fa-database"></i>服务器信息</td>
			</tr>
			<tr>
				<td>服务器环境</td>
				<td><?php echo $_SERVER['SERVER_SOFTWARE']?></td>
			</tr>
		
			<tr>
				<td>服务器IP</td>
				<td><?php echo $_SERVER['SERVER_ADDR']?></td>
			</tr>
		
			<tr>
				<td>数据库信息</td>
				<td><?php echo mysql_get_client_info()?></td>
			</tr>
			
		</table>
	</div>
</div>
