<?php
/**
 * 志愿者列表
 * @copyright (c) zhangyulin All Rights Reserved
 */

require_once 'globals.php';

$User_Model = new User_Model();

//加载用户管理页面
if ($action == '') {
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$users = $User_Model->getUsers($page);
    $usernum = $User_Model->getUserNum();
    $pageurl =  pagination($usernum, Option::get('admin_perpage_num'), $page, "./user.php?page=");

	include View::getView('header');
	require_once(View::getView('volunteer'));
	include View::getView('footer');
	View::output();
}
//
if ($action == 'admin') {
	$emPage = new Log_Model();

	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

	$pages = $emPage->getLogsForAdmin('', '', $page, 'page');
	$pageNum = $emPage->getLogNum('','','page', 1);

	$pageurl =  pagination($pageNum, Option::get('admin_perpage_num'), $page, "./page.php?page=");

	include View::getView('header');
	require_once(View::getView('volunteer'));
	include View::getView('footer');
	View::output();
}
//
if ($action == 'new') {
	include View::getView('header');
	require_once(View::getView('xxxx'));
	include View::getView('footer');
	View::output();
}
//
