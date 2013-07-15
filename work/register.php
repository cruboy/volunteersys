<?php
/**
 * 注册信息查看修改
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
	require_once(View::getView('register'));
	include View::getView('footer');
	View::output();
}

//显示编辑表单
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
//保存
if ($action == 'edit' ) {
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
	'type'=>'page'
	);

	if ($pageId > 0) {//自动保存后,添加变为更新
		$emPage->updateLog($logData, $pageId);
	} else{
		$pageId = $emPage->addlog($logData);
	}

	$CACHE->updateCache(array('options', 'logalias'));


	emDirect("./register.php?active_savepage=1");//活动保存成功

	}


    function getform($params) {
    	$CACHE = Cache::getInstance();
        $options_cache = $CACHE->readCache('options');
        extract($options_cache);
         $blogtitle = $blogname;
        $description = $bloginfo;
$gip=getIp();   
$uid=UID;
$DB = MySql::getInstance();
$sql2 = "SELECT * FROM ".DB_PREFIX."zone WHERE `status`='1'";
			$res= $DB->query($sql2);
			while ($row=$DB->fetch_array($res)){
				$zones[]=$row;
			}
//print_r($zones);
$usericon = "content/templates/images/nopic.jpg";
 		include View::getView('header');
        include View::getView('register');
        include View::getView('footer');
    
}
    function register($params) {
    	$CACHE = Cache::getInstance();
        $options_cache = $CACHE->readCache('options');
        extract($options_cache);
         $blogtitle = $blogname;
        $description = $bloginfo;
$gip=getIp();   
$uid=UID;
$DB = MySql::getInstance();
if(isset($_GET['rg'])){
	$User_Model = new User_Model();
	$rets=$User_Model->regUser(($_POST));
		emMsg('注册成功！非常感谢！请登录', '/');
		exit;
}
    if(isset($_GET['name'])){
	$User_Model = new User_Model();
	$rets=$User_Model->isUserExist(addslashes(trim($_GET['name'])));
	echo intval($rets);
	exit;
}
if(isset($_POST['zoneId'])){
	$zoneId=intval($_POST['zoneId']);
     $sql = "SELECT * FROM " . DB_PREFIX . 
     "city WHERE `status`='1' AND `zone_id`='".
     $zoneId."';";
			$res= $DB->query($sql);
			while ($row=$DB->fetch_array($res)){
				$zones[]=$row;
			}
	 echo json_encode($zones);
	 exit;
}
    if(isset($_POST['cityId'])){
	$zoneId=intval($_POST['cityId']);
     $sql = "SELECT * FROM " . DB_PREFIX . 
     "district WHERE `status`='1' AND `city_id`='".
     $zoneId."';";
			$res= $DB->query($sql);
			while ($row=$DB->fetch_array($res)){
				$zones[]=$row;
			}
	 echo json_encode($zones);
	 exit;
}
 		//include View::getView('header');
       // include View::getView('register');
        //include View::getView('footer');
 //   print_r($params);
 //   print_r($_GET);
//print_r($_POST);
//print_r($_FILES);
    	$photo_type = array('gif', 'jpg', 'jpeg','png');
	$usericon = "content/templates/images/nopic.jpg";
	if ($_FILES['filepo']['size'] > 0) {
		$file_info = uploadFile2($_FILES['filepo']['name'], $_FILES['filepo']['error'], $_FILES['filepo']['tmp_name'], $_FILES['filepo']['size'], $photo_type, true);
		if (!empty($file_info['file_path'])) {
			$usericon = !empty($file_info['thum_file']) ? $file_info['thum_file'] : $file_info['file_path'];
		}
	}
	$photoname=$usericon;
//	print_r($file_info);

	$sql2 = "SELECT * FROM ".DB_PREFIX."zone WHERE `status`='1'";
			$res= $DB->query($sql2);
			while ($row=$DB->fetch_array($res)){
				$zones[]=$row;
			}
//print_r($zones);
 		include View::getView('header');
        include View::getView('register');
        include View::getView('footer');
	
}


?>
