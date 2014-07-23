<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>
<script type="text/javascript"> 

</script>
</head>
<body class="bodycolor">

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small" style='margin-top:30px;'>
  <tr>
    <td  align="right" class="Big">
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle">
    </td>
  </tr>
</table>


<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="bbsid" value="<?php echo $plan['id']?>" />
	<input type="hidden" name="author" value="<?php echo get_realname($_USER->id)?>" />
    
    <div class="text_body">
    <h1>
     <?php echo $plan["title"]?>&nbsp;&nbsp;<?php echo $_title['name']?>
    </h1>
    
    部门：&nbsp;&nbsp;<font color="21a5e6"><?php echo $plan['department']?></font> <br /><b>时间：&nbsp;&nbsp;<?php echo $plan['startdate']?>&nbsp;&nbsp;至&nbsp;&nbsp;<?php echo $plan['enddate']?>。</b>
    
    <p>
    <?php echo $plan['content']?>
    </p>
    
 
    
<table class="TableBlock" border="0" align="center" style="width:500px;border-bottom:#ddd solid 1px;">

		<tr>
			<td nowrap class="TableContent" width="90">负责人：</td>
			  <td class="TableData">
					<?php echo $plan['person']?>				</td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="90">参与人员：</td>
			  <td class="TableData">
					<?php echo $plan['participation']?>				</td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="90">备注：</td>
			  <td class="TableData">
					<?php echo $plan['note']?>				</td>  	  	
		</tr>
		<br><br>
		
	</table>	
	

    <br><b>完成审核日期：<?php echo $plan['completiondate']?>	</b>
<br><br><br><br>
    </div>
	
<?php
$n=0;
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."bbs_log where bbsid='".$plan["id"]."' and type='10'   ORDER BY id Asc");
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

	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&view=del&id=<?php echo $row['id']?>&bbsid=<?php echo $plan['id']?>" style="font-size:12px;">删除</a> 
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

主题：<? get_helps()?> :&nbsp;&nbsp;<input type="text" name="title" class="BigInput" style="width:300px;color:#777;" size="20" value="回复:<?php echo $plan["title"]?>" /><br /><br />


<script>
        KE.show({
                id : 'content'
        });
</script>
		<textarea name="content" cols="70" rows="12" class="input" style="width:580px;height:200px;"></textarea>
  <br /> 
        <input type="Submit" value="发   表" class="BigButtonBHover _center">
</div>


  
</form>

 
</body>
</html>
