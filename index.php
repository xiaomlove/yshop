<?php
error_reporting(E_ALL);
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

//require_once '/protected/config/constant.php';
require_once './yshop/protected/config/constant.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

function d($param)
{
	echo '<pre>';
	var_dump($param);
	echo '</pre>';
}
require_once($yii);

Yii::createWebApplication($config)->run();
