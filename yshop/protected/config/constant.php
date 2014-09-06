<?php
/* 网站路径 */

define('SITE_URL', 'http://www.yshop.com/');
define('CSS_URL', SITE_URL.'assets/default/css/');
define('JS_URL', SITE_URL.'assets/default/js/');
define('IMG_URL', SITE_URL.'assets/default/images/');

define('ADMIN_CSS_URL', SITE_URL.'assets/admin/css/');
define('ADMIN_JS_URL', SITE_URL.'assets/admin/js/');
define('ADMIN_IMG_URL', SITE_URL.'assets/admin/images/');
define('UILIBS_URL', SITE_URL.'assets/uilibs/');

/*用户类型，前后台用户  */
define('USER_FRONT', 0);
define('USER_BACK', 1);

/*用户性别  */
define('GENDER_MAN', 1);
define('GENDER_WOMAN', 2);
define('GENDER_UNKNOWN', 3);

/*ajax删除返回信息  */
define('PARAM_ERROR', '参数错误');
define('NOT_EXIST', '目标不存在');
define('ACTION_FAILED', '执行失败');

/*品牌logo*/
define('BRAND_LOGO_URL', './assets/admin/images/brand_logo_img/');//上传目录
define('BRAND_LOGO_WIDTH', 120);//logo图片裁切宽度
define('BRAND_LOGO_HEIGHT', 80);//logo图片裁切高度
