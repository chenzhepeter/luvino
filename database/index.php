<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META content="Bangood正品查询系统" name=Description>
<META content="Bangood正品查询系统" name=Keywords>
<title>Bangood正品查询系统</title>
<LINK href="css.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/login.js"></script> 
</head>
<?php 

$messge=$_GET[mes];
?>


<body>
<form  method="post" id="login_form" name="login_form" action="code.php">
<div id="container">







<div id="main">
<div class="fwmdiv_t"> 
	<img src="images/i_r1_c1.jpg" id="i_r1_c1" alt="" /><br />
    <img src="images/i_r2_c1.jpg" id="i_r2_c1" alt="" /><br />
    <img src="images/i_r3_c1.jpg" id="i_r3_c1" alt="" /><br />	
	<img src="images/i_r4_c1.jpg" id="i_r4_c1" alt="" /><br />	
	<img src="images/i_r5_c1.jpg" id="i_r5_c1" alt="" /><br />	
	<img src="images/i_r6_c1.jpg" id="i_r6_c1" alt="" />
    </div>
<div class="fwmdiv_q">
<div class="fwmdiv">
<div style="padding:10px; padding-bottom:0px; color:#FFF; font-size:15px;"><label><strong>防伪码：</strong></label><input type="text" size="22" id="fwm" name="fwm" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight: 800; margin:0;" /></div>


<div style="padding:10px;  color:#FFF; font-size:15px;"><label><strong>验证码：</strong></label><input type="text" name="code" id="code" size="4" onkeydown="KeyDown()" style="background:url(images/password_bg.gif) left no-repeat #FFF; border: 0px #ccc solid; height: 20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight: 800; margin:0; padding-left: 24px;" /><input type="text" class="code" id="checkCode"   style=" padding-left:3px;padding-right:3px;width: 35px; background-color:#34151b; border:0px; color:#FFF;" readonly />  <a href="#" onClick="createCode()"><span style="color:#FFFFFF">看不清楚</span></a>
 </div>
 <script type="text/javascript">createCode();</script>
 <div style="padding:5px; text-align:right;  width:120px; float:left;"><input type="submit" value="验证查询" style="background:images/ljcx.gif" /> </div>
<?php
if($messge!="")
{
echo "<font color=red><strong>".$messge."</strong></font>";

}?>

</div>
  
    </div>

	
	<div style="width:950px; height:auto">
	<img src="images/i_r8_c1.jpg" id="i_r8_c1" alt="" /><br />	
	<img src="images/i_r9_c1.jpg" id="i_r9_c1" alt="" /><br />	
	<img src="images/i_r10_c1.jpg" id="i_r10_c1" alt="" /><br />		
	<img src="images/i_r11_c1.jpg" id="i_r11_c1" alt="" /><br />		
	<img src="images/i_r12_c1.jpg" id="i_r12_c1" alt="" /><br />
		</div>
</div>

</div>

</form>
</body>
</html>