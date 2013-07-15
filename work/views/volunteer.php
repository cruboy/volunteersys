<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>志愿者列表</b>
</div>
<div class=line></div>
 <table width="100%" id="adm_comment_list" class="item_list">
  	<thead>
      <tr>
       <th width="60" ><b>编号</b></th>
        <th width="60" ><b>姓名</b></th>
         <th width="160" ><b>地区</b></th>
        <th width="50" class="tdcenter"><b>服务时间</b></th>
        <th width="100"><b>加入时间</b></th>
      </tr>
    </thead>
    <tbody>
	<?php
	if($pages3):
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
	  <tr><td class="tdcenter" colspan="5">还没有志愿者</td></tr>
	<?php endif;?>
	</tbody>
  </table>
  <input name="operate" id="operate" value="" type="hidden" />


<div class="page"><?php echo $pageurl; ?> (有<?php echo $pageNum; ?>位志愿者)</div>
<script>
$(document).ready(function(){
	$("#adm_comment_list tbody tr:odd").addClass("tralt_b");
	$("#adm_comment_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")});
	
});
setTimeout(hideActived,2600);

$("#menu_volunteer").addClass('sidebarsubmenu1');
</script>