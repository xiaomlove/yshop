<div class="row profile">
	<div class="col-xs-12">
		<h2 class="page-header">我的信息</h2>
		<?php if(!empty($userInfo)):?>
		<div class="col-xs-4 user-avatar">
		
		</div>
		<div class="col-xs-8">
			<div class="">
			    <ul role="tablist" class="nav nav-tabs" id="myTab">
			      <li class="active"><a data-toggle="tab" role="tab" href="#overview">信息概览</a></li>
			      <li class=""><a data-toggle="tab" role="tab" href="#other">其他信息</a></li>
			      <li class=""><a data-toggle="tab" role="tab" href="#edit">编辑信息</a></li>
			      
			    </ul>
			    <div class="tab-content" id="myTabContent">
			      <div class="overview tab-pane active" id="overview">
					<h1><?php echo $userInfo->user_name?></h1>
					<table class="table">
						<tr>
							<td>真实姓名</td>
							<td><?php echo $userInfo->user_real_name?></td>
						</tr>
						<tr>
							<td>性别</td>
							<td>
							<?php 
								$gender = '';
								switch ($userInfo->user_gender)
								{
									case GENDER_MAN:
										$gender = '男';
										break;
									case GENDER_WOMAN:
										$gender = '女';
										break;
									case GENDER_UNKNOWN:
										$gender = '未知';
										break;
									defalut:
										$gender = '未知';
										break;
								}
							
								echo $gender;
							?>
							</td>
						</tr>
						
						<tr>
							<td>邮箱</td>
							<td><?php echo $userInfo->user_email?></td>
						</tr>
					
					
						<tr>
							<td>手机</td>
							<td><?php echo $userInfo->user_phone?></td>
						</tr>
					
						<tr>
							<td>QQ</td>
							<td><?php echo $userInfo->user_qq?></td>
						</tr>
						<tr>
							<td>生日</td>
							<td><?php echo $userInfo->user_birthday?></td>
						</tr>
						<tr>
							<td>消费积分</td>
							<td><?php echo $userInfo->user_cost_credits?></td>
						</tr>
						<tr>
							<td>信誉积分</td>
							<td><?php echo $userInfo->user_credit_credits?></td>
						</tr>
						<tr>
							<td>用户角色</td>
							<td><?php echo $userInfo->user_role_key?></td>
						</tr>
						
					</table>
				</div>
			      <div id="other" class="tab-pane fade in">
			    	<table class="table other-table">
						
						<tr>
							<td>上次登陆时间</td>
							<td><?php echo date('Y-m-d H:i:s', $userInfo->user_last_login_time)?></td>
						</tr>
						<tr>
							<td>上次登陆IP</td>
							<td><?php echo $userInfo->user_last_login_ip?></td>
						</tr>
						<tr>
							<td>登陆次数</td>
							<td><?php echo $userInfo->user_login_count?></td>
						</tr>
						<tr>
							<td>注册时间</td>
							<td><?php echo date('Y-m-d H:i:s', $userInfo->user_register_time)?></td>
						</tr>
						<tr>
							<td>注册IP</td>
							<td><?php echo $userInfo->user_register_ip?></td>
						</tr>
						
					</table>
			      </div>
			      <div id="edit" class="tab-pane fade">
			        <?php 
			        	if(Yii::app()->user->hasFlash('success'))
			        	{
			        		echo Yii::app()->user->getFlash('success');
			        	}
			        ?>
			        <?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off')))?>
					  <div class="form-group"> 
					    <?php echo $form->labelEx($userModel, 'user_name', array('class' => 'col-sm-2 control-label'))?>
					    <div class="col-sm-10">
					      <?php echo $form->textField($userModel, 'user_name', array('class' => 'form-control', 'id' => 'user_name', 'value' => $userInfo->user_name))?>
					    </div>
					    <?php echo $form->error($userModel, 'user_name', array('class' => 'col-xs-10 col-xs-offset-2'))?>
					  </div>
					  
					  <div class="form-group"> 
					    <?php echo $form->labelEx($userModel, 'user_password', array('class' => 'col-sm-2 control-label'))?>
					    <div class="col-sm-10">
					      <?php echo $form->passwordField($userModel, 'user_password', array('class' => 'form-control', 'id' => 'user_password', 'value' => ''))?>
					    </div>
					    <?php echo $form->error($userModel, 'user_password', array('class' => 'col-xs-10 col-xs-offset-2'))?>
					  </div>
					  <div class="form-group"> 
					    <?php echo $form->labelEx($userModel, 'new_user_password', array('class' => 'col-sm-2 control-label'))?>
					    <div class="col-sm-10">
					      <?php echo $form->passwordField($userModel, 'new_user_password', array('class' => 'form-control', 'id' => 'new_user_password', 'value' => ''))?>
					    </div>
					    <?php echo $form->error($userModel, 'new_user_password', array('class' => 'col-xs-10 col-xs-offset-2'))?>
					  </div>
					  <div class="form-group"> 
					    <?php echo $form->labelEx($userModel, 're_new_user_password', array('class' => 'col-sm-2 control-label'))?>
					    <div class="col-sm-10">
					      <?php echo $form->passwordField($userModel, 're_new_user_password', array('class' => 'form-control', 'id' => 're_new_user_password', 'value' => ''))?>
					    </div>
					    <?php echo $form->error($userModel, 're_new_user_password', array('class' => 'col-xs-10 col-xs-offset-2'))?>
					  </div>
					  <div class="form-group"> 
					    <?php echo $form->labelEx($userModel, 'user_real_name', array('class' => 'col-sm-2 control-label'))?>
					    <div class="col-sm-10">
					      <?php echo $form->textField($userModel, 'user_real_name', array('class' => 'form-control', 'id' => 'user_real_name', 'value' => $userInfo->user_real_name))?>
					    </div>
					    <?php echo $form->error($userModel, 'user_real_name', array('class' => 'col-xs-10 col-xs-offset-2'))?>
					  </div>
					  <div class="form-group"> 
					    <?php echo $form->labelEx($userModel, 'user_qq', array('class' => 'col-sm-2 control-label'))?>
					    <div class="col-sm-10">
					      <?php echo $form->textField($userModel, 'user_qq', array('class' => 'form-control', 'id' => 'user_qq', 'value' => $userInfo->user_qq))?>
					    </div>
					    <?php echo $form->error($userModel, 'user_qq', array('class' => 'col-xs-10 col-xs-offset-2'))?>
					  </div>
					  <div class="form-group"> 
					    <?php echo $form->labelEx($userModel, 'user_phone', array('class' => 'col-sm-2 control-label'))?>
					    <div class="col-sm-10">
					      <?php echo $form->textField($userModel, 'user_phone', array('class' => 'form-control', 'id' => 'user_phone', 'value' => $userInfo->user_phone))?>
					    </div>
					    <?php echo $form->error($userModel, 'user_phone', array('class' => 'col-xs-10 col-xs-offset-2'))?>
					  </div>
					  <div class="form-group"> 
					    <?php echo $form->labelEx($userModel, 'user_birthday', array('class' => 'col-sm-2 control-label'))?>
					    <div class="col-sm-10">
					      <?php echo $form->textField($userModel, 'user_birthday', array('class' => 'form-control', 'id' => 'user_birthday', 'value' => $userInfo->user_birthday))?>
					    </div>
					    <?php echo $form->error($userModel, 'user_birthday', array('class' => 'col-xs-10 col-xs-offset-2'))?>
					  </div>
					 
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">保存</button>
					    </div>
					  </div>
					<?php $this->endWidget()?>
			      </div>
			      
			    </div>
			  </div>
			
		</div>
		<?php endIf?>
	</div>
</div>
<?php if($submit == 'submit'):?>
	<script type="text/javascript">
		$("#myTab a:last").tab('show');
	</script>
<?php endIf?>