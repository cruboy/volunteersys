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

<SCRIPT type=text/javascript src="content/templates/images/jquery.js"></SCRIPT>

<SCRIPT type=text/javascript 
src="content/templates/images/jQuery.FillOptions.js"></SCRIPT>

<SCRIPT type=text/javascript>
        $(document).ready(function () {
            $(":text,:file,:password,select").attr('class', 'input02');
            $("#_quxian").html(unescape($("#HiddenField11").val()));
            $("#_jiedao").html(unescape($("#HiddenField13").val()));
            $("#_shequ").html(unescape($("#HiddenField12").val()));
            $("#_xiehui_shi").html(unescape($("#_xiehui_shi_v").val()));
            $("#_xiehui_qu").html(unescape($("#_xiehui_qu_v").val()));
            $("#_xiehui_jie").html(unescape($("#_xiehui_jie_v").val()));
            $("#_xiehui_shequ").html(unescape($("#_xiehui_shequ_v").val()));
            $("#_chengshi").CascadingSelect($("#_quxian"), "CountyHandler.ashx", { datatype: "json", textfield: "text", valuefiled: "value", parameter: "c" }, function () {
                $("#_quxian").AddOption("请选择", "-2", true, 0);
                $("#_jiedao").html("");
                $("#_jiedao").AddOption("请选择", "-2", true, 0);
                $("#_shequ").html("");
                $("#_shequ").AddOption("请选择", "-2", true, 0);
                var val = $("#_chengshi").val();
                $("#_xiehui_shi").html("");
                $("#_xiehui_shi_v").val("");
                $("#_xiehui_qu").html("");
                $("#_xiehui_qu_v").val("");
                $("#_xiehui_jie").html("");
                $("#_xiehui_jie_v").val("");
                $("#_xiehui_shequ").html("");
                $("#_xiehui_shequ_v").val("");
                if (val > -1) {
                    var qval;
                    $.getJSON("Xiehui_shiHandler.ashx?c=" + val, function (json) { qval = json; });
                    $.each(qval, function (i, n) {
                        $("#_xiehui_shi").append("<span><input id=\"_xiehui_shi_" + i + "\" type=\"checkbox\" name=\"_xiehui_qu\" value=\"" + n.id + "\"/>" + n.name + "&nbsp;&nbsp;</span>" + (i % 9 == 0 && i != 0 ? "<br>" : ""));
                    });
                }
            });
            $("#_quxian").CascadingSelect($("#_jiedao"), "StreetHandler.ashx", { datatype: "json", textfield: "text", valuefiled: "value", parameter: "c" }, function () {
                $("#_jiedao").AddOption("请选择", "-2", true, 0);
                $("#_shequ").html("");
                $("#_shequ").AddOption("请选择", "-2", true, 0);
                var val = $("#_quxian").val();
                $("#_xiehui_qu").html("");
                $("#_xiehui_qu_v").val("");
                $("#_xiehui_jie").html("");
                $("#_xiehui_jie_v").val("");
                $("#_xiehui_shequ").html("");
                $("#_xiehui_shequ_v").val("");
                if (val > -1) {
                    var qval;
                    $.getJSON("Xiehui_quHandler.ashx?c=" + val, function (json) { qval = json; });
                    $.each(qval, function (i, n) {
                        $("#_xiehui_qu").append("<span><input id=\"_xiehui_qu_" + i + "\" type=\"checkbox\" name=\"_xiehui_qu\" value=\"" + n.id + "\"/>" + n.name + "&nbsp;&nbsp;</span>" + (i % 9 == 0 && i != 0 ? "<br>" : ""));
                    });
                }
            });
            $("#_jiedao").CascadingSelect($("#_shequ"), "CommunityHandler.ashx", { datatype: "json", textfield: "text", valuefiled: "value", parameter: "c" }, function () {
                $("#_shequ").AddOption("请选择", "-2", true, 0);
                var val = $("#_jiedao").val();
                $("#_xiehui_jie").html("");
                $("#_xiehui_jie_v").val("");
                $("#_xiehui_shequ").html("");
                $("#_xiehui_shequ_v").val("");
                if (val > -1) {
                    var qval;
                    $.getJSON("Xiehui_jieHandler.ashx?c=" + val, function (json) { qval = json; });
                    $.each(qval, function (i, n) {
                        $("#_xiehui_jie").append("<span><input id=\"_xiehui_jie_" + i + "\" type=\"checkbox\" name=\"_xiehui_jie\" value=\"" + n.id + "\"/>" + n.name + "&nbsp;&nbsp;</span>" + (i % 9 == 0 && i != 0 ? "<br>" : ""));
                    });
                }
            });
            $("#_shequ").change(function () {
                var val = $("#_shequ").val();
                $("#_xiehui_shequ").html("");
                $("#_xiehui_shequ_v").val("");
                if (val > -1) {
                    var qval;
                    $.getJSON("Xiehui_shequHandler.ashx?c=" + val, function (json) { qval = json; });
                    $.each(qval, function (i, n) {
                        $("#_xiehui_shequ").append("<span><input id=\"_xiehui_shequ_" + i + "\" type=\"checkbox\" name=\"_xiehui_shequ\" value=\"" + n.id + "\"/>" + n.name + "&nbsp;&nbsp;</span>" + (i % 9 == 0 && i != 0 ? "<br>" : ""));
                    });
                }
            });
            document.getElementById('_upload').onclick = function () {
                $("#HiddenField11").val(escape($("#_quxian").html()));
                $("#HiddenField12").val(escape($("#_shequ").html()));
                $("#HiddenField13").val(escape($("#_jiedao").html()));
                $("#_xiehui_shi_v").val(escape($("#_xiehui_shi").html()));
                $("#_xiehui_qu_v").val(escape($("#_xiehui_qu").html()));
                $("#_xiehui_jie_v").val(escape($("#_xiehui_jie").html()));
                $("#_xiehui_shequ_v").val(escape($("#_xiehui_shequ").html()));
                var uploadValue = $("#_file").val();
                if (uploadValue.length == 0)
                    return false;

                var type = uploadValue.substr(uploadValue.lastIndexOf('.')).toLowerCase();
                if (!(type == ".jpg" || type == ".jpeg" || type == ".gif" || type == ".png")) {
                    alert('该文件不是合法图片，请重新选择文件！');
                    return false;
                }
                var img = document.createElement("img");
                img.src = uploadValue;
                if (img.fileSize > 204800) {
                    alert("文件大小不能超过200 KB，请重新选择文件！");
                    return false;
                }

                return true;
            };
            document.getElementById('_reset').onclick = function () {
                document.forms['form1'].reset();
                $("#_quxian").html("");
                $("#_quxian").AddOption("请选择", "-2", true, 0);
                $("#HiddenField11").val(escape($("#_quxian").html()));
                $("#_jiedao").html("");
                $("#_jiedao").AddOption("请选择", "-2", true, 0);
                $("#HiddenField13").val(escape($("#_jiedao").html()));  
                $("#_shequ").html("");
                $("#_shequ").AddOption("请选择", "-2", true, 0);
                $("#HiddenField12").val(escape($("#_shequ").html()));
                $("#_xiehui_shi").html("");
                $("#_xiehui_shi_v").val("");
                $("#_xiehui_qu").html("");
                $("#_xiehui_qu_v").val("");
                $("#_xiehui_jie").html("");
                $("#_xiehui_jie_v").val("");
                $("#_xiehui_shequ").html("");
                $("#_xiehui_shequ_v").val("");
            };
        });
        function PhoneValidate(sender, args) { args.IsValid = ($("#_shouji").val().length > 0 || $("#_guhua").val().length > 0); }
        function AreaValidate(sender, args) { args.IsValid = (args.Value != "-2"); }
        function success() { alert('恭喜您，注册成功！'); window.location.href = '/default.shtml'; }
        function JCheck(obj) {
            var tempss = obj.val().replace(" ", "");
            if (tempss == "") {
                obj.focus();
                return false;
            }
            else {
                return true;
            }
        }
        function Comp(obja,objb) {
            var tempss1 = obja.val().replace(" ", "");
            var tempss2 = objb.val().replace(" ", "");
            if (tempss1 != tempss2) {
                objb.focus();
                return false;
            }
            else {
                return true;
            }
        }
        function CheckLength() {
            var lennn = $("#_password").val().length;
            if (lennn < 6 || lennn > 16) {
                $("#_password").focus();
                return false;
            } else {
                return true;
            }
        }

        function Check() {
            if (!JCheck($("#_nickName")) || !JCheck($("#_password")) || !CheckLength() || !Comp($("#_password"), $("#_password2")) || !JCheck($("#_xingming")) || !JCheck($("#_shenfenzheng")) || (!JCheck($("#_guhua")) && !JCheck($("#_shouji"))))
                return false;
            if ($("#_zhengzhimianmao option:selected").val() == "-1") {
                $("#_zhengzhimianmao").focus();
                return false;
            }
            if ($("#_shenfen option:selected").val() == "-1") {
                $("#_shenfen").focus();
                return false;
            }
            if ($("#_xueli option:selected").val() == "-1") {
                $("#_xueli").focus();
                return false;
            }
            if ($.ajax({
                type: "GET",
                url: "NicknameHandler.ashx",
                cache: false,
                async: false,
                data: "name=" + escape($.trim($('#_nickName').val()))
            }).responseText != "0") {
                alert('登录名已存在，请重新填写！');
                $("#_nickName").focus();
                return false;
            };
            var quxian = $("#_quxian option:selected").val();
            var shequ = $("#_shequ option:selected").val();
            var jiedao = $("#_jiedao option:selected").val();
//            var lst = document.getElementById("_xiehui").getElementsByTagName("input");
//            var isCheck = false;
//            if (lst.length > 0)
//                for (var i = 0; i < lst.length; i++) {
//                    if (lst[i].checked) {
//                        isCheck = true;
//                        break;
//                    }
//                }
//            if (!isCheck) {
//                return false;
//            }
            if (quxian == "-2" || shequ == "-2" || jiedao == "-2") {
                if (parseInt($('#_chengshi option:selected').val()) <= 17 || parseInt($('#_chengshi option:selected').val()) >= 19)
                    return false;
            }
            if (!$("#CheckBox1").attr("checked")) {
                $("#CheckBox1").focus();
                return false;
            }
            $("#HiddenField11").val(escape($("#_quxian").html()));
            $("#HiddenField12").val(escape($("#_shequ").html()));
            $("#HiddenField13").val(escape($("#_jiedao").html()));
            $("#_xiehui_shi_v").val(escape($("#_xiehui_shi").html()));
            $("#_xiehui_qu_v").val(escape($("#_xiehui_qu").html()));
            $("#_xiehui_jie_v").val(escape($("#_xiehui_jie").html()));
            $("#_xiehui_shequ_v").val(escape($("#_xiehui_shequ").html()));
            return true;
        }
    </SCRIPT>
   <FORM id=form1 encType=multipart/form-data 
onsubmit="javascript:return WebForm_OnSubmit();" method=post name=form1 
action=/web/register.shtml>
<DIV><INPUT id=__EVENTTARGET type=hidden name=__EVENTTARGET> <INPUT 
id=__EVENTARGUMENT type=hidden name=__EVENTARGUMENT> <INPUT id=__VIEWSTATE 
value=/wEPDwUKLTQ1MzU4NDU3Mw9kFgICAxAWAh4HZW5jdHlwZQUTbXVsdGlwYXJ0L2Zvcm0tZGF0YWQWCAIdDxAPFgYeDURhdGFUZXh0RmllbGQFBG5hbWUeDkRhdGFWYWx1ZUZpZWxkBQJpZB4LXyFEYXRhQm91bmRnZBAVBQnor7fpgInmi6kG5Zui5ZGYBuWFmuWRmAbnvqTkvJcS5YW25LuW5YWa5rS+5Lq65aOrFQUCLTEBMQEyATMBNBQrAwVnZ2dnZ2RkAiMPEA8WBh8BBQRuYW1lHwIFAmlkHwNnZBAVFQnor7fpgInmi6kJ5ZOI5bCU5ruoDOm9kOm9kOWTiOWwlAnniaHkuLnmsZ8J5L2z5pyo5pavBuWkp+W6hgbpuKHopb8J5Y+M6bit5bGxBuS8iuaYpQnkuIPlj7DmsrMG6bmk5bKXBue7peWMlgbpu5HmsrMM5aSn5YW05a6J5bKtDOajruW3peaAu+WxgAzlhpzlnqbmgLvlsYAS5ZOI5bCU5ruo6ZOB6Lev5bGADOWkp+W6huayueeUsBLnnIHnm7TmnLrlhbPlt6Xlp5QM55yB55u06auY5qChCeecgeebtOWxnhUVAi0yATIBMwE0ATUBNgE3ATgBOQIxMAIxMQIxMgIxNAIxNQIxNgIxNwIxOAIxOQIyMAIyMQIyNBQrAxVnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dkZAIxDxAPFgYfAQUEbmFtZR8CBQJpZB8DZ2QQFQoJ6K+36YCJ5oupBuWwj+WtpgbliJ3kuK0G6auY5LitBuS4reS4kwbmnKznp5EG5LiT56eRBuehleWjqwbljZrlo6sG5oqA5qChFQoCLTEBMQEyATMBNAE1ATYBNwE4ATkUKwMKZ2dnZ2dnZ2dnZ2RkAj0PEA8WBh8BBQRuYW1lHwIFAmlkHwNnZBAVEgblhZrlkZgG6Z2S5bm0BuW3vuW4vAbogYzlt6UG6ICB5bm0Cee6ouWNgeWtlwbnjq/kv50G5rOV5b6LBuenkeaZrgbliqnmrosG5raI6ZiyBuWNq+eUnwzlhajmsJHlgaXouqsM5b+D55CG5YGl5bq3BumHkeiejQzmlofmmI7ln47luIIG5oWI5ZaEBuemgeavkhUSATEBMgEzATQBNQE2ATcBOAE5AjEwAjExAjEyAjEzAjE0AjE1AjE2AjE3AjY0FCsDEmdnZ2dnZ2dnZ2dnZ2dnZ2dnZ2RkGAEFHl9fQ29udHJvbHNSZXF1aXJlUG9zdEJhY2tLZXlfXxYZBQdfdXBsb2FkBQlfeGluZ2JpZTEFCV94aW5nYmllMgUJX3hpbmdiaWUyBQlfeGllaHVpJDAFCV94aWVodWkkMQUJX3hpZWh1aSQyBQlfeGllaHVpJDMFCV94aWVodWkkNAUJX3hpZWh1aSQ1BQlfeGllaHVpJDYFCV94aWVodWkkNwUJX3hpZWh1aSQ4BQlfeGllaHVpJDkFCl94aWVodWkkMTAFCl94aWVodWkkMTEFCl94aWVodWkkMTIFCl94aWVodWkkMTMFCl94aWVodWkkMTQFCl94aWVodWkkMTUFCl94aWVodWkkMTYFCl94aWVodWkkMTcFCl94aWVodWkkMTcFCUNoZWNrQm94MQUHX3N1Ym1pdKrEYfQowcv7nQlihc+6A4k/RkBD 
type=hidden name=__VIEWSTATE> </DIV>
<SCRIPT type=text/javascript>
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</SCRIPT>

<SCRIPT type=text/javascript src="content/templates/images/WebResource.axd"></SCRIPT>

<SCRIPT type=text/javascript 
src="content/templates/images/WebResource(1).axd"></SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[
function WebForm_OnSubmit() {
if (typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
return true;
}
//]]>
</SCRIPT>

<DIV><INPUT id=__EVENTVALIDATION 
value=/wEWYAK63/iTBgLtkbTVBALOrdCWAwKwg8JYAq6N8/EEAq6Nu/EEAtG658cCAr6E/4oCAr+E/4oCApfqmIgGApvq1IsGAprq1IsGApnq1IsGApjq1IsGAuKToewOAq+oqtsBAtHDt5MEAtzD/5AEAt/D/5AEAt7D/5AEAtnD/5AEAtjD/5AEAtvD/5AEAsrD/5AEAsXD/5AEAt3Dv5MEAt3Ds5MEAt3Dt5MEAt3Dj5MEAt3Dg5MEAt3Dh5MEAt3Dm5MEAt3D35AEAt3D05AEAtzDv5MEAtzDs5MEAtzDj5MEAqyVtgECr5W2AQKulbYBAsP5gasMAs/5zagMAs75zagMAs35zagMAsz5zagMAsv5zagMAsr5zagMAtuU/IMKAt+Djr4GAtODwr0GAtKDwr0GAtGDwr0GAtCDwr0GAteDwr0GAtaDwr0GAtWDwr0GAsSDwr0GAsuDwr0GAsK9xckJArTFzLgOApKLpYsGApOLpYsGApCLpYsGAq2C8+YJAuW5s5QBAua5s5QBAue5s5QBAui5s5QBAuG5s5QBAuK5s5QBAuO5s5QBAuS5s5QBAu25s5QBAu65s5QBAua585QBAua595QBAua565QBAua575QBAua5g5UBAua5h5UBAua5+5QBAua5/5QBAuz23+0EAt6VufQDAp+O/u8KAo3r9eUCApeo8U8C/rPTkw4C9ezI1AsChqT42wUCwZGq8gEC0ZfYpQsCrNiXgA8C2+q7sQwCguTXuwkC79K49gQVcGMU1lp5aFUl21O88XownFfR9A== 
type=hidden name=__EVENTVALIDATION> </DIV><INPUT id=_picID type=hidden 
name=_picID> 
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
  <TR>
    <TD><IMG alt="" src="content/templates/images/register_02.png" width=941 
      height=377></TD></TR></TBODY></TABLE>
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
  <TR>
    <TD height=66><IMG alt="" src="content/templates/images/register_06.png" 
      width=460 height=28></TD></TR></TBODY></TABLE>
<TABLE class=border01 border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
  <TR>
    <TD class=auto-style1><IMG alt="" src="content/templates/images/register_10.png" 
      width=939 height=33></TD></TR>
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
                  id=_photo class=border01 
              src="content/templates/images/nopic.jpg"></TD></TR>
              <TR>
                <TD height=8 align=middle></TD></TR>
              <TR>
                <TD align=middle>
                  <TABLE border=0 cellSpacing=0 cellPadding=3>
                    <TBODY>
                    <TR>
                      <TD><INPUT style="WIDTH: 128px" id=_file type=file 
                        name=_file></TD></TR>
                    <TR>
                      <TD><INPUT 
                        style="BORDER-RIGHT-WIDTH: 0px; WIDTH: 72px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; HEIGHT: 27px; BORDER-LEFT-WIDTH: 0px" 
                        id=_upload 
                        onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("_upload", "", true, "", "", false, false))' 
                        src="content/templates/images/register_18.png" type=image 
                        name=_upload> 
                        <DIV style="MARGIN-TOP: 5px; FONT-SIZE: 12px">图片大小200 
                        K以内</DIV></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
          <TD width=10>&nbsp;</TD>
          <TD>
            <TABLE border=0 cellSpacing=0 cellPadding=0 width=750 align=right>
              <TBODY>
              <TR>
                <TD class=f_b_01 bgColor=#ecf5ff height=35 align=right>登录名：</TD>
                <TD bgColor=#ecf5ff><INPUT style="WIDTH: 180px" id=_nickName 
                  maxLength=10 type=text name=_nickName> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator3></SPAN><SPAN 
                  style="COLOR: red">*</SPAN></TD>
                <TD class=f_b_01 bgColor=#ecf5ff align=right>登录密码：</TD>
                <TD bgColor=#ecf5ff><INPUT style="WIDTH: 106px; HEIGHT: 20px" 
                  id=_password maxLength=20 type=password name=_password> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator4></SPAN><SPAN 
                  style="COLOR: red">*6-16位</SPAN></TD>
                <TD class=f_b_01 bgColor=#ecf5ff align=right>重复密码：</TD>
                <TD bgColor=#ecf5ff><INPUT style="WIDTH: 106px; HEIGHT: 20px" 
                  id=_password2 maxLength=20 type=password name=_password2> 
                  <SPAN style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator5></SPAN><SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=CompareValidator1></SPAN><SPAN 
                style="COLOR: red">*</SPAN></TD></TR>
              <TR>
                <TD height=35 align=right>姓名：</TD>
                <TD><INPUT style="WIDTH: 180px" id=_xingming maxLength=8 
                  type=text name=_xingming> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator1></SPAN><SPAN 
                  style="COLOR: red">*</SPAN></TD>
                <TD align=right>性别：</TD>
                <TD><INPUT id=_xingbie1 value=_xingbie1 CHECKED type=radio 
                  name=xingbie><LABEL for=_xingbie1>男</LABEL><SPAN 
                  style="MARGIN-LEFT: 10px"><INPUT id=_xingbie2 value=_xingbie2 
                  type=radio name=xingbie><LABEL 
                for=_xingbie2>女</LABEL></SPAN></TD>
                <TD align=right>政治面貌：</TD>
                <TD><SELECT style="WIDTH: 106px" id=_zhengzhimianmao 
                  name=_zhengzhimianmao> <OPTION selected 
                    value=-1>请选择</OPTION> <OPTION value=1>团员</OPTION> <OPTION 
                    value=2>党员</OPTION> <OPTION value=3>群众</OPTION> <OPTION 
                    value=4>其他党派人士</OPTION></SELECT> <SPAN 
                  style="COLOR: red">*</SPAN></TD></TR>
              <TR>
                <TD height=35 align=right>所在单位：</TD>
                <TD colSpan=3><INPUT style="WIDTH: 428px" id=_danwei 
                  maxLength=50 type=text name=_danwei></TD>
                <TD align=right>职级：</TD>
                <TD><INPUT style="WIDTH: 106px" id=_zhiji maxLength=20 
                  type=text name=_zhiji></TD></TR>
              <TR>
                <TD bgColor=#f7f7f7 height=35 align=right>所在城市：</TD>
                <TD bgColor=#f7f7f7 colSpan=5><SELECT style="WIDTH: 106px" 
                  id=_chengshi name=_chengshi> <OPTION selected 
                    value=-2>请选择</OPTION> <OPTION value=2>哈尔滨</OPTION> <OPTION 
                    value=3>齐齐哈尔</OPTION> <OPTION value=4>牡丹江</OPTION> <OPTION 
                    value=5>佳木斯</OPTION> <OPTION value=6>大庆</OPTION> <OPTION 
                    value=7>鸡西</OPTION> <OPTION value=8>双鸭山</OPTION> <OPTION 
                    value=9>伊春</OPTION> <OPTION value=10>七台河</OPTION> <OPTION 
                    value=11>鹤岗</OPTION> <OPTION value=12>绥化</OPTION> <OPTION 
                    value=14>黑河</OPTION> <OPTION value=15>大兴安岭</OPTION> <OPTION 
                    value=16>森工总局</OPTION> <OPTION value=17>农垦总局</OPTION> 
                    <OPTION value=18>哈尔滨铁路局</OPTION> <OPTION 
                    value=19>大庆油田</OPTION> <OPTION value=20>省直机关工委</OPTION> 
                    <OPTION value=21>省直高校</OPTION> <OPTION 
                  value=24>省直属</OPTION></SELECT> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=CustomValidator3></SPAN><SPAN style="COLOR: red">*</SPAN> 
                  &nbsp;区/县/市：<SELECT style="WIDTH: 108px" id=_quxian 
                  name=_quxian></SELECT> <INPUT id=HiddenField11 
                  value=%3Coption%20value%3D%22-2%22%3E%u8BF7%u9009%u62E9%3C/option%3E 
                  type=hidden name=HiddenField11> <INPUT id=HiddenField12 
                  type=hidden name=HiddenField12> <INPUT id=HiddenField13 
                  value=%3Coption%20value%3D%22-2%22%3E%u8BF7%u9009%u62E9%3C/option%3E 
                  type=hidden name=HiddenField13> <SPAN 
                  style="COLOR: red">*</SPAN>&nbsp; 街道：<SELECT 
                  style="WIDTH: 108px" id=_jiedao name=_jiedao></SELECT> <SPAN 
                  style="COLOR: red">*</SPAN> &nbsp;<BR>社区：<SELECT id=_shequ 
                  name=_shequ></SELECT> <SPAN style="COLOR: red">*</SPAN></TD></TR>
              <TR>
                <TD height=35 align=right>社会职业：</TD>
                <TD><SELECT style="WIDTH: 106px" id=_shenfen name=_shenfen> 
                    <OPTION selected value=-1>请选择</OPTION> <OPTION 
                    value=1>行政</OPTION> <OPTION value=2>事业</OPTION> <OPTION 
                    value=3>企业</OPTION> <OPTION value=4>农业</OPTION> <OPTION 
                    value=5>学生</OPTION> <OPTION value=6>其他</OPTION></SELECT><SPAN 
                  style="COLOR: red">*</SPAN> </TD>
                <TD align=right>专业：</TD>
                <TD><INPUT style="WIDTH: 106px" id=_zhuanye type=text 
                  name=_zhuanye></TD>
                <TD align=right>学历：</TD>
                <TD><SELECT style="WIDTH: 106px" id=_xueli name=_xueli> 
                    <OPTION selected value=-1>请选择</OPTION> <OPTION 
                    value=1>小学</OPTION> <OPTION value=2>初中</OPTION> <OPTION 
                    value=3>高中</OPTION> <OPTION value=4>中专</OPTION> <OPTION 
                    value=5>本科</OPTION> <OPTION value=6>专科</OPTION> <OPTION 
                    value=7>硕士</OPTION> <OPTION value=8>博士</OPTION> <OPTION 
                    value=9>技校</OPTION></SELECT> <SPAN 
                style="COLOR: red">*</SPAN></TD></TR>
              <TR>
                <TD height=35 align=right>毕业或就&nbsp;&nbsp;<BR>读院校： </TD>
                <TD colSpan=5><INPUT style="WIDTH: 428px" id=_biyeyuanxiao 
                  maxLength=40 type=text name=_biyeyuanxiao></TD></TR>
              <TR>
                <TD height=35 align=right>特长爱好： </TD>
                <TD colSpan=5><INPUT style="WIDTH: 428px" id=_techang 
                  maxLength=40 type=text name=_techang></TD></TR>
              <TR>
                <TD height=35 align=right>身份证号：</TD>
                <TD colSpan=5><SELECT id=DropDownList1 name=DropDownList1> 
                    <OPTION selected value=1>身份证</OPTION> <OPTION 
                    value=2>护照号</OPTION> <OPTION value=3>回乡证号</OPTION></SELECT> 
                  <INPUT style="WIDTH: 428px" id=_shenfenzheng maxLength=19 
                  type=text name=_shenfenzheng> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator2></SPAN><SPAN 
                  style="COLOR: red">*<BR>注：无身份证则填入其它证件号如护照号，回乡证号。</SPAN></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD><IMG alt="" src="content/templates/images/register_21.png" width=939 
      height=33></TD></TR>
  <TR>
    <TD>
      <TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
        <TBODY>
        <TR>
          <TD height=80>
            <TABLE id=_xiehui border=0 cellSpacing=10>
              <TBODY>
              <TR>
                <TD><INPUT id=_xiehui_0 type=checkbox name=_xiehui$0><LABEL 
                  for=_xiehui_0>党员</LABEL></TD>
                <TD><INPUT id=_xiehui_1 type=checkbox name=_xiehui$1><LABEL 
                  for=_xiehui_1>青年</LABEL></TD>
                <TD><INPUT id=_xiehui_2 type=checkbox name=_xiehui$2><LABEL 
                  for=_xiehui_2>巾帼</LABEL></TD>
                <TD><INPUT id=_xiehui_3 type=checkbox name=_xiehui$3><LABEL 
                  for=_xiehui_3>职工</LABEL></TD>
                <TD><INPUT id=_xiehui_4 type=checkbox name=_xiehui$4><LABEL 
                  for=_xiehui_4>老年</LABEL></TD>
                <TD><INPUT id=_xiehui_5 type=checkbox name=_xiehui$5><LABEL 
                  for=_xiehui_5>红十字</LABEL></TD>
                <TD><INPUT id=_xiehui_6 type=checkbox name=_xiehui$6><LABEL 
                  for=_xiehui_6>环保</LABEL></TD>
                <TD><INPUT id=_xiehui_7 type=checkbox name=_xiehui$7><LABEL 
                  for=_xiehui_7>法律</LABEL></TD>
                <TD><INPUT id=_xiehui_8 type=checkbox name=_xiehui$8><LABEL 
                  for=_xiehui_8>科普</LABEL></TD>
                <TD><INPUT id=_xiehui_9 type=checkbox name=_xiehui$9><LABEL 
                  for=_xiehui_9>助残</LABEL></TD>
                <TD><INPUT id=_xiehui_10 type=checkbox name=_xiehui$10><LABEL 
                  for=_xiehui_10>消防</LABEL></TD>
                <TD><INPUT id=_xiehui_11 type=checkbox name=_xiehui$11><LABEL 
                  for=_xiehui_11>卫生</LABEL></TD></TR>
              <TR>
                <TD><INPUT id=_xiehui_12 type=checkbox name=_xiehui$12><LABEL 
                  for=_xiehui_12>全民健身</LABEL></TD>
                <TD><INPUT id=_xiehui_13 type=checkbox name=_xiehui$13><LABEL 
                  for=_xiehui_13>心理健康</LABEL></TD>
                <TD><INPUT id=_xiehui_14 type=checkbox name=_xiehui$14><LABEL 
                  for=_xiehui_14>金融</LABEL></TD>
                <TD><INPUT id=_xiehui_15 type=checkbox name=_xiehui$15><LABEL 
                  for=_xiehui_15>文明城市</LABEL></TD>
                <TD><INPUT id=_xiehui_16 type=checkbox name=_xiehui$16><LABEL 
                  for=_xiehui_16>慈善</LABEL></TD>
                <TD><INPUT id=_xiehui_17 type=checkbox name=_xiehui$17><LABEL 
                  for=_xiehui_17>禁毒</LABEL></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD></TR></TBODY></TABLE>
            <DIV style="WIDTH: 95%; MARGIN-LEFT: 10px" 
            id=_xiehui_shi></DIV><INPUT id=_xiehui_shi_v type=hidden 
            name=_xiehui_shi_v> 
            <DIV style="WIDTH: 95%; MARGIN-LEFT: 10px" 
            id=_xiehui_qu></DIV><INPUT id=_xiehui_qu_v type=hidden 
            name=_xiehui_qu_v> 
            <DIV style="WIDTH: 95%; MARGIN-LEFT: 10px" 
            id=_xiehui_jie></DIV><INPUT id=_xiehui_jie_v type=hidden 
            name=_xiehui_jie_v> 
            <DIV style="WIDTH: 95%; MARGIN-LEFT: 10px" 
            id=_xiehui_shequ></DIV><INPUT id=_xiehui_shequ_v type=hidden 
            name=_xiehui_shequ_v> </TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD><IMG alt="" src="content/templates/images/register_23.png" width=939 
      height=33></TD></TR>
  <TR>
    <TD 
    style="PADDING-BOTTOM: 20px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; PADDING-TOP: 20px">
      <TABLE border=0 cellSpacing=0 cellPadding=3 width="96%" align=center>
        <TBODY>
        <TR>
          <TD height=35>手机号码：</TD>
          <TD><INPUT style="WIDTH: 300px" id=_shouji maxLength=40 type=text 
            name=_shouji> <SPAN style="DISPLAY: none; COLOR: red" 
            id=CustomValidator1></SPAN><SPAN 
            style="COLOR: red">*与固话至少填写其中一项</SPAN></TD>
          <TD>电子邮箱：</TD>
          <TD><INPUT style="WIDTH: 200px" id=_youxiang maxLength=20 type=text 
            name=_youxiang></TD></TR>
        <TR>
          <TD height=35>固定电话：</TD>
          <TD><INPUT style="WIDTH: 300px" id=_guhua maxLength=20 type=text 
            name=_guhua></TD>
          <TD>QQ 号码：</TD>
          <TD><INPUT style="WIDTH: 200px" id=_QQ maxLength=10 type=text 
            name=_QQ></TD></TR>
        <TR>
          <TD height=35>单位地址：</TD>
          <TD><INPUT style="WIDTH: 300px" id=_danweidizhi maxLength=50 
            type=text name=_danweidizhi></TD>
          <TD>邮政编码：</TD>
          <TD><INPUT style="WIDTH: 200px" id=_danweiyoubian maxLength=10 
            type=text name=_danweiyoubian></TD></TR>
        <TR>
          <TD height=35>家庭住址：</TD>
          <TD><INPUT style="WIDTH: 300px" id=_jiatingzhuzhi maxLength=50 
            type=text name=_jiatingzhuzhi></TD>
          <TD>邮政编码：</TD>
          <TD><INPUT style="WIDTH: 200px" id=_jiatingyoubian maxLength=10 
            type=text name=_jiatingyoubian></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD><IMG alt="" src="content/templates/images/register_25.png" width=939 
      height=33></TD></TR>
  <TR>
    <TD 
    style="PADDING-BOTTOM: 20px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; PADDING-TOP: 20px">
      <TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
        <TBODY>
        <TR>
          <TD height=50 
            align=middle>本人自愿成为志愿者，遵守国家法律和志愿服务章程，为弘扬志愿服务精神，推动志愿服务尽一份力量。<BR><BR><INPUT 
            id=CheckBox1 type=checkbox 
        name=CheckBox1>同意以上陈述。<BR><BR></TD></TR></TBODY></TABLE>
      <TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
        <TBODY>
        <TR>
          <TD><INPUT 
            style="BORDER-RIGHT-WIDTH: 0px; WIDTH: 109px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; HEIGHT: 35px; BORDER-LEFT-WIDTH: 0px" 
            id=_submit 
            onclick='return Check();WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("_submit", "", true, "", "", false, false))' 
            src="content/templates/images/register_28.png" type=image name=_submit></TD>
          <TD width=80>&nbsp;</TD>
          <TD><A id=_reset href="http://zy.dbw.cn/web/register.shtml#"><IMG 
            alt="" src="content/templates/images/register_30.png" width=109 
            height=35></A></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
  <TR>
    <TD 
    style="PADDING-BOTTOM: 20px; LINE-HEIGHT: 25px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; PADDING-TOP: 20px" 
    align=middle>爱心之声
</TD></TR></TBODY></TABLE>
<SCRIPT type=text/javascript>
//<![CDATA[
var Page_Validators =  new Array(document.getElementById("RequiredFieldValidator3"), document.getElementById("RequiredFieldValidator4"), document.getElementById("RequiredFieldValidator5"), document.getElementById("CompareValidator1"), document.getElementById("RequiredFieldValidator1"), document.getElementById("CustomValidator3"), document.getElementById("RequiredFieldValidator2"), document.getElementById("CustomValidator1"));
//]]>
</SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[
var RequiredFieldValidator3 = document.all ? document.all["RequiredFieldValidator3"] : document.getElementById("RequiredFieldValidator3");
RequiredFieldValidator3.controltovalidate = "_nickName";
RequiredFieldValidator3.focusOnError = "t";
RequiredFieldValidator3.display = "None";
RequiredFieldValidator3.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator3.initialvalue = "";
var RequiredFieldValidator4 = document.all ? document.all["RequiredFieldValidator4"] : document.getElementById("RequiredFieldValidator4");
RequiredFieldValidator4.controltovalidate = "_password";
RequiredFieldValidator4.focusOnError = "t";
RequiredFieldValidator4.display = "None";
RequiredFieldValidator4.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator4.initialvalue = "";
var RequiredFieldValidator5 = document.all ? document.all["RequiredFieldValidator5"] : document.getElementById("RequiredFieldValidator5");
RequiredFieldValidator5.controltovalidate = "_password2";
RequiredFieldValidator5.focusOnError = "t";
RequiredFieldValidator5.display = "None";
RequiredFieldValidator5.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator5.initialvalue = "";
var CompareValidator1 = document.all ? document.all["CompareValidator1"] : document.getElementById("CompareValidator1");
CompareValidator1.controltovalidate = "_password2";
CompareValidator1.focusOnError = "t";
CompareValidator1.display = "None";
CompareValidator1.evaluationfunction = "CompareValidatorEvaluateIsValid";
CompareValidator1.controltocompare = "_password";
CompareValidator1.controlhookup = "_password";
var RequiredFieldValidator1 = document.all ? document.all["RequiredFieldValidator1"] : document.getElementById("RequiredFieldValidator1");
RequiredFieldValidator1.controltovalidate = "_xingming";
RequiredFieldValidator1.focusOnError = "t";
RequiredFieldValidator1.display = "None";
RequiredFieldValidator1.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator1.initialvalue = "";
var CustomValidator3 = document.all ? document.all["CustomValidator3"] : document.getElementById("CustomValidator3");
CustomValidator3.controltovalidate = "_chengshi";
CustomValidator3.focusOnError = "t";
CustomValidator3.display = "None";
CustomValidator3.evaluationfunction = "CustomValidatorEvaluateIsValid";
CustomValidator3.clientvalidationfunction = "AreaValidate";
var RequiredFieldValidator2 = document.all ? document.all["RequiredFieldValidator2"] : document.getElementById("RequiredFieldValidator2");
RequiredFieldValidator2.controltovalidate = "_shenfenzheng";
RequiredFieldValidator2.focusOnError = "t";
RequiredFieldValidator2.display = "None";
RequiredFieldValidator2.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator2.initialvalue = "";
var CustomValidator1 = document.all ? document.all["CustomValidator1"] : document.getElementById("CustomValidator1");
CustomValidator1.display = "None";
CustomValidator1.evaluationfunction = "CustomValidatorEvaluateIsValid";
CustomValidator1.clientvalidationfunction = "PhoneValidate";
//]]>
</SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[

var Page_ValidationActive = false;
if (typeof(ValidatorOnLoad) == "function") {
    ValidatorOnLoad();
}

function ValidatorOnSubmit() {
    if (Page_ValidationActive) {
        return ValidatorCommonOnSubmit();
    }
    else {
        return true;
    }
}
        //]]>
</SCRIPT>
</FORM> 
    
    