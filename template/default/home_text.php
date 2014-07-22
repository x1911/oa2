<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml10-transitional.dtd">
<html lang="zh-cn" xml:lang="zh-cn" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>文字版桌面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="template/default/hoem_text/css/style.css" />
<style type="text/css">
body{background: #f9f9f9 url('<?php echo $bg;?>') no-repeat center center fixed;   background-size:cover;}
</style>
</head>
<script type="text/javascript"> 
var $ = function(id) {return document.getElementById(id);};
var userAgent = navigator.userAgent.toLowerCase();
var isSafari = userAgent.indexOf("Safari")>=0;
var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
var is_ie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);


function getCookie(name)
{
	 var arr = document.cookie.split("; ");
	 for(i=0;i<arr.length;i++)
		 if (arr[i].split("=")[0] == name)
			return unescape(arr[i].split("=")[1]);
	 return null;
}
function setCookie(name,value,paras) {
   var today = new Date();
   var expires = new Date();
   expires.setTime(today.getTime() + 1000*60*60*24*2000);
   
   var path = null;
   if(typeof(paras) == "object")
   {
      if(typeof(paras.expires) != "undefined")
         expires = paras.expires;
      if(typeof(paras.path) != "undefined")
         path = paras.path;
   }
   
   document.cookie = name + "=" + escape(value) + "; expires=" + expires.toGMTString() + (path ? '; path=' + path : '');
}

function _resize(module_id)
{
	 var module_i=$("module_"+module_id);
	 var head_i=$("module_"+module_id+"_head");
	 var body_i=$("module_"+module_id+"_body");
	 var img_i=$("img_resize_"+module_id);
	 var my_cookie=getCookie("my_expand_3");
	 my_cookie = (my_cookie==null || my_cookie=="undefined") ? "" : my_cookie;//alert(my_cookie)
	 if(body_i.style.display=="none")
	 {
	    module_i.className=module_i.className.substr(0,module_i.className.lastIndexOf(" "));
	    head_i.className=head_i.className.substr(0,head_i.className.lastIndexOf(" "));
	    body_i.style.display="block";
	    if(img_i.className.match("collapse_arrow"))
	    	img_i.className=img_i.className.replace("collapse_arrow","expand_arrow");
	    img_i.title="折叠";
 
	    if(my_cookie.indexOf(module_id+",") == 0)
	       my_cookie = my_cookie.replace(module_id+",", "");
	    else if(my_cookie.indexOf(","+module_id+",") > 0)
	       my_cookie = my_cookie.replace(","+module_id+",", ",");
 
	    //my_expand=true;
       setCookie("my_expand_all_3", "");
	 }
	 else
	 {
	    module_i.className=module_i.className+" listColorCollapsed";
	    head_i.className=head_i.className+" moduleHeaderCollapsed";
	    body_i.style.display="none";
	    if(img_i.className.match("expand_arrow"))
	    	img_i.className=img_i.className.replace("expand_arrow","collapse_arrow");
	    img_i.title="展开";
 
	    if(my_cookie.indexOf(module_id+",") != 0 && my_cookie.indexOf(","+module_id+",") <= 0)
	       my_cookie += module_id+",";
	 }
	 setCookie("my_expand_3", my_cookie);
}
</script>
<body >
<div id="desktop_config">
 <a href="#" style="color:#FFFFFF; font-size:12px;" onclick="window.location.href='admin.php?ac=user&fileurl=member&do=home_txt';">桌面设置</a> <a href="#" onclick="window.location.href='admin.php?ac=user&fileurl=member&do=bg&mid=<?php echo $_GET['mid']?>';" style="margin-left:12px;color:#FFFFFF; font-size:12px;">背景设置</a>
</div>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>

  <td valign="top" class="module_wrappe">
  <!-- 内容排列 -->
<?php
if($bguser['home_txt']!=''){
	$_txt=substr($bguser['home_txt'], 0, -1);
}else{
	if(mysql_num_rows(mysql_query("SHOW TABLES LIKE 'PO_workclass'"))==1 && mysql_num_rows(mysql_query("SHOW TABLES LIKE 'PO_app_type'"))==1) {
		$_txt='home_workclass,home_news_34,home_app,home_news_1,home_workdate,home_plan,home_duty,home_blog';
	}else{
		$_txt='home_news_34,home_news_1,home_workdate,home_plan,home_duty,home_blog';
	}
	
}
$_txt=explode(',',$_txt);
$tsizeof=sizeof($_txt);
$txtnum=$tsizeof/2;
$txtleft=floor($txtnum);
$txtright=$tsizeof-floor($txtnum);
?>



	<?php
	for($i=0;$i<$txtleft;$i++){
		$_txt[$i]($i);
	}
	?>

<div class="shadow"></div>

	<?php
	for($i=$txtleft;$i<$tsizeof;$i++){
		$_txt[$i]($i);
	}
	?>



<div class="shadow"></div>

  </td>
  	<td width="255" valign="top">
		<div id='content-left'>

					<div id='content-left1'>
				<div class="listColor module_nav">
                
                 		<ul id='arraw' class="clearfix">
			<li id='arraw1' class="blue" onclick="_resize1();">短消息</li></ul>

					<div class='inner14'>

<div class="WB_widgets weiboShow" id="pl_weibo_show">

<?php
$query = $db->query("SELECT sendperson,date,content,id FROM ".DB_TABLEPRE."sms_receive  where smskey='1' and receiveperson='".$_USER->id."' order by date desc");
while ($row = $db->fetch_array($query)) {
?>
<div class="content clearfix">
<p class="content_txt">
<em><?php echo get_realname($row['sendperson'])?></em>：
<?php
//过滤下载
$content=str_replace("data/uploadfile/","down.php?urls=data/uploadfile/",$row['content']);
$content=str_replace('target="_blank"',"",$content);
$content=str_replace('<a',"&nbsp;&nbsp;<a",$content);
$content=str_replace('admin.php?',"admin.php?ac=receive&fileurl=sms&do=smskeymana&id=".$row['id']."&urls=".str_replace('&',"-",get_subcontent($content, 'admin.php?ac=', '>')),$content);
echo $content;
?></p>
<p class="content_action WB_linkB">
<span class="content_actionTime">
<?php echo trim($row['date'])?></span>
<!--<span class="content_actionMore">
标志己读
</span>
 --></p>
</div>
<?php }?>  
</div>
</div>
</div>
</div>

		</div>
	</td>
 </tr>
</table>
	<script type="text/javascript" src="template/default/new/js/jquery-1.8.3.min.js"></script>
        <link href="template/default/css/zz.css" rel="stylesheet"/>
 <script type="text/javascript" src="template/default/js/jquery.blockUI.min.js"></script>  
<script type="text/javascript" src="template/default/js/zz.js"></script>  
</body>
</html>
