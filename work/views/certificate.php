<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>志愿者证书</b>
</div>
<div class=line></div>
<STYLE type=text/css>BODY {
	FONT-SIZE: 14px
}
TD {
	FONT-SIZE: 14px
}
.zyzz {
	POSITION: relative
}
.xingming {
	POSITION: absolute; WIDTH: 280px; HEIGHT: 34px; FONT-SIZE: 24px; TOP: 152px; LEFT: 450px
}
.xiangmu {
	POSITION: absolute; WIDTH: 280px; HEIGHT: 34px; FONT-SIZE: 24px; TOP: 215px; LEFT: 450px
}
.bianhao {
	POSITION: absolute; WIDTH: 280px; HEIGHT: 34px; FONT-SIZE: 24px; TOP: 278px; LEFT: 450px
}
.xp {
	POSITION: absolute; TOP: 130px; LEFT: 140px
}
.xp IMG {
	BORDER-BOTTOM: #ccc 1px solid; BORDER-LEFT: #ccc 1px solid; PADDING-BOTTOM: 2px; BACKGROUND-COLOR: #fff; PADDING-LEFT: 2px; PADDING-RIGHT: 2px; BORDER-TOP: #ccc 1px solid; BORDER-RIGHT: #ccc 1px solid; PADDING-TOP: 2px
}
</STYLE>
     <TABLE class=border01 border=0 cellSpacing=0 cellPadding=0 align=center>
        <TBODY>
        <TR>
          <TD></TD></TR>
        <TR>
          <TD 
          style="PADDING-BOTTOM: 50px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 50px">
            <TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
              <TBODY>
              <TR>
                <TD height=391 vAlign=top background=./views/images/zyzz.jpg 
                width=713>
                  <DIV class=zyzz>
                  <DIV class=xingming><SPAN 
                  id=ctl00_ContentPlaceHolder1__name><?php echo $xingming;?></SPAN></DIV>
                  <DIV class=xiangmu><SPAN 
                  id=ctl00_ContentPlaceHolder1__xiangmu>社区志愿者</SPAN></DIV>
                  <DIV class=bianhao><SPAN 
                  id=ctl00_ContentPlaceHolder1__bianhao>爱心之声-<?php printf('%05d',$uid);?></SPAN></DIV>
                  <DIV class=xp><IMG 
                  style="BORDER-RIGHT-WIDTH: 0px; WIDTH: 149px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; HEIGHT: 207px; BORDER-LEFT-WIDTH: 0px" 
                  id=ctl00_ContentPlaceHolder1__zhaopian 
                  src="./views/images/avatar.jpg"></DIV></DIV>
                  </TD></TR></TBODY>
                  </TABLE></TD></TR>
                  </TBODY></TABLE> 

<script>
$("#menu_certificate").addClass('sidebarsubmenu1');
</script>