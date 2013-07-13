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
    //print_r($params);
//print_r($_POST);
}

}
?>
