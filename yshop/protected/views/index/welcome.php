<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<meta name="description" content="Coming Soon MF is a free simple and good looking under constrauction / coming soon html page"/>
		<meta name="keywords" content="under construction, coming soon, html, css, page, template, free"/>
        <link rel="stylesheet" href="<?php echo CSS_URL?>welcome.css" />
       	<style>
/*************** F O N T S *************************/
@font-face {
    font-family: 'GessoRegular';
    src: url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/GESSO___-webfont.eot');
    src: url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/GESSO___-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/GESSO___-webfont.woff') format('woff'),
         url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/GESSO___-webfont.ttf') format('truetype'),
         url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/GESSO___-webfont.svg#GessoRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'LintsecRegular';
    src: url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/Lintsec-webfont.eot');
    src: url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/Lintsec-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/Lintsec-webfont.woff') format('woff'),
         url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/Lintsec-webfont.ttf') format('truetype'),
         url('<?php echo Yii::app()->request->hostInfo?>/assets/default/fonts/Lintsec-webfont.svg#LintsecRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}

/************  R E S E T ******************************/
*{
	margin: 0;
	padding: 0;
	list-style-type: none;
}
body{
	font-family: Arial, sans-serif;
	background: url('<?php echo Yii::app()->request->hostInfo?>/assets/default/images/dust.png') repeat;
	color: #080808;
}

/********** G E N E R A L    S T Y L E ***************/
#wrapper{
	width: 880px;
	height: 310px;
	margin: 140px auto;
	background: url('<?php echo Yii::app()->request->hostInfo?>/assets/default/images/uc.png') no-repeat;
	padding-top: 40px;
}
#content{
	margin: 5px 0 0 380px;
}

/*********  L O G O  &  CM   S T Y L E *******************/
h1{
	font-family: LintsecRegular;
	font-weight: normal;
	font-size: 35px;
	color: #FFF200;
	background-color: #000;
	padding: 13px 0 10px 12px;
	width: 405px;
	border-radius: 8px;
	text-align:center
}
h2{
	font-family: GessoRegular;
	font-weight: normal;
	font-size: 90px;
	margin: 0 0 -45px -4px;
}
p{
	font-size: 16px;
	text-shadow: 1px 1px 0 #fff;
    font-weight: bold;
}
#o{
	margin: 20px 0 -70px 0;
	font-size: 28px;
	text-transform: uppercase;
	font-weight: bold;
}
a img{
	margin: 10px 10px 10px 0;
}

/************ F o r  m   S T Y L E ***********************/
form{
	margin-top: 10px;
}
#sub input{
	display: block;
	float: left;
}

input[type="email"]{
	height: 26px;
	width: 310px;
	color: #121212;
	background-color: #ccc;
	border: 1px inset #888;
	border-radius: 5px;
	padding-left: 6px;
}
input[type="submit"]{
	width: 95px;
	height: 29px;
	color: #fff200;
	font-weight: bold;
	background-color: #000;
	border: 2px outset #181818;
	border-radius: 5px;
	margin: -1px 0 0 4px;
}
input[type="submit"]:hover{
	cursor:pointer;
}
input[type="submit"]:active{
	padding: 0 3px 3px 0;
	color: #fff200;
	border: 2px inset #181818;
}
		
		</style>
        <title>Coming Soon MF</title>
    </head>
    <body>
		<div id="wrapper">
			<div id="content">
				<h1>YSHOP</h1>
				<p id="o">Our website is</p>
				<h2>Coming Soon</h2>
				<p>But you can go to backend to have  a see
					<a href="<?php echo $this->createUrl('admin/user/login')?>">GO!</a>
				</p>
			
					
				
			</div>
		</div>
	</body>
</html>
		
		
			
    
    