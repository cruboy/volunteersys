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
	if($users):
	foreach($users as $key => $val):
		$avatar = empty($user_cache[$val['uid']]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[$val['uid']]['avatar'];
	?>
     <tr>
        <td style="padding:3px; text-align:center;">
        <a href="./certificate.php?vid=<?php echo $val['uid'];?>">
        <img src="<?php echo $avatar; ?>" height="40" width="40" /></a></td>
		<td>
	<a href="./register.php?vid=<?php echo $val['uid'];?>">	<?php echo empty($val['name']) ? $val['login'] : $val['name']; ?>
		</a><?php //echo $val['role'] == 'admin' ? '管理员' : '作者'; ?>
		</td>
		<td><?php echo $val['description']; ?></td>
		
		<td class="tdcenter"><a href="./servicetime.php?vid=<?php echo $val['uid'];?>">
		<?php echo $val['xx']; ?>0</a></td>
		<td><?php echo $val['xx']; ?></td>
     </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="6">还没有志愿者</td></tr>
	<?php endif;?>
	</tbody>
  </table>

  <input name="operate" id="operate" value="" type="hidden" />


<div class="page"><?php echo $pageurl; ?> (有<?php echo $usernum; ?>位志愿者)</div>
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