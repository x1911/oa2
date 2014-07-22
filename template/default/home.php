
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPOA桌面3.0</title>
<script type="text/javascript" src="template/default/home/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="template/default/home/js/myDesktopBase.min.js"></script>
<!--<script type="text/javascript" src="js/myDesktopInit.min.js"></script> -->
<script type="text/javascript">
<!--
$(window).load(function() {
    var a, b, c;
    myDesktop.stopProgress(),
    a = {
	<?php
	$html='';
	$page=0;
	$ns=0;
	for($i=0;$i<($num/$nums);$i++){
	$html.='desktop'.$i.': ['.chr(13).chr(10);
	$htmlview='';
	$page=$page+$nums;
	$sql = "SELECT * FROM ".DB_TABLEPRE."menu $where ORDER BY menunum asc LIMIT $ns, $nums";
	$query = $db->query($sql);
	while ($row = $db->fetch_array($query)) {
		if ( file_exists('template/default/ico/'.$row['menuid'].'.png') ) {
			$row['icoid']=$row['menuid'];
		}else{
			$row['icoid']='0';
		}
		
		$htmlview.='{'.chr(13).chr(10);
        $htmlview.='iconSrc: "template/default/ico/'.$row['icoid'].'.png",';
        $htmlview.='windowsId: "menu'.$row['menuid'].'",';
        $htmlview.='windowTitle: "'.$row['menuname'].'",';
        $htmlview.='iframSrc: "'.$row['menuurl'].'",';
        $htmlview.='windowWidth: "100%",';
        $htmlview.='windowHeight: "100%",';
        $htmlview.='txNum: '.get_home_nums($row['menuurl']).'';
        $htmlview.='},'.chr(13).chr(10);
	}
	$ns=$ns+$nums;
	$html.=substr($htmlview, 0, -3);
	$html.='],'.chr(13).chr(10);
    }
	echo substr($html, 0, -3);
	?>	
    },
    b = [],
    myDesktop.disableSelect(),
	<?php
	if($bguser['homebg']!=''){
		$bg=''.$bguser['homebg'];
	}else{
		$bg='template/default/home/images/wallpaper.jpg';
	}
	?>
    myDesktop.wallpaper.init("<?php echo $bg?>", 1),
    myDesktop.desktop.init(a, {
        arrangeType: 1,
        iconMarginLeft: 45,
        iconMarginTop: 25,
        defaultDesktop: 0
    }),
    myDesktop.taskBar.init(),
    myDesktop.sildeBar.init(b, "left")
});
-->
</script>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style></head>
<body>

 <div class="pro_by" id="pro_by"><a href="#" style="color:#FFFFFF;" onclick="window.location.href='admin.php?ac=user&fileurl=member&do=home';">桌面设置</a> <a href="#" onclick="window.location.href='admin.php?ac=user&fileurl=member&do=bg&mid=<?php echo $_GET['mid']?>';" style="margin-left:12px;color:#FFFFFF;">背景设置</a></div>  

<div id="wallpaper"></div>
<div id="desktopWrapper">
 
  <div id="topBar"></div>

  <div id="desktopsContainer">
    <div id="desktopContainer"></div>
  </div>
 <?php if($num>24){?> 
 <div id="navBar"><s class="l"><div class="indicator indicator_header" title="修改头像"><img src="<?php
 if($bguser['pic']!=''){
 	$bgs=$bguser['pic'];
 }else{
 	$bgs='template/default/images/sex01.gif';
 }
 echo $bgs;
 ?>" alt="修改头像" class="indicator_header_img" onclick="window.location.href='admin.php?ac=user&fileurl=member';"></div></s><span></span><s class="r"><a class="indicator indicator_manage" href="javascript:void(0);" hidefocus="true" cmd="manage" title="全局视图"></a></s></div> 
<?php }else{?>
<div id="navBar"></div> 
<?php }?>
  
</div>
 
 
<div id="appManagerPanel" class="appManagerPanel">
<a class="aMg_close" href="javascript:void(0);"></a>
<div class="aMg_folder_container">
<div class="aMg_folder_innercontainer"></div>
</div>

</div>  
  
</body>
</html>

