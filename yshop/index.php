<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//开启错误处理，默认就是打开的
defined('YII_ENABLE_ERROR_HANDLER') || define('YII_ENABLE_ERROR_HANDLER', true);
defined('YII_ENABLE_EXCEPTION_HANDLER') || define('YII_ENABLE_EXCEPTION_HANDLER', true);
function d($param)
{
	echo '<pre>';
	var_dump($param);
	echo '</pre>';
}
//require_once($yii)需要放在define那堆的后面？？？先引入了$yii,YiiBase定义了degub为false，再这样子写就没效了。
require_once($yii);
require_once './protected/config/constant.php';
Yii::setConfig('./protected/config/admin_config.php');
Yii::createWebApplication($config)->run();
