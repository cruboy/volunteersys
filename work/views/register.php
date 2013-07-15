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

<SCRIPT type=text/javascript>
        $(document).ready(function () {
            $(":text,:file,:password,select").attr('class', 'input02');
            
            document.getElementById('uploadp').onclick = function () {
                  var uploadValue = $("#filepo").val();
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
                document.forms['form1'].action="index.php?register&up";
                return true;
            };
            document.getElementById('reset').onclick = function () {
                document.forms['form1'].reset();
         
            };
        });
        function PhoneValidate(sender, args) { args.IsValid = ($("#shouji").val().length > 0 || $("#guhua").val().length > 0); }
        function AreaValidate(sender, args) { args.IsValid = (args.Value != "-2"); }
        function success() { alert('恭喜您，注册成功！'); window.location.href = '/'; }
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
            var lennn = $("#password").val().length;
            if (lennn < 6 || lennn > 16) {
                $("#password").focus();
                return false;
            } else {
                return true;
            }
        }

        function Check() {
             if ($.ajax({
            type: "GET",
            url: "?register",
            cache: false,
            async: false,
            data: "name=" + escape($.trim($('#username').val()))
        }).responseText != "0") {
            alert('登录名已存在，请换一个！');
            $("#username").focus();
            return false;
        };
            if (!JCheck($("#username")) || !JCheck($("#password")) || 
                    !CheckLength() || !Comp($("#password"), $("#password2")) 
                    || !JCheck($("#xingming")) || !JCheck($("#shenfenzheng"))
                     || (!JCheck($("#guhua")) && !JCheck($("#shouji"))))
                return false;
            if ($("#zhengzhimianmao option:selected").val() == "-1") {
                $("#zhengzhimianmao").focus();
                return false;
            }
            if ($("#shenfen option:selected").val() == "-1") {
                $("#shenfen").focus();
                return false;
            }
            if ($("#xueli option:selected").val() == "-1") {
                $("#xueli").focus();
                return false;
            }
    

            if (!$("#agrees").attr("checked")) {
                $("#agrees").focus();
                return false;
            }
            document.forms['form1'].action="index.php?register&rg";
            return true;
        }
    </SCRIPT>
   <FORM id=form1 encType=multipart/form-data 
 method=post name=form1 
>

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
                  id=photos class=border01 
              src="<?php echo $usericon;?>"></TD></TR>
              <TR>
                <TD height=8 align=middle></TD></TR>
              <TR>
                <TD align=middle>
                  <TABLE border=0 cellSpacing=0 cellPadding=3>
                    <TBODY>
                    <TR>
                      <TD><INPUT style="WIDTH: 128px" id=filepo type=file 
                        name=filepo></TD></TR>
                    <TR>
                      <TD><INPUT 
                        style="BORDER-RIGHT-WIDTH: 0px; WIDTH: 72px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; HEIGHT: 27px; BORDER-LEFT-WIDTH: 0px" 
                        id=uploadp 
                        onclick='' 
                        src="content/templates/images/register_18.png" type=image 
                        name=uploadp> 
                        <DIV style="MARGIN-TOP: 5px; FONT-SIZE: 12px">图片大小200 
                        K以内</DIV></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
          <TD width=10>&nbsp;</TD>
          <TD>
          <input type="hidden" name="photo" value="<?php echo $photoname; ?>"/>
            <TABLE border=0 cellSpacing=0 cellPadding=0 width=750 align=right>
              <TBODY>
              <TR>
                <TD class=f_b_01 bgColor=#ecf5ff height=35 align=right>登录名：</TD>
                <TD bgColor=#ecf5ff><INPUT style="WIDTH: 180px" id=username 
                  maxLength=10 type=text name=username> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator3></SPAN><SPAN 
                  style="COLOR: red">*</SPAN></TD>
                <TD class=f_b_01 bgColor=#ecf5ff align=right>登录密码：</TD>
                <TD bgColor=#ecf5ff><INPUT style="WIDTH: 106px; HEIGHT: 20px" 
                  id=password maxLength=20 type=password name=password> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator4></SPAN><SPAN 
                  style="COLOR: red">*6-16位</SPAN></TD>
                <TD class=f_b_01 bgColor=#ecf5ff align=right>重复密码：</TD>
                <TD bgColor=#ecf5ff><INPUT style="WIDTH: 106px; HEIGHT: 20px" 
                  id=password2 maxLength=20 type=password name=password2> 
                  <SPAN style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator5></SPAN><SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=CompareValidator1></SPAN><SPAN 
                style="COLOR: red">*</SPAN></TD></TR>
              <TR>
                <TD height=35 align=right>姓名：</TD>
                <TD><INPUT style="WIDTH: 180px" id=xingming maxLength=8 
                  type=text name=xingming> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator1></SPAN><SPAN 
                  style="COLOR: red">*</SPAN></TD>
                <TD align=right>性别：</TD>
                <TD><INPUT id=xingbie1 value='男'  CHECKED type=radio 
                  name=xingbie><LABEL for=xingbie1>男</LABEL><SPAN 
                  style="MARGIN-LEFT: 10px"><INPUT id=xingbie2 value='女' 
                  type=radio name=xingbie><LABEL 
                for=xingbie2>女</LABEL></SPAN></TD>
                <TD align=right>政治面貌：</TD>
                <TD><SELECT style="WIDTH: 106px" id=zhengzhimianmao 
                  name=zhengzhimianmao> <OPTION selected 
                    value=-1>请选择</OPTION> <OPTION value=1>团员</OPTION> <OPTION 
                    value=2>党员</OPTION> <OPTION value=3>群众</OPTION> <OPTION 
                    value=4>其他党派人士</OPTION></SELECT> <SPAN 
                  style="COLOR: red">*</SPAN></TD></TR>
              <TR>
                <TD height=35 align=right>所在单位：</TD>
                <TD colSpan=3><INPUT style="WIDTH: 428px" id=danwei 
                  maxLength=50 type=text name=danwei></TD>
                <TD align=right>职级：</TD>
                <TD><INPUT style="WIDTH: 106px" id=zhiji maxLength=20 
                  type=text name=zhiji></TD></TR>
              <TR>
                <TD bgColor=#f7f7f7 height=35 align=right>所在地区：</TD>
                <TD bgColor=#f7f7f7 colSpan=5>
                       <select name="zone">
                            <option value="0">请选择</option>
                            <?php foreach($zones as $z) { ?>
<option <?php if($z['zone_id'] == $zone) { ?>selected="selected"<?php } ?> value="<?php echo $z['zone_id'];?>"><?php echo $z['name'];?></option>
                            <?php } ?>
                        </select> 省
                        <select name="city">
                            <option value="0">请选择</option>
                        </select> 市
                        <select name="district">
                            <option value="0">请选择</option>
                        </select> 区 
                        <SPAN style="COLOR: red">*</SPAN>
                        </TD></TR>
              <TR>
                <TD height=35 align=right>社会职业：</TD>
                <TD><SELECT style="WIDTH: 106px" id=shenfen name=shenfen> 
                    <OPTION selected value=-1>请选择</OPTION> <OPTION 
                    value=1>行政</OPTION> <OPTION value=2>事业</OPTION> <OPTION 
                    value=3>企业</OPTION> <OPTION value=4>农业</OPTION> <OPTION 
                    value=5>学生</OPTION> <OPTION value=6>其他</OPTION></SELECT><SPAN 
                  style="COLOR: red">*</SPAN> </TD>
                <TD align=right>专业：</TD>
                <TD><INPUT style="WIDTH: 106px" id=zhuanye type=text 
                  name=zhuanye></TD>
                <TD align=right>学历：</TD>
                <TD><SELECT style="WIDTH: 106px" id=xueli name=xueli> 
                    <OPTION selected value=-1>请选择</OPTION> <OPTION 
                    value=1>小学</OPTION> <OPTION value=2>初中</OPTION> <OPTION 
                    value=3>高中</OPTION> <OPTION value=4>中专</OPTION> <OPTION 
                    value=5>本科</OPTION> <OPTION value=6>专科</OPTION> <OPTION 
                    value=7>硕士</OPTION> <OPTION value=8>博士</OPTION> <OPTION 
                    value=9>技校</OPTION></SELECT> <SPAN 
                style="COLOR: red">*</SPAN></TD></TR>
              <TR>
                <TD height=35 align=right>毕业或就&nbsp;&nbsp;<BR>读院校： </TD>
                <TD colSpan=5><INPUT style="WIDTH: 428px" id=biyeyuanxiao 
                  maxLength=40 type=text name=biyeyuanxiao></TD></TR>
              <TR>
                <TD height=35 align=right>特长爱好： </TD>
                <TD colSpan=5><INPUT style="WIDTH: 428px" id=techang 
                  maxLength=40 type=text name=techang></TD></TR>
              <TR>
                <TD height=35 align=right>身份证号：</TD>
                <TD colSpan=5><SELECT id=zheng name=zheng> 
                    <OPTION selected value=1>身份证</OPTION> <OPTION 
                    value=2>学生证号</OPTION> <OPTION value=3>其他证件</OPTION></SELECT> 
                  <INPUT style="WIDTH: 428px" id=shenfenzheng maxLength=19 
                  type=text name=shenfenzheng> <SPAN 
                  style="DISPLAY: none; COLOR: red" 
                  id=RequiredFieldValidator2></SPAN><SPAN 
                  style="COLOR: red">*<BR>注：无身份证则填入其它证件号。
                  </SPAN></TD></TR>
                  </TBODY></TABLE></TD></TR>
                  </TBODY></TABLE></TD></TR>
  <TR>
    <TD><IMG alt="" src="content/templates/images/register_21.png" width=939 
      height=33></TD></TR>
  <TR>
    <TD>
      <TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
        <TBODY>
        <TR>
          <TD height=80>
            <TABLE id=xiehui border=0 cellSpacing=10>
              <TBODY>
              <TR>
            
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD></TR>
                </TBODY></TABLE>
            </TD></TR></TBODY>
            </TABLE></TD></TR>
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
          <TD><INPUT style="WIDTH: 300px" id=shouji maxLength=40 type=text 
            name=shouji> <SPAN style="DISPLAY: none; COLOR: red" 
            id=CustomValidator1></SPAN><SPAN 
            style="COLOR: red">*与固话至少填写其中一项</SPAN></TD>
          <TD>电子邮箱：</TD>
          <TD><INPUT style="WIDTH: 200px" id=email maxLength=20 type=text 
            name=email></TD></TR>
        <TR>
          <TD height=35>固定电话：</TD>
          <TD><INPUT style="WIDTH: 300px" id=guhua maxLength=20 type=text 
            name=guhua></TD>
          <TD>QQ 号码：</TD>
          <TD><INPUT style="WIDTH: 200px" id=QQ maxLength=10 type=text 
            name=QQ></TD></TR>
        <TR>
          <TD height=35>单位地址：</TD>
          <TD><INPUT style="WIDTH: 300px" id=danweidizhi maxLength=50 
            type=text name=danweidizhi></TD>
          <TD>邮政编码：</TD>
          <TD><INPUT style="WIDTH: 200px" id=danweiyoubian maxLength=10 
            type=text name=danweiyoubian></TD></TR>
        <TR>
          <TD height=35>家庭住址：</TD>
          <TD><INPUT style="WIDTH: 300px" id=jiatingzhuzhi maxLength=50 
            type=text name=jiatingzhuzhi></TD>
          <TD>邮政编码：</TD>
          <TD><INPUT style="WIDTH: 200px" id=jiatingyoubian maxLength=10 
            type=text name=jiatingyoubian></TD></TR></TBODY></TABLE></TD></TR>
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
            id=agrees type=checkbox 
        name=agrees>同意以上陈述。<BR><BR></TD></TR></TBODY></TABLE>
      <TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
        <TBODY>
        <TR>
          <TD><INPUT 
            style="BORDER-RIGHT-WIDTH: 0px; WIDTH: 109px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; HEIGHT: 35px; BORDER-LEFT-WIDTH: 0px" 
            id=submit 
            onclick='return Check();' 
            src="content/templates/images/register_28.png" type=image name=submit></TD>
          <TD width=80>&nbsp;</TD>
          <TD><A id=reset href="?register"><IMG 
            alt="" src="content/templates/images/register_30.png" width=109 
            height=35></A></TD>
            </TR>
            </TBODY></TABLE>
            </TD></TR>
            </TBODY></TABLE>


<SCRIPT type=text/javascript>
//<![CDATA[
$(function() {
	var city = '<?php echo $city;?>';
    if($("select[name='zone']").val() > 0) 
        {
         url = "index.php?register";
        var cities = '<option value="0">请选择</option>';
        $.post(url,{zoneId:$("select[name='zone']").val()},function(data) {
            var obj = eval(data);
            for(var i = 0;i<obj.length;i++) {
                if(city == obj[i].city_id) cities += '<option selected="selected" value="'+obj[i].city_id+'">'+obj[i].name+'</option>';
                else cities += '<option value="'+obj[i].city_id+'">'+obj[i].name+'</option>';
            }
            $("select[name='city']").html(cities);
        });
    }

    $("select[name='zone']").change(function() {
        url = "index.php?register";
        var cities = '<option value="0">请选择</option>';
        $.post(url,{zoneId:$(this).val()},function(data) {
        	//alert(data);
            var obj = eval(data);
            for(var i = 0;i<obj.length;i++) {
                cities += '<option value="'+obj[i].city_id+'">'+obj[i].name+'</option>';
            }
            $("select[name='city']").html(cities);
        });
        $("select[name='district']").html("<option value='0'>请选择</option>");
    });
    var district = '<?php echo $district;?>';
    if(city > 0) {
        url = "index.php?register";
        var districts = '<option value="0">请选择</option>';
        $.post(url,{cityId:city},function(data) {
            var obj = eval(data);
            for(var i = 0;i<obj.length;i++) {
                if(district == obj[i].district_id)  districts += '<option selected="selected" value="'+obj[i].district_id+'">'+obj[i].name+'</option>';
                else districts += '<option value="'+obj[i].district_id+'">'+obj[i].name+'</option>';
            }
            $("select[name='district']").html(districts);
        });
    }

    $("select[name='city']").change(function() {
        url = "index.php?register";
        var districts = '<option value="0">请选择</option>';
        $.post(url,{cityId:$(this).val()},function(data) {
            var obj = eval(data);
            for(var i = 0;i<obj.length;i++) {
                districts += '<option value="'+obj[i].district_id+'">'+obj[i].name+'</option>';
            }
            $("select[name='district']").html(districts);
        });
    });
})
$("#menu_register").addClass('sidebarsubmenu1');

        //]]>
</SCRIPT>
</FORM> 
    
    