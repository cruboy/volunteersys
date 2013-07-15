<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div id="admindex">

<div class="clear"></div>
<?php if (ROLE == 'admin'):?>
<div style="margin-top: 20px;">
<div id="admindex_servinfo">
<h3>站点信息</h3>
<ul>
	<li>有<b><?php echo $sta_cache['lognum'];?></b>篇文章，<b><?php echo $sta_cache['comnum_all'];?></b>条评论，<b><?php echo $sta_cache['twnum'];?></b>条微语</li>
	<li>PHP版本：<?php echo $php_ver; ?></li>
	<li>MySQL版本：<?php echo $mysql_ver; ?></li>
	<li>服务器环境：<?php echo $serverapp; ?></li>
	<li>GD图形处理库：<?php echo $gd_ver; ?></li>
	<li>服务器允许上传最大文件：<?php echo $uploadfile_maxsize; ?></li>
	<li><a href="index.php?action=phpinfo">更多信息&raquo;</a></li>
</ul>
<p id="m"><a title="用手机访问你的站点"><?php echo BLOG_URL.'m'; ?></a></p>
</div>
<div id="admindex_msg">
<h3>官方消息</h3>
<ul></ul>
</div>
<div class="clear"></div>
</div>

<?php else:?>
暂无消息
<?php endif;?>
</div>
<script>
$("#menu_index").addClass('sidebarsubmenu1');
</script>