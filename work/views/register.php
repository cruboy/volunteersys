<?php 
/*
* 首页
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div id="content">
<STYLE type=text/css>BODY {
	FONT-SIZE: 14px
}
TD {
	FONT-SIZE: 14px
}
.auto-style1 {
	HEIGHT: 37px
}
</STYLE>


<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
  <TR>
    <TD height=66><IMG alt="" src="/content/templates/images/register_table.png" 
      width=460 height=28></TD></TR></TBODY></TABLE>
<TABLE class=border01 border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
  <TR>
    <TD class=auto-style1><IMG alt="" src="/content/templates/images/register_10.png" 
      width=845 height=33></TD></TR>
  <TR>
    <TD 
    style="PADDING-BOTTOM: 10px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 10px">
      <TABLE border=0 cellSpacing=0 cellPadding=0 width="99%" align=center>
        <TBODY>
        <TR>
          <TD width=145>
            <TABLE border=0 cellSpacing=0 cellPadding=0>
              <TBODY>
              <TR>
                <TD><IMG 
                  style="BORDER-RIGHT-WIDTH: 0px; WIDTH: 138px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; HEIGHT: 176px; BORDER-LEFT-WIDTH: 0px" 
                  id=photos class=border01 
              src="<?php echo $photo;?>"></TD></TR>
              <TR>
                <TD height=8 align=middle>编号：爱心之声-<?php printf('%05d',$uid);?></TD></TR>
              <TR>
                <TD align=middle>
                  <TABLE border=0 cellSpacing=0 cellPadding=3>
                    <TBODY>
                    
                    <TR>
                      </TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
          <TD width=10>&nbsp;</TD>
          <TD>

            <TABLE border=0 cellSpacing=0 cellPadding=0 width=710 align=left>
              <TBODY>
              <TR>
                <TD class=f_b_01 bgColor=#ecf5ff height=35 align=left>登录名：</TD>
                <TD bgColor=#ecf5ff><?php echo $username;?></TD>
                <TD class=f_b_01 bgColor=#ecf5ff align=left>注册时间：</TD>
                <TD bgColor=#ecf5ff><?php echo gmdate("Y-m-d",$regdate) ;?></TD>
                <TD class=f_b_01 bgColor=#ecf5ff align=left>服务时间：</TD>
                <TD bgColor=#ecf5ff></TD>
             </TR>
              <TR>
                <TD height=35 align=left>姓名：</TD>
                <TD><?php echo $xingming;?></TD>
                <TD align=left>性别：</TD>
                <TD><?php echo $xingbie;?></TD>
                <TD align=left>年龄：</TD>
                <TD><?php echo $zhiji;?></TD></TR>
              <TR>
                <TD height=35 align=left>所在单位：</TD>
                <TD colSpan=3><?php echo $danwei;?></TD>
                <TD align=left>政治面貌：</TD>
                <TD><?php echo $zhengzhimianmao;?></TD></TR>
              <TR>
                <TD bgColor=#f7f7f7 height=35 align=left>所在地区：</TD>
                <TD bgColor=#f7f7f7 colSpan=5>
                       <?php echo $dist;?>
                        </TD></TR>
              <TR>
                <TD height=35 align=left>社会职业：</TD>
                <TD><?php echo $shenfen;?></TD>
                <TD align=left>专业：</TD>
                <TD><?php echo $zhuanye;?></TD>
                <TD align=left>学历：</TD>
                <TD><?php echo $xueli;?></TD></TR>
              <TR>
                <TD height=35 align=left>毕业或就&nbsp;&nbsp;<BR>读院校： </TD>
                <TD colSpan=5><?php echo $biyeyuanxiao;?></TD></TR>
              <TR>
                <TD height=35 align=left>特长爱好： </TD>
                <TD colSpan=5><?php echo $techang;?></TD></TR>
              <TR>
                <TD height=35 align=left>身份证号：</TD>
                <TD colSpan=5>
                  <?php echo $shenfenzheng;?></TD></TR>
                  </TBODY></TABLE></TD></TR>
                  </TBODY></TABLE></TD></TR>

  <TR>
    <TD><IMG alt="" src="/content/templates/images/register_23.png" width=846 
      height=33></TD></TR>
  <TR>
    <TD 
    style="PADDING-BOTTOM: 20px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; PADDING-TOP: 20px">
      <TABLE border=0 cellSpacing=0 cellPadding=3 width="96%" align=center>
        <TBODY>
        <TR>
          <TD height=35>手机号码：</TD>
          <TD><?php echo $shouji;?></TD>
          <TD>电子邮箱：</TD>
          <TD><?php echo $email;?></TD></TR>
        <TR>
          <TD height=35>固定电话：</TD>
          <TD><?php echo $guhua;?></TD>
          <TD>QQ 号码：</TD>
          <TD><?php echo $QQ;?></TD></TR>
        <TR>
          <TD height=35>单位地址：</TD>
          <TD><?php echo $danweidizhi;?></TD>
          <TD>邮政编码：</TD>
          <TD><?php echo $danweiyoubian;?></TD></TR>
        <TR>
          <TD height=35>家庭住址：</TD>
          <TD><?php echo $jiatingzhuzhi;?></TD>
          <TD>邮政编码：</TD>
          <TD><?php echo $jiatingyoubian;?></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD><IMG alt="" src="/content/templates/images/register_25.png" width=846 
      height=33></TD></TR>
  <TR>
    <TD 
    style="PADDING-BOTTOM: 20px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; PADDING-TOP: 20px">
      <TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
        <TBODY>
        <TR>
          <TD height=50 
            align=middle>本人自愿成为志愿者，遵守国家法律和志愿服务章程，为弘扬志愿服务精神，推动志愿服务尽一份力量。<BR><BR>
           </TD></TR></TBODY></TABLE>
  
            </TD></TR>
            </TBODY></TABLE>
<?php if($uid==UID):?>
<div align=center><a href="/">修改注册信息</a></div>
<?php endif;?>
<br><br>
<SCRIPT type=text/javascript>
$("#menu_register").addClass('sidebarsubmenu1');
</SCRIPT>

    
    