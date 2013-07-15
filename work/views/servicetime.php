<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>服务（活动）时间统计</b>
</div>
<div class=line></div>
 <table width="100%" id="adm_comment_list" class="item_list">
  	<thead>
      <tr>
      <th width="100"><b>时间</b></th>
        <th width="461" ><b>活动名称</b></th>
        <th width="50" class="tdcenter"><b>参加人数</b></th>
        <th width="80"><b>本人服务时间</b></th>
        <th width="90"><b>活动状态</b></th>
        <th width="50"><b>操作</b></th>
      </tr>
    </thead>
    <tbody>
	<?php
	if($pages2):
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
        <td><?php echo $value['date']; ?></td>
     </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="6">还没有参加活动</td></tr>
	<?php endif;?>
	</tbody>
  </table>
  <input name="operate" id="operate" value="" type="hidden" />


<div class="page"><?php echo $pageurl; ?> (有<?php echo $pageNum; ?>条记录)</div>
<script>
$(document).ready(function(){
	$("#adm_comment_list tbody tr:odd").addClass("tralt_b");
	$("#adm_comment_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")});
	
});
setTimeout(hideActived,2600);

$("#menu_servicetime").addClass('sidebarsubmenu1');
</script>