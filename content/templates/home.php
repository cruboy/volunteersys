<?php 
/*
* 首页
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div id="content">

<FORM id=form1 method=post name=form1 action=/default.aspx>
<DIV><INPUT id=__VIEWSTATE 
value=/wEPDwUKMjA3MTQ1MDMyOQ9kFgICARBkZBYIAgEPZBYCZg8WAh4EVGV4dAWqATx0YWJsZSBib3JkZXI9IjAiIGFsaWduPSJjZW50ZXIiIGNlbGxwYWRkaW5nPSIwIiBjZWxsc3BhY2luZz0iMCI+CiAgPHRyPgogICAgPHRkPjxpbWcgc3JjPSIvaW1hZ2VzL2luZGV4XzAyLmpwZyIgd2lkdGg9Ijk0MSIgaGVpZ2h0PSIzNzUiIGFsdD0iIiAvPiA8L3RkPgogIDwvdHI+CjwvdGFibGU+ZAIFD2QWAmYPFgIfAAWiBzxzY3JpcHQgc3JjPSIvU2NyaXB0cy9mbGFzaG9iai5qcyIgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij48L3NjcmlwdD4NCiAgICAgICAgICA8ZGl2IGNsYXNzPSJmb2N1c0ZsYXNoIj4NCiAgPGRpdiBpZD0ic2FzRmxhc2hGb2N1czI3IiBzdHlsZT0ibWFyZ2luOjhweCAwIDAgMXB4Ij48L2Rpdj4NCiAgPHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPg0KICAgICAgdmFyIHNvaHVGbGFzaDIgPSBuZXcgc29odUZsYXNoKCIvaW1hZ2VzL2RlbW8wMDEuc3dmIiwgIjI3IiwgNDM2LCAyNDcsICI3Iik7DQogICAgICBzb2h1Rmxhc2gyLmFkZFBhcmFtKCJxdWFsaXR5IiwgImhpZ2giKTsNCiAgICAgIHNvaHVGbGFzaDIuYWRkUGFyYW0oIndtb2RlIiwgIm9wYXF1ZSIpOw0KICAgICAgc29odUZsYXNoMi5hZGRWYXJpYWJsZSgiaW1hZ2UiLCAiaHR0cDovL3p5LmRidy5jbi9VcGxvYWRGaWxlcy8yMDExMDUvMTYvMTUwNDU1MDgxNjI1LmpwZ3xodHRwOi8venkuZGJ3LmNuL1VwbG9hZEZpbGVzLzIwMTEwNS8xNi8xNTA0MTcyODQ3NTAuanBnfGh0dHA6Ly96eS5kYncuY24vVXBsb2FkRmlsZXMvMjAxMTA1LzE2LzE1MDQ0MDQ1NjYyNS5qcGd8aHR0cDovL3p5LmRidy5jbi9VcGxvYWRGaWxlcy8yMDExMDUvMTYvMTUwMzgxNTk3MjUwLmpwZ3wiKTsNCiAgICAgIHNvaHVGbGFzaDIuYWRkVmFyaWFibGUoInVybCIsICJqYXZhc2NyaXB0OnZvaWQoMCk7fGphdmFzY3JpcHQ6dm9pZCgwKTt8amF2YXNjcmlwdDp2b2lkKDApO3xqYXZhc2NyaXB0OnZvaWQoMCk7fCIpOw0KICAgICAgc29odUZsYXNoMi5hZGRWYXJpYWJsZSgiaW5mbyIsICJ8fHx8Iik7DQogICAgICBzb2h1Rmxhc2gyLmFkZFZhcmlhYmxlKCJzdG9wVGltZSIsICI1MDAwIik7DQogICAgICBzb2h1Rmxhc2gyLndyaXRlKCJzYXNGbGFzaEZvY3VzMjciKTsNCjwvc2NyaXB0PiANCjwvZGl2PmQCBw9kFgJmDxYCHgtfIUl0ZW1Db3VudAIEFghmD2QWAmYPFQQe5YGH5pyf5YmN5Yqe5YWs546v5aKD5aSn5omr6ZmkDOW6huWPkeWwj+WtphUyMDEzLTA3LTA2LTIwMTMtMDctMDYBNWQCAQ9kFgJmDxUEJOWbveW6huW/l+aEv+iAhea4heeQhualvOmBk+Wwj+W5v+WRihPlo6vor77ooZc25Y+35aSn6ZmiFTIwMTMtMDctMDgtMjAxMy0wNy0wOAEyZAICD2QWAmYPFQQk5Zu95bqG5b+X5oS/6ICF5riF55CG5qW86YGT5bCP5bm/5ZGKE+Wjq+iwreihlzPlj7flpKfpmaIVMjAxMy0wNy0wOC0yMDEzLTA3LTA4ATFkAgMPZBYCZg8VBCTigJznu7/oibLnjq/looPigJ3lv5fmhL/mnI3liqHmtLvliqgV57qi5LiT56S+5Yy66L6W5Yy65YaFFTIwMTMtMDctMDYtMjAxMy0wNy0wNgIzMGQCCQ9kFgJmDxYCHwAF1gQ8dGFibGUgYm9yZGVyPSIwIiBhbGlnbj0iY2VudGVyIiBjZWxscGFkZGluZz0iMCIgY2VsbHNwYWNpbmc9IjAiPgogIDx0cj4KICAgIDx0ZCBoZWlnaHQ9IjE3MCIgYWxpZ249ImNlbnRlciIgc3R5bGU9ImxpbmUtaGVpZ2h0OjI1cHg7IGNvbG9yOiNGRkYiPiZuYnNwOzwvdGQ+CiAgPC90cj4KICA8dHI+CiAgICA8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9ImxpbmUtaGVpZ2h0OjI1cHg7IGNvbG9yOiNGRkYiPum7kem+meaxn+ecgeeyvuelnuaWh+aYjuW7uuiuvuaMh+WvvOWnlOWRmOS8muWKnuWFrOWupCDkuLvlip48YnIgLz4KICAgICAg6buR6b6Z5rGf5Lic5YyX572R57uc5Y+wIOaJv+WKnjxiciAvPgogICAgICBDb3B5cmlnaHQgwqkgMjAwOC0yMDEwIEhMSldNVy5DTiBBbGwgUmlnaHRzIFJlc2VydmVkLiDmnKrnu4/ljY/orq7mjojmnYPvvIznpoHmraLkuIvovb3kvb/nlKjjgIIgPGJyIC8+CiAgICAgIOm7kUIyLTIwMDgwOTczLTI8L3RkPgogIDwvdHI+CiAgPHRyPgogICAgPHRkIGhlaWdodD0iNzAiIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJsaW5lLWhlaWdodDoyNXB4OyBjb2xvcjojRkZGIj4mbmJzcDs8L3RkPgogIDwvdHI+CjwvdGFibGU+ZBgBBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WAQUXTG9naW4xJEltYWdlQnV0dG9uTG9naW7TF/Pdi4QwDR+SAMk3Q2E31h+akg== 
type=hidden name=__VIEWSTATE> </DIV>
<DIV><INPUT id=__EVENTVALIDATION 
value=/wEWBAL88bOeCQKUvNaVDgL666u9CwKK8d7BDgZyYoUvtA0vEL7J72JyUonzmCjS 
type=hidden name=__EVENTVALIDATION> </DIV>
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
  <TR>
    <TD><IMG alt="" src="content/templates/images/index_02.jpg" width=941 
      height=375> </TD></TR></TBODY></TABLE>
<TABLE style="MARGIN: 0px 0px 10px" border=0 cellSpacing=0 cellPadding=0 
width=941 align=center>
  <TBODY>
  <TR>
    <TD height=266 vAlign=top background=content/templates/images/index_05.jpg 
    width=263>
      <DIV style="PADDING-TOP: 55px"><!--用户登录-->
      <TABLE style="MARGIN: 0px auto" border=0 cellSpacing=0 cellPadding=3 
      width=236>
        <TBODY>
        <TR>
          <TD height=37 align=middle>
            <TABLE border=0 cellSpacing=0 cellPadding=0>
              <TBODY>
              <TR>
                <TD height=37>用户名：</TD>
                <TD height=37><INPUT style="WIDTH: 175px" id=Login1_username 
                  class=input01 type=text name=Login1$username></TD></TR>
              <TR>
                <TD height=37>密&nbsp;&nbsp;&nbsp; 码：</TD>
                <TD height=37><INPUT style="WIDTH: 175px" id=Login1_password 
                  class=input01 type=password 
            name=Login1$password></TD></TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD height=37 width=150 align=middle>
            <TABLE border=0 cellSpacing=0 cellPadding=0 width=236>
              <TBODY>
              <TR>
                <TD><INPUT 
                  style="BORDER-RIGHT-WIDTH: 0px; WIDTH: 236px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; HEIGHT: 33px; BORDER-LEFT-WIDTH: 0px" 
                  id=Login1_ImageButtonLogin 
                  src="content/templates/images/btn00_1.jpg" type=image 
                  name=Login1$ImageButtonLogin></TD></TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD height=37 align=middle><A 
            href="web/register.shtml"><IMG 
            src="content/templates/images/btn003.jpg" width=236 height=37></A></TD></TR>
        <TR>
          <TD height=37 align=right><A 
            href="GetPassword.shtml" 
        target=_blank>忘记密码？</A></TD></TR></TBODY></TABLE></DIV></TD>
    <TD width=7></TD>
    <TD vAlign=top background=content/templates/images/bg001.jpg width=438><!--首页Flash-->
      <SCRIPT type=text/javascript 
src="content/templates/flashobj.js"></SCRIPT>

      <DIV class=focusFlash>
      <DIV style="MARGIN: 8px 0px 0px 1px" id=sasFlashFocus27></DIV>
      <SCRIPT type=text/javascript>
      var sohuFlash2 = new sohuFlash("/images/demo001.swf", "27", 436, 247, "7");
      sohuFlash2.addParam("quality", "high");
      sohuFlash2.addParam("wmode", "opaque");
      sohuFlash2.addVariable("image", "UploadFiles/201105/16/150455081625.jpg|UploadFiles/201105/16/150417284750.jpg|UploadFiles/201105/16/150440456625.jpg|UploadFiles/201105/16/150381597250.jpg|");
      sohuFlash2.addVariable("url", "javascript:void(0);|javascript:void(0);|javascript:void(0);|javascript:void(0);|");
      sohuFlash2.addVariable("info", "||||");
      sohuFlash2.addVariable("stopTime", "5000");
      sohuFlash2.write("sasFlashFocus27");
</SCRIPT>
      </DIV></TD>
    <TD width=7></TD>
    <TD vAlign=top>
      <TABLE border=0 cellSpacing=0 cellPadding=0>
        <TBODY>
        <TR>
          <TD><A href="hdm/,P=1.shtml" target=_blank><IMG 
            alt="" src="content/templates/images/zyzindex_09.jpg" width=226 
            height=42></A></TD></TR>
        <TR>
          <TD height=224 vAlign=top background=content/templates/images/bg002.jpg><!--下面是向上滚动代码-->
            <DIV 
            style="MARGIN: 10px auto 0px; WIDTH: 215px; HEIGHT: 200px; OVERFLOW: hidden" 
            id=jsweb8_cn_top>
            <DIV id=jsweb8_cn_top1>
            <TABLE style="BORDER-BOTTOM: #ccc 1px dashed; MARGIN-BOTTOM: 10px" 
            border=0 cellSpacing=0 cellPadding=0 width="100%" align=center>
              <TBODY>
              <TR>
                <TD height=22><IMG alt="" 
                  src="content/templates/images/zyzindex_18.jpg" width=13 height=13> 
                  <STRONG>假期前办公环境大扫除</STRONG></TD></TR>
              <TR>
                <TD height=22>地点：庆发小学</TD></TR>
              <TR>
                <TD height=22>时间：2013-07-06-2013-07-06</TD></TR>
              <TR>
                <TD height=22>参加：5 </TD></TR></TBODY></TABLE>
            <TABLE style="BORDER-BOTTOM: #ccc 1px dashed; MARGIN-BOTTOM: 10px" 
            border=0 cellSpacing=0 cellPadding=0 width="100%" align=center>
              <TBODY>
              <TR>
                <TD height=22><IMG alt="" 
                  src="content/templates/images/zyzindex_18.jpg" width=13 height=13> 
                  <STRONG>国庆志愿者清理楼道小广告</STRONG></TD></TR>
              <TR>
                <TD height=22>地点：士课街6号大院</TD></TR>
              <TR>
                <TD height=22>时间：2013-07-08-2013-07-08</TD></TR>
              <TR>
                <TD height=22>参加：2 </TD></TR></TBODY></TABLE>
            <TABLE style="BORDER-BOTTOM: #ccc 1px dashed; MARGIN-BOTTOM: 10px" 
            border=0 cellSpacing=0 cellPadding=0 width="100%" align=center>
              <TBODY>
              <TR>
                <TD height=22><IMG alt="" 
                  src="content/templates/images/zyzindex_18.jpg" width=13 height=13> 
                  <STRONG>国庆志愿者清理楼道小广告</STRONG></TD></TR>
              <TR>
                <TD height=22>地点：士谭街3号大院</TD></TR>
              <TR>
                <TD height=22>时间：2013-07-08-2013-07-08</TD></TR>
              <TR>
                <TD height=22>参加：1 </TD></TR></TBODY></TABLE>
            <TABLE style="BORDER-BOTTOM: #ccc 1px dashed; MARGIN-BOTTOM: 10px" 
            border=0 cellSpacing=0 cellPadding=0 width="100%" align=center>
              <TBODY>
              <TR>
                <TD height=22><IMG alt="" 
                  src="content/templates/images/zyzindex_18.jpg" width=13 height=13> 
                  <STRONG>“绿色环境”志愿服务活动</STRONG></TD></TR>
              <TR>
                <TD height=22>地点：红专社区辖区内</TD></TR>
              <TR>
                <TD height=22>时间：2013-07-06-2013-07-06</TD></TR>
              <TR>
                <TD height=22>参加：30 </TD></TR></TBODY></TABLE></DIV>
            <DIV id=jsweb8_cn_top2></DIV></DIV>
            <SCRIPT>
                var speed = 60
                jsweb8_cn_top2.innerHTML = jsweb8_cn_top1.innerHTML //克隆jsweb8_cn_top1为jsweb8_cn_top2 
                function Marquee1() {
                    //当滚动至jsweb8_cn_top1与jsweb8_cn_top2交界时 
                    if (jsweb8_cn_top2.offsetTop - jsweb8_cn_top.scrollTop <= 0)
                        jsweb8_cn_top.scrollTop -= jsweb8_cn_top1.offsetHeight //jsweb8_cn_top跳到最顶端 
                    else {
                        jsweb8_cn_top.scrollTop++;
                    }
                }
                var MyMar1 = setInterval(Marquee1, speed)//设置定时器 
                //鼠标移上时清除定时器达到滚动停止的目的 
                jsweb8_cn_top.onmouseover = function () { clearInterval(MyMar1) }
                //鼠标移开时重设定时器 
                jsweb8_cn_top.onmouseout = function () { MyMar1 = setInterval(Marquee1, speed) } 
</SCRIPT>
<!--向上滚动代码结束--></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
  <TR>
    <TD style="LINE-HEIGHT: 25px; COLOR: #fff" height=170 
    align=middle>&nbsp;</TD></TR>
  <TR>
    <TD style="LINE-HEIGHT: 25px; COLOR: #fff" align=middle>黑龙江省精神文明建设指导委员会办公室 
      主办<BR>黑龙江东北网络台 承办<BR>Copyright © 2008-2010 HLJWMW.CN All Rights Reserved. 
      未经协议授权，禁止下载使用。 <BR>黑B2-20080973-2</TD></TR>
  <TR>
    <TD style="LINE-HEIGHT: 25px; COLOR: #fff" height=70 
  align=middle>&nbsp;</TD></TR></TBODY></TABLE></FORM>
