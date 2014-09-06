<?php
/**
 * Yii bootstrap file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @package system
 * @since 1.0
 */

require(dirname(__FILE__).'/YiiBase.php');

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It encapsulates {@link YiiBase} which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of YiiBase.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system
 * @since 1.0
 */
class Yii extends YiiBase
{
	private static $config = null;
	
	public static function setConfig($file)
	{
		if(is_string($file) && !empty($file) && self::$config === null)
		{
			self::$config = require_once($file);
		}
	}
	public static function getConfig($key)
	{
		if(is_string($key) && isset(self::$config[$key]))
		{
			return self::$config[$key];
		}else{
			return null;
		}
	}
}
