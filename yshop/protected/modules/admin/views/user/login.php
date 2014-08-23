<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo UILIBS_URL?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo UILIBS_URL?>font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo UILIBS_URL?>jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo UILIBS_URL?>bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
	#my-login-form{display:block;}
	#my-reset-form{display:none;}
	#my-register-form{display:none;}

	body{
		<?php if(!empty($imgurl))
		{
			echo 'background-image:url('.$imgurl.')';
		}else{
			echo 'background-color:#444444 !important;';
		}
		?>
	}
	a{cursor:pointer;}
	input:focus{outline:none}
	.logo{margin:8% auto 0;padding:10px;}
	.login-form, .form-title{width:25%;min-width:320px;margin:0 auto;background-color:#FFFFFF;}
	.login-form, .form-title{width:270px\9;min-width:270px\9}
	.logo{text-align: center}
	.form-title{text-align:center;padding:20px 30px;font-size:25px}
	.login-form{padding:0 30px 10px}
	.control-input{border-width:1px 1px 1px 2px;border-color: #E5E5E5 #E5E5E5 #E5E5E5 #35AA47 ;border-style:solid;margin-bottom:20px;height:40px;line-height:40px;}
	.control-input input{height:80%;line-height:100%;margin:0 !important;width:88%;border-width:0;padding-left:10px}
	.control-input input{line-height:220%\9}

	.control-input i{width:10%;color:gray;text-align:center;margin:0 !important}
	
	.control-captcha, .control-action{margin-bottom:20px;height:40px;line-height:40px;border:1px none red;}
	.captcha-img{width:50%;height:100%;float:left}
	.captcha-img img{margin-top:4px}
	
	.captcha-value{width:50%;height:100%;float:left;}
	.captcha-value input{height:80%;line-height:100%;border:1px solid #E5E5E5;width:100%;padding-left:10px}
	.captcha-value input{line-height:220%\9}


	.remember{float:left;height: 40px;line-height: 40px;vertical-align:middle;position:relative;}
	.remember input{position:absolute;z-index:-1 !important;}/*尼玛，这做法好，兼容性强*/
	
	.remember span{margin-left:25px;}
	.control-action>label{font-weight:normal;margin:0;padding:0;vertical-align: middle}
	.div-checkbox{width:19px;height:19px;top:10px;position:absolute;display:inline-block;background:url(<?php echo ADMIN_IMG_URL?>sprite.png);background-position: -38px -260px}
	.login{width:50%;float:right;height:40px;line-height: 40px;text-align: right;vertical-align: middle}
	.submit-btn{background-color:#35aa47;width:80px;text-align:center;height:30px;vertical-align: middle;line-height: 30px;display: inline-block;color:#eee;}
	.submit-btn i{margin-left:5px;}
	.submit-btn:hover{background-color:#1d943b !important;cursor:pointer;}
	.division{background-color:#E5E5E5;height:1px;margin-left:-30px;margin-right:-30px;}
	.prompt{height:40px;line-height: 40px;}
	.copy-right{text-align: center;margin-top:5px;position:fixed;bottom:10px}
	.copy-right span{margin:0 5px;}

	/*.form-title div:last-of-type{font-size:10px;}*/
	.reset-message{margin-bottom:10px;}
	#reset-goback, #register-goback{width:50%;float:left;text-align: left}
	#commit{float:right;}
	#reset-goback-btn i, #register-goback-btn i{margin-right:5px;margin-left:0;}

	.errorMessage{height:20px;line-height:20px;font-size:12px;color:#b94a48;margin:-14px 0 10px}
	.verify-error{width:50%;float:right}
	
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 logo"></div>
		</div>
		<div class="row">
			<div class="col-xs-12" id="my-login-form">
				<div class="form-title">登陆您的账号</div>
				
				<?php $form = $this->beginWidget('CActiveForm', array(
					'htmlOptions' => array('class' => 'login-form', 'autocomplete' => 'off', 'id' => 'login-submit')
				))?>
				  <div class="control-input">
					<i class="fa fa-user"></i>
					
					<?php echo $form->textField($loginForm, 'username', array('id' => 'username', 'autofocus' => 'autofucus', 'placeholder' => '用户名'))?>
				  </div>
				  <?php echo $form->error($loginForm, 'username')?>
				  
				  <div class="control-input">
					<i class="fa fa-lock"></i>
					<?php echo $form->passwordField($loginForm, 'password', array('id' => 'password', 'placeholder' => '密码'))?>
					
				  </div>
				  <?php echo $form->error($loginForm, 'password')?>
				  
				  <div class="control-captcha">
					<div class="captcha-img">
						
						<?php $this->widget('CCaptcha', array(
							'showRefreshButton' => 'true',
							'clickableImage' => 'true',
							'imageOptions' => array(
								'alt' => '点击更换',
								'title' => '点击更换',
								'style' => 'cursor:pointer'
							)
						))?>
					</div>
					<div class="captcha-value">
						
						<?php echo $form->textField($loginForm, 'verifyCode', array('id' => 'verifyCode', 'placeholder' => '验证码'))?>
					</div>
					
				  </div>
				  <div class="errorMessage">
				  <?php echo $form->error($loginForm, 'verifyCode', array('class' => 'verify-error'))?>
				  </div>
				  <div class="control-action">
						<label class="remember" id="label-remember" for="remember">
							
							<?php echo $form->checkBox($loginForm, 'remember', array('id' => 'remember', 'class' => 'admit' ,'value' => 1))?>
							<div class="div-checkbox" id="div-checkbox">
							</div>
							<span>记住我</span>
						</label>
						<div class="login">
							<div class="submit-btn" id="submit">登陆<i class="fa fa-arrow-circle-o-right"></i></div>
						</div>
				  </div>
				  <div class="division"></div>
				  <div class="prompt">忘记了密码？<a id="goReset" >点此重置</a></div>
				  <div class="prompt">还没有账号？<a id="goRegister" >创建一个</a></div>
				<?php $this->endWidget()?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12" id="my-reset-form">
				<div class="form-title">
					<div>重置您的账号</div>
					
				</div>

				<form class="login-form" autocomplete="on">
				  <div class="reset-message">输入您的邮箱，重置账号</div>
				  <div class="control-input">
					<i class="fa fa-envelope-o"></i>
					<input type="text" name="email" autofocus="autofocus" placeholder="邮箱">
				  </div>
				  
				  <div class="control-action">
						<div class="login" id="reset-goback">
							<div class="submit-btn" id="reset-goback-btn"><i class="fa fa-arrow-circle-o-left"></i>返回</div>
						</div>
						<div class="login" id="commit">
							<div  class="submit-btn" id="submit">提交<i class="fa fa-arrow-circle-o-right"></i></div>
						</div>
				  </div>
				  
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12" id="my-register-form">
				<div class="form-title">创建您的账号</div>
				<form class="login-form" autocomplete="on">
				  <div class="control-input">
					<i class="fa fa-user"></i>
					<input type="text" name="username" autofocus="autofocus" placeholder="用户名">
				  </div>
				  <div class="control-input">
					<i class="fa fa-lock"></i>
					<input type="password" name="password" placeholder="密码">
				  </div>
				  <div class="control-input">
					<i class="fa fa-check"></i>
					<input type="password" name="re-password" placeholder="重复密码">
				  </div>
				  <div class="control-input">
					<i class="fa fa-envelope-o"></i>
					<input type="text" name="email" placeholder="邮箱">
				  </div>
				  <div class="control-action">
						<label class="remember" for="remember-agree">
							<input type="checkbox" name="remember" id="remember-agree" class="admit" value="1">
							<div class="div-checkbox" id="div-checkbox">
							</div>
							<span>同意</span>
						</label>
						<a>用户协议。</a>
				  </div>
				  <div class="control-action">
						<div class="login" id="register-goback">
							<div class="submit-btn" id="register-goback-btn"><i class="fa fa-arrow-circle-o-left"></i>返回</div>
						</div>
						<div class="login" id="commit">
							<div  class="submit-btn" id="submit">提交<i class="fa fa-arrow-circle-o-right"></i></div>
						</div>
				  </div>
				  
				</form>
			</div>
		</div>


		
		<div class="row">
			<div class="col-xs-12 copy-right">
				<span class="social">Copyright@xiaomiao|晨雨零稀 &copy 2014</span>
				<span class="social"><i class="fa fa-qq fa-2x"></i></span>
				<span class="social"><i class="fa fa-weibo fa-2x"></i></span>
			</div>
		
		</div>
		
	</div>
</body>
<script type="text/javascript">
	$(".remember").click(function(){
		// $(".remember").each(function(){
			$obj = $("#div-checkbox")
			// alert($("#remember").prop("checked"));
			if($(this).children(".admit").prop("checked")) {
				// alert('aa');
				$(this).children(".div-checkbox").css("background-position", "-114px -260px");
			} else {
				// alert('bb');
				$(this).children(".div-checkbox").css("background-position", "-38px -260px");
			}
		})
	// })

	var $login = $("#my-login-form");
	var $reset = $("#my-reset-form");
	var $register = $("#my-register-form");	
	$("#reset-goback-btn, #register-goback-btn").click(function(){
		$register.css('display','none');
		$reset.css('display', 'none');
		$login.css('display', 'block');

		
	})

	$("#goRegister").click(function(){
		$register.css('display','block');
		$reset.css('display', 'none');
		$login.css('display', 'none');
		return false;
	})
	$("#goReset").click(function(){
		$register.css('display','none');
		$reset.css('display', 'block');
		$login.css('display', 'none');
		return false;
	})
	$("#submit").click(function(){
		$("#login-submit").submit();
	})
	$(".captcha-img img").click(function(){
		$(this).attr('src', '/index.php?r=admin/user/captcha&v='+(new Date()).getTime());
	})

</script>
</html>
