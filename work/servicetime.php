<?php
/**
 * 服务时间统计
 * @copyright (c) zhangyulin All Rights Reserved
 */

require_once 'globals.php';

//
if ($action == '') {
	$emPage = new Log_Model();

	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

	$pages = $emPage->getLogsForAdmin('', '', $page, 'page');
	$pageNum = $emPage->getLogNum('','','page', 1);

	$pageurl =  pagination($pageNum, Option::get('admin_perpage_num'), $page, "./page.php?page=");

	include View::getView('header');
	require_once(View::getView('servicetime'));
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
	require_once(View::getView('servicetime'));
	include View::getView('footer');
	View::output();
}
//
if ($action == 'new') {
	include View::getView('header');
	require_once(View::getView('xxx'));
	include View::getView('footer');
	View::output();
}
