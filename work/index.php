<?php
/**
 * 管理中心
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

if ($action == '') {
	$avatar = empty($user_cache[UID]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[UID]['avatar'];
	$name =  $user_cache[UID]['name'];
	 if (ROLE == 'admin'):
	$serverapp = $_SERVER['SERVER_SOFTWARE'];
	$DB = MySql::getInstance();
	$mysql_ver = $DB->getMysqlVersion();
	$php_ver = PHP_VERSION;
	$uploadfile_maxsize = ini_get('upload_max_filesize');
	$safe_mode = ini_get('safe_mode');

	if (function_exists("imagecreate")) {
		if (function_exists('gd_info')) {
			$ver_info = gd_info();
			$gd_ver = $ver_info['GD Version'];
		} else{
			$gd_ver = '支持';
		}
	} else{
		$gd_ver = '不支持';
	}
    endif;
    $emPage = new Log_Model();

	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

	$pages = $emPage->getLogsForHome('',$page, Option::get('admin_perpage_num'));
	$pageNum = $emPage->getLogNum('','','blog', 1);

	$pageurl =  pagination($pageNum, Option::get('admin_perpage_num'), $page, "./page.php?page=");
    
	include View::getView('header');
	require_once(View::getView('index'));
	include View::getView('footer');
	View::output();
}
//phpinfo()
if ($action == 'phpinfo') {
	@phpinfo() OR emMsg("phpinfo函数被禁用!");
}
