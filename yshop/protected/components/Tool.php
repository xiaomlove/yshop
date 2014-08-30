<?php

class Tool
{
	public static function getAdminMenuArray()
	{		
		$adminConfig = require_once Yii::app()->basePath.'/config/admin_config.php';
		return $adminConfig['leftMenu'];
	}
}