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
print_r($params);
print_r($_POST);
 		//include View::getView('header');
       // include View::getView('register');
        //include View::getView('footer');
    
}

}
?>
