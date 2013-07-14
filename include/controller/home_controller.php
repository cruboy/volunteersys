<?php
/**
 * 显示首页
 *cruboy
 */

class home_Controller {

    function display($params) {
    	$CACHE = Cache::getInstance();

		$options_cache = Option::getAll();
		extract($options_cache);
$gip=getIp();   
$uid=UID;
$DB = MySql::getInstance();
    $DB = MySql::getInstance();
$sql2 = "SELECT * FROM ".DB_PREFIX."attachment 
order by aid desc limit 4";
//where width<437 and height<247 
			$res= $DB->query($sql2);
			$dimg="";
			$durl="";
			while ($row=$DB->fetch_array($res)){
	
				$dimg=$dimg.$row['filepath']."|";
				$durl=$durl."?post=".$row['blogid']."|";
			}
    $sql3 = "SELECT * FROM ".DB_PREFIX."blog 
    where type='blog' and sortid=1 and hide='n' 
order by gid desc limit 8";
			$res= $DB->query($sql3);
			while ($row=$DB->fetch_array($res)){
$row['url']="?post=".$row['gid'];
$row['date']	= gmdate("Y-m-d", $row['date'] );
$row['title'] 	= !empty($row['title']) ? htmlspecialchars($row['title']) : '无标题';
		
$acvs[]=$row;
			}
		
 		include View::getView('header');
        include View::getView('home');
        include View::getView('footer');
    
}

}
?>
