<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
<script type="text/javascript"> 
    var conf = {
        isVip:false,
        isMem:false
    };
    var sinaSSOConfig = {
        entry : 'cnmail', // 本产品的标识
        loginType : 0,
        setDomain : true,
        pageCharset :'UTF-8',
        customInit : function() {
            sinaSSOController.setLoginType(3);
        },
        customLoginCallBack : function(status){
            conf.loginCallBack(status);
        }
    };
</script>
<script type="text/javascript" src="template/default/login/images/r.core.js"></script>
<!--<script type="text/javascript" src="template/default/login/images/webface_news_vip.js"></script>-->

<title>网络办公系统 V2.0</title>
<link type="text/css" media="screen" charset="utf-8" rel="stylesheet" href="template/default/content/css/style.account-1.1.css" />
<link rel="stylesheet" href="template/default/login/images/viplogin_130319.css" />
</head>
<body>
<div id="bgHeight" class="bgHeight">
    <input type="hidden" class="productName" value="vip" />
	<!--登录页背景
	<div class="viploginbg"><img src="about:blank" style="width:1260px; height:auto; margin-left: 0px; margin-top:-40px; visibility: visible;" /></div>-->
	<!--/登录页背景-->
	<!--顶部导航-->
	<div class="topbar">
		<div class="topmain">
			<h1 class="logo"></h1>
			<div class="rtop">随时随地，快乐工作！</div>
		</div>
	</div>
	<!--/顶部导航-->
	<!--登录框-->
	<div class="loginBox" id="loginBox" style="margin-top:50px;margin-bottom:50px;">
        <form name="login" method="post" target="_top" action="login.php">
<input type="hidden" name="dosubmit" value="yes" />
	    <ul class="vipMailbox">
	        <li class="mailname"><label class="placeholder" for="vipname">输入用户名</label><input type="text" value="" name="username" class="username focus" id="vipname" tabindex="1"><a class="clearname" href="#" style="display: none;"></a></li>
	        <li class="mailpass" style="margin-top:5px;"><input type="password" value="" name="password" class="password" id="vippassword" tabindex="2"/><label class="placeholder" for="vippassword">输入密码</label></li>
           <li class="btn">
            <a class="BigButtonBHover" href="javascript:document:login.submit();" tabindex="3">登录</a></li>
	    </ul>
		</form>
	</div>
	<!--/登录框-->
	<!--尾部-->
		<div class="vipfooter">
		
			<div class="footenter">
				<div class="copyRight">bube_icq@yahoo.de -- CopyRight © 2014&nbsp; </div>
				
			</div>
		</div>
	<!--/尾部-->
</div>
<script type="text/javascript"> 
    var loginBox = document.getElementById('loginBox');
    var setMiddle = function(){
        var middleH;
        var windoww = Math.max(document.body.clientWidth, document.documentElement.clientWidth),
            windowh = Math.max(document.body.clientHeight, document.documentElement.clientHeight);
        if(windowh <= 500 && windoww <= 950){
            middleH = getMiddleH(1);
        }else if(windowh <= 500){
            middleH = getMiddleH(1);
        }else if(windoww <= 950){
            middleH = getMiddleH();
        }else{
            middleH = getMiddleH();
        }
        loginBox.style.marginTop = 
        loginBox.style.marginBottom = middleH + 'px';
    };
    //获得居中高度
    function getMiddleH(flag){
        var bgHeight = document.getElementById('bgHeight');
        var height = loginBox.clientHeight;
        if(!flag){
            return (bgHeight.clientHeight - 54 - 65 - height)/2;
        }else{
            return (500- 54 - 65 - height)/2;
        }
    }
    setMiddle();
</script>
<script type="text/javascript" src="template/default/login/images/login_130314.js"></script>

  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <script src="template/default/login/jquery.backgroundvideo.min.js"></script>
    <script>
    $(document).ready(function() {
      var videobackground = new $.backgroundVideo($('body'), {
        "align": "centerXY",
        "width": 1280,
        "height": 720,
        "path": "template/default/login/media/",
        "filename": "cloud",
        "types": ["mp4","ogg","jpg","webm"]
      });
    });
  </script>
</body>
</html>

