<?php
/**
 * 显示首页
 *cruboy
 */

class register_Controller {

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
if(isset($_GET['rg'])&&!empty($_POST['xingming'])){
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

}
?>
