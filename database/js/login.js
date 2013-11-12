var code ; //在全局 定义验证码
function createCode(){ 
code = "";
var codeLength = 4;//验证码的长度
var checkCode = document.getElementById("checkCode");
checkCode.value = ""; 

var selectChar = new Array(2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');

for(var i=0;i<codeLength;i++) {
var charIndex = Math.floor(Math.random()*32);
code +=selectChar[charIndex];
}
if(code.length != codeLength){
createCode();
}
checkCode.value = code;
}

function validate () {
//alert("OK");
	

 if(document.login_form.fwm.value==""){
        alert('请输入要查询的防伪码！');
		document.login_form.fwm.focus();
        return false;
    }
   
    if (document.login_form.fwm.value.length<2) 
    {
        window.alert('防伪码长度必须大于2!'); 
        
        return false;
    }
    
  
var inputCode = document.getElementById("code").value.toUpperCase();
if(inputCode.length <=0) {
alert("请输入验证码！");
return false;
}
else if(inputCode != code ){
alert("验证码输入错误！");
createCode();
return false;
}
else {
	var tmpid=document.getElementById("fwm").value;
	chaxun(tmpid);
//alert("OK");
//document.login_form.action="";   
  //  document.login_form.submit();  
return true;

}

}


function reset_form()
{
	document.getElementById('username').value = '';
	document.getElementById('password').value = '';
	return false;
}


createCode();

function KeyDown()
{
　　
　　　if (event.keyCode == 13) { //判断按下的是否是回车键
                 validate()
                  event.returnValue=false;
                  //window.document.getElementByIdx("button").focus(); //btnSearch是按钮id，它获得焦点
                  //window.document.getElementByIdx("button").click(); //按回车激发搜索按钮事件
 

　　　　
　　}
}


function chaxun(fwm){
    var fwm=fwm;
	var url = "code.php?fwm="+fwm;
	$.ajax({
      url: url,
      dataType : 'html',
      cache: false,  
      success: function(html) {
	
     
     $("#fwmxc").html(html);
	showdiv();
      }
 });
}

function showdiv(){
 $("#fwmxc_wc").show();
}
function Hidediv(){
 $("#fwmxc_wc").hide();
}

