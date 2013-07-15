<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title>管理中心 - <?php echo Option::get('blogname'); ?></title>
<link href="./views/style.css" type=text/css rel=stylesheet>
<link href="./views/css/css-main.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="../include/lib/js/jquery/jquery-1.7.1.js"></script>
<script type="text/javascript" src="../include/lib/js/jquery/plugin-cookie.js"></script>
<script type="text/javascript" src="./views/js/common.js"></script>

</head>
<body>
<div id="mainpage">
<div id="banner"><a href="<?php echo BLOG_URL; ?>">
<img src="/content/uploadfile/headerback.jpg" height="161" width="960" /></a></div>

<div id="side">
	<div id="sidebartop"></div>
    <div id="log_mg">
    <a href="./blogger.php" title="<?php echo subString($user_cache[UID]['name'], 0, 12) ?>">
        <img src="<?php echo empty($user_cache[UID]['avatar']) ? './views/images/avatar.jpg' : 
    '../' . $user_cache[UID]['avatar'] ?>" align="top" width="90" height="90" />
    </a>
     <li class="sidebarsubmenu" id="menu_index"><a href="index.php">消息中心</a></li>
      <li class="sidebarsubmenu" id="menu_register"><a href="register.php">查看注册信息</a></li>
       <li class="sidebarsubmenu" id="menu_servicetime"><a href="servicetime.php">服务时间统计</a></li>
      <li class="sidebarsubmenu" id="menu_certificate"><a href="certificate.php">查看证书</a></li>
        <li class="sidebarsubmenu" id="menu_event"><a href="event.php">活动导航</a></li>
      <li class="sidebarsubmenu" id="menu_cm"><a href="comment.php">评论</a> </li>
    	<li class="sidebarsubmenu" id="menu_tw"><a href="twitter.php">消息</a></li>
  <?php if (ROLE == 'admin'):?>       
    <li class="sidebarsubmenu" id="menu_wt">
		<a href="write_log.php">
		<span class="ico16"></span>写文章</a></li>
		<li class="sidebarsubmenu" id="menu_en">
		<a href="event.php?action=new">
		<span class="ico16"></span>发活动</a></li>
		<li class="sidebarsubmenu" id="menu_draft">
    	<a href="admin_log.php?pid=draft">草稿<span id="dfnum">
		<?php 
		if (ROLE == 'admin'){
			echo $sta_cache['draftnum'] == 0 ? '' : '('.$sta_cache['draftnum'].')'; 
		}else{
			echo $sta_cache[UID]['draftnum'] == 0 ? '' : '('.$sta_cache[UID]['draftnum'].')';
		}
		?>
		</span></a></li>
		<li class="sidebarsubmenu" id="menu_log"><a href="admin_log.php">文章管理</a></li>
		<li class="sidebarsubmenu" id="menu_ae"><a href="event.php?action=admin">活动管理</a></li>



   		<?php
		$hidecmnum = ROLE == 'admin' ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
		if ($hidecmnum > 0):
		$n = $hidecmnum > 999 ? '...' : $hidecmnum;
		?>
		<div class="coment_number"><a href="./comment.php?hide=y" title="<?php echo $hidecmnum; ?>条待审"><?php echo $n; ?></a></div>
		<?php endif; ?>
		<?php if (Option::get('istrackback') == 'y'): ?>
    	<li class="sidebarsubmenu" id="menu_tb"><a href="trackback.php">引用</a></li>
    	<?php endif;?>
<?php endif;?>
		<?php if (ROLE == 'admin'):?>
		        <li class="sidebarsubmenu" id="menu_tag"><a href="tag.php">标签</a></li>
        <li class="sidebarsubmenu" id="menu_sort"><a href="sort.php">分类</a></li>
    	<li class="sidebarsubmenu" id="menu_widget"><a href="widgets.php" >侧边栏</a></li>
   	 	<li class="sidebarsubmenu" id="menu_navbar"><a href="navbar.php" >导航</a></li>
    	<li class="sidebarsubmenu" id="menu_page"><a href="page.php" >页面</a></li>
    	<li class="sidebarsubmenu" id="menu_link"><a href="link.php">链接</a></li>
    	<li class="sidebarsubmenu" id="menu_user"><a href="user.php" >用户</a></li>
    	<li class="sidebarsubmenu" id="menu_data"><a href="data.php">数据</a></li>
    	<!-- li class="sidebarsubmenu" id="menu_plug"><a href="plugin.php">插件</a></li>
        <li class="sidebarsubmenu" id="menu_tpl"><a href="template.php">模板</a></li-->
         <li class="sidebarsubmenu" id="menu_tpl"><a href="configure.php"> 设置</a></li>   
	<?php endif;?>
	<li class="sidebarsubmenu" id="menu_tpl"><a href="./?action=logout">退出</a></li>   
	
    </div>
  
	<div id="sidebarBottom"></div>
</div>
<div id="container">
