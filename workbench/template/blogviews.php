<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> <?php //echo $blog["title"]?>&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">&nbsp;&nbsp;<?php echo $_title['name']?>&nbsp;&nbsp;<span style="font-size:20px; font-weight:bold; color:#b0d163;"><?php echo $blog['number']?></span>&nbsp;次</span>&nbsp;&nbsp;&nbsp;&nbsp;
	
	<!-- <a href="admin.php?ac=<?//php echo $ac?>&fileurl=<?//php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"> -->
    </td>
  </tr>
</table>

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="bbsid" value="<?php echo $blog['id']?>" />
	<input type="hidden" name="author" value="<?php echo get_realname($_USER->id)?>" />
    
   <div class="text_body">
    <h1>    <?php echo $blog['title']?>	<!--主题-->  </h1>
    
    <b><?php echo get_realname($blog['uid'])?> 于&nbsp;<?php echo $blog['date']?>&nbsp;&nbsp;发布	</b><br><br><br><br>
    <?php echo $blog['content']?><br><br><br><br><br><br><br><br>
    </div>
    
	
	
	
<?php
$n=0;
global $db;

$query = $db->query("SELECT * FROM ".DB_TABLEPRE."bbs_log where bbsid='".$blog["id"]."' and type='9'   ORDER BY id Asc");
	while ($row = $db->fetch_array($query)) {
$n++;
?>

	

<div class="z_comment">	
<p class="_left">
    	  <?php 
	  echo $row["author"];
	  echo '<br>';
	  get_realpic($row['uid']);
	  ?>
      <br />
      <b class="time">发表于&nbsp; <?php echo $row['enddate']?> </b>
      </p>
      
      
      <div class="send"><s class="arrowborder"><s class="arrow"></s></s>
      <img src="template/default/content/images/notify_new.gif" align="middle"><span class="big3"><?php echo $row['title']?></span>
      	<span style="font-size:12px;float:right;">&nbsp;<span style="font-weight:bold; color:#ff9900;"><?php echo $n?></span>&nbsp;楼&nbsp;&nbsp;
	<?php if($_USER->id==$row['uid']  || is_superadmin() ){?>

	<a href="admin.php?ac=<?php echo $ac?>&fileurl=knowledge&do=views&view=del&id=<?php echo $row['id']?>&bbsid=<?php echo $blog['id']?>" style="font-size:12px;">删除</a> 
	<? }?>
    </span>
      <br /><br />
      
      <?php echo $row['content']?>
      </div>
      
    </div>

	
<?php
	}
?>





<div class="z_comment_writting">
<h4>发布评论</h4>

主题：<? get_helps()?> :&nbsp;&nbsp;<input type="text" name="title" class="BigInput" style="width:300px;color:#777;" size="20" value="回复:<?php echo $blog["title"]?>" /><br /><br />


<script>
        KE.show({
                id : 'content'
        });
</script>
		<textarea name="content" cols="70" rows="12" class="input" style="width:580px;height:200px;"></textarea>
  <br /> 
        <input type="Submit" value="发起评论" class="BigButtonBHover _center">
</div>



  
</form>

 
</body>
</html>
