<?php
/**
 * 活动管理
 * @copyright (c) zhangyulin All Rights Reserved
 */

require_once 'globals.php';

//加载活动管理活动
if ($action == '') {
	$emPage = new Log_Model();

	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

	$pages = $emPage->getEventsForHome('', $page, Option::get('admin_perpage_num'));
	$pageNum = $emPage->getLogNum('','','event', 1);

	$pageurl =  pagination($pageNum, Option::get('admin_perpage_num'), $page, "./page.php?page=");

	include View::getView('header');
	require_once(View::getView('list_event'));
	include View::getView('footer');
	View::output();
}
//加载活动管理活动
if ($action == 'admin') {
	$emPage = new Log_Model();

	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

	$pages = $emPage->getLogsForAdmin('', '', $page, 'event');
	$pageNum = $emPage->getLogNum('','','event', 1);

	$pageurl =  pagination($pageNum, Option::get('admin_perpage_num'), $page, "./page.php?page=");

	include View::getView('header');
	require_once(View::getView('admin_event'));
	include View::getView('footer');
	View::output();
}
//显示新建活动表单
if ($action == 'new') {
	include View::getView('header');
	require_once(View::getView('add_event'));
	include View::getView('footer');
	View::output();
}
//显示编辑活动表单
if ($action == 'mod') {
	$emPage = new Log_Model();

	$pageId = isset($_GET['id']) ? intval($_GET['id']) : '';
	$pageData = $emPage->getOneLogForAdmin($pageId);
	extract($pageData);

	$pageUrl = isset($navibar[$pageId]['url']) ? $navibar[$pageId]['url'] : '' ;
	$blank = isset($navibar[$pageId]['is_blank']) ? $navibar[$pageId]['is_blank'] : '' ;

	$is_allow_remark = $allow_remark == 'y' ? 'checked="checked"' : '';
	$is_blank = $blank == '_blank' ? 'checked="checked"' : '';

	include View::getView('header');
	require_once(View::getView('edit_event'));
	include View::getView('footer');
	View::output();
}
//保存活动
if ($action == 'add' || $action == 'edit' || $action == 'autosave') {
	$emPage = new Log_Model();
	$Navi_Model = new Navi_Model();

	$title = isset($_POST['title']) ? addslashes(trim($_POST['title'])) : '';
	$content = isset($_POST['content']) ? addslashes(trim($_POST['content'])) : '';
	$alias = isset($_POST['alias']) ? addslashes(trim($_POST['alias'])) : '';
	$pageId = isset($_POST['as_logid']) ? intval(trim($_POST['as_logid'])) : -1;//如被自动保存为草稿则有blog id号
	$ishide = isset($_POST['ishide']) && empty($_POST['ishide']) ? 'n' : addslashes($_POST['ishide']);
	$allow_remark = isset($_POST['allow_remark']) ? addslashes(trim($_POST['allow_remark'])) : 'n';

	$postTime = $emPage->postDate(Option::get('timezone'));

	//check alias
	if (!empty($alias)) {
		$logalias_cache = $CACHE->readCache('logalias');
		$alias = $emPage->checkAlias($alias, $logalias_cache, $pageId);
	}

	$logData = array(
	'title'=>$title,
	'content'=>$content,
	'excerpt'=>'',
	'date'=>$postTime,
	'allow_remark'=>$allow_remark,
	'hide'=>$ishide,
	'alias'=>$alias,
	'type'=>'event'
	);

	if ($pageId > 0) {//自动保存后,添加变为更新
		$emPage->updateLog($logData, $pageId);
	} else{
		$pageId = $emPage->addlog($logData);
	}

	$CACHE->updateCache(array('options', 'logalias'));

	switch ($action) {
		case 'autosave':
			echo "autosave_gid:{$pageId}_df:0_";
			break;
		case 'add':
		case 'edit':
			if ($action == 'add') {
				emDirect("./event.php?action=admin&active_hide_n=1");//活动发布成功
			} else {
				emDirect("./event.php?action=admin&active_savepage=1");//活动保存成功
			}
			break;
	}
}
//操作活动
if ($action == 'operate_page') {
	$operate = isset($_POST['operate']) ? $_POST['operate'] : '';
	$pages = isset($_POST['page']) ? array_map('intval', $_POST['page']) : array();

	$emPage = new Log_Model();

	switch ($operate) {
		case 'del':
			foreach ($pages as $value) {
				$emPage->deleteLog($value);
				unset($navibar[$value]);
			}
			$navibar = addslashes(serialize($navibar));
			Option::updateOption('navibar', $navibar);
			$CACHE->updateCache(array('options', 'sta', 'comment', 'logalias'));

			emDirect("./event.php?action=admin&active_del=1");
			break;
		case 'hide':
		case 'pub':
			$ishide = $operate == 'hide' ? 'y' : 'n';
			foreach ($pages as $value) {
				$emPage->hideSwitch($value, $ishide);
				$navibar[$value]['hide'] = $ishide;
			}
			$navibar = addslashes(serialize($navibar));
			Option::updateOption('navibar', $navibar);
			$CACHE->updateCache(array('options', 'sta', 'comment'));
			emDirect("./event.php?action=admin&active_hide_".$ishide."=1");
			break;
	}
}
