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
<?php endif;?>

 <table width="100%" id="adm_comment_list" class="item_list">
  	<thead>
      <tr>
        <th width="461" colspan="2"><b>标题</b></th>
        <th width="50" class="tdcenter"><b>评论</b></th>
        <th width="280"><b>时间</b></th>
      </tr>
    </thead>
    <tbody>
	<?php
	if($pages):
	foreach($pages as $key => $value):
	if (empty($navibar[$value['gid']]['url']))
	{
		$navibar[$value['gid']]['url'] = Url::log($value['gid']);
	}
?>
     <tr>
     	<td width="21"></td>
        <td width="440">
        <a href="/index.php?post=<?php echo $value['gid']?>"><?php echo $value['title']; ?></a> 
   		    </td>
        <td class="tdcenter"><a href="comment.php?gid=<?php echo $value['gid']; ?>"><?php echo $value['comnum']; ?></a></td>
        <td><?php echo gmdate('Y-n-j G:i l', $value['date']); ?></td>
     </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="4">还没有信息</td></tr>
	<?php endif;?>
	</tbody>
  </table>
  <input name="operate" id="operate" value="" type="hidden" />


<div class="page"><?php echo $pageurl; ?> (有<?php echo $pageNum; ?>条信息)</div>

</div>

<script>
$(document).ready(function(){
	$("#adm_comment_list tbody tr:odd").addClass("tralt_b");
	$("#adm_comment_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")});
	
});
setTimeout(hideActived,2600);
$("#menu_index").addClass('sidebarsubmenu1');
</script>