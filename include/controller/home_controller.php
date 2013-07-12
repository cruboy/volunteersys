<?php
/**
 * 显示首页
 *cruboy
 */

class home_Controller {

    function display($params) {
    	$CACHE = Cache::getInstance();
        $options_cache = $CACHE->readCache('options');
        extract($options_cache);
         $blogtitle = $blogname;
        $description = $bloginfo;
$gip=getIp();   
$uid=UID;
$DB = MySql::getInstance();

 		include View::getView('header');
        include View::getView('home');
        include View::getView('footer');
    
}

}
?>
