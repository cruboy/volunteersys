<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>编辑链接</b></div>
<div class=line></div>
<form action="link.php?action=update_link" method="post">
<div class="item_edit">
	<li><input size="25" value="<?php echo $sitename; ?>" name="sitename" /> 名称</li>
	<li><input size="40" value="<?php echo $siteurl; ?>" name="siteurl" /> 地址</li>
	<li>链接描述<br /><textarea name="description" rows="3" cols="45"><?php echo $description; ?></textarea></li>
	<li>
	<input type="hidden" value="<?php echo $linkId; ?>" name="linkid" />
	<input type="submit" value="保 存" class="button" />
	<input type="button" value="取 消" class="button" onclick="javascript: window.history.back();" /></li>
</div>
</form>
<script>
$("#menu_link").addClass('sidebarsubmenu1');
</script>