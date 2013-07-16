<?php
/**
 * 显示首页
 *cruboy
 */

class register_Controller {

    function register($params) {
    	$vcode=Rand(100000,999999);
    	$CACHE = Cache::getInstance();
        $options_cache = $CACHE->readCache('options');
        extract($options_cache);
         $blogtitle = $blogname;
        $description = $bloginfo;
$gip=getIp();   
$uid=UID;
$DB = MySql::getInstance();
    if(isset($_GET['edit'])&& $uid>0 && $uid==$_GET['edit']){
	$User_Model = new User_Model();
		$data = $User_Model->getUser($uid);
	extract($data);
	$onedit=true;
}
else $onedit=false;
if(isset($_GET['rg'])&&!empty($_POST['xingming'])){
	$User_Model = new User_Model();
	$rets=$User_Model->regUser(($_POST));
		emMsg('注册成功！非常感谢！请登录', '/');
		exit;
}
if(isset($_GET['rgedit'])&&!empty($_POST['xingming']) && UID>0 ){
	$User_Model = new User_Model();
	//print_r($_POST);
	$rets=$User_Model->editUser(($_POST),UID);
		emMsg('修改资料成功！', '/work/register.php');
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
	$usericon = empty($photo)?"content/templates/images/nopic.jpg":$photo;
	if ($_FILES['filepo']['size'] > 0) {
		$file_info = uploadFile2($_FILES['filepo']['name'], $_FILES['filepo']['error'], $_FILES['filepo']['tmp_name'], $_FILES['filepo']['size'], $photo_type, true);
		if (!empty($file_info['file_path'])) {
			$usericon = !empty($file_info['thum_file']) ? $file_info['thum_file'] : $file_info['file_path'];
		}
	}
	$photoname=$usericon;
//	print_r($file_info);
if(isset($_POST['xingming']))
extract($_POST);
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
