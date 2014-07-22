<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="template/default/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="template/default/content/js/common.js"></script>
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script type="text/javascript"> 
function sendForm()
{
   document.save.submit();
}
</script>
<title>办公系统</title>
</head>
<body class="bodycolor">
<div id="navPanel">
<form method="get" action="admin.php" name="save" class="ui-grid-21 ui-grid-right ui-form" style=" margin-top:3px;">
<?php echo get_keyuser($ui,$un);?>
<div id="search" style="float: right;">

		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
	任务状态： <select name="dkey" id="dkey">
	<option value=""></option>
	<option value="1" <?php if($dkey==1){?>selected="selected"<?php }?>>进行中</option>
	<option value="2" <?php if($dkey==2){?>selected="selected"<?php }?>>未完成</option>
	<option value="3" <?php if($dkey==3){?>selected="selected"<?php }?>>己完成</option>
		</select>&nbsp;&nbsp;	
		编号：<input type="text" name="number" size="15"
	value="<?php echo urldecode($number)?>" class="SmallInput" onClick="searchtpl();" />&nbsp;&nbsp;名称：<input type="text" name="title" size="15"
	value="<?php echo urldecode($title)?>" class="SmallInput" />&nbsp;&nbsp;任务周期：<input type="text" value="<?php echo $vstartdate?>"  style="width:80px;" readonly="readonly"  onClick="WdatePicker();" name='vstartdate' > - <input type="text" value="<?php echo $venddate?>"  style="width:80px;" readonly="readonly"  onClick="WdatePicker();" name='venddate' >&nbsp;&nbsp;<input
	type="submit" value="查 询" class="SmallButton" />



</div>
 </form>
</div>

<table width="98%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big" style="font-size:12px;"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 任务信息列表</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px; float:right; margin-right:50px;"><input type="button" value="新建任务" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=<?php echo $ac;?>&fileurl=<?php echo $fileurl;?>&do=add'">
	</span>
    </td>
  </tr>
</table>

<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=<?php echo $_GET['type']?>">
<input type="hidden" name="do" value="update"/>
<table class="TableBlock" border="0" width="98%" align="center">
	<tr>
      <td nowrap class="TableHeader">选项</td>
      <td width="90" class="TableHeader">任务编号</td>
      <td class="TableHeader">任务名称</td>
	  <td width="150" align="center" class="TableHeader">任务周期</td>
	  <td width="150" align="center" class="TableHeader">任务进度</td>
      <td width="90" align="center" class="TableHeader">发起人</td>
      <td width="90" align="center" class="TableHeader">发起时间</td>
      <td width="60" class="TableHeader" align="center">状态</td>
      <td width="150" align="center" class="TableHeader">操作</td>
    </tr>
<?php
foreach ($result as $row) {
		$upnums = $db->result("SELECT COUNT(*) AS upnums FROM ".DB_TABLEPRE."duty_user  WHERE dutyid='".$row['id']."'");
	  $logupdate = $db->fetch_one_array("SELECT sum(progress) as progress FROM ".DB_TABLEPRE."duty_log WHERE dutyid='".$row['id']."'");
	if($logupdate["progress"]/$upnums>='100'){
		$db->query("UPDATE ".DB_TABLEPRE."duty SET dkey=3 WHERE id = '".$row['id']."'");
	}
	if($row['enddate']<get_date('Y-m-d',PHP_TIME) && $logupdate["progress"]/$upnums<'100'){
    	$db->query("UPDATE ".DB_TABLEPRE."duty SET dkey=2 WHERE id = '".$row['id']."'");
	}
?>
	<tr>
      <td nowrap class="TableContent">
<?php
get_boxlistkey("id[]",$row['id'],$row['uid'],$_USER->id);
?>  
</td>
<td class="TableData"><?php echo $row['number']?></td>
 <td class="TableData"><a href="admin.php?ac=<?php echo $ac?>&do=view&fileurl=<?php echo $fileurl?>&id=<?php echo $row['id']?>"><?php echo $row['title']?></a></td>
	  <td align="center" class="TableData"><?php echo $row['startdate']?>至<?php echo $row['enddate']?></td>
	  <td align="left" class="TableData">
	  <?php
	  $nums = $db->result("SELECT COUNT(*) AS nums FROM ".DB_TABLEPRE."duty_user  WHERE dutyid='".$row['id']."'");
	  $key1 = $db->fetch_one_array("SELECT sum(progress) as progress FROM ".DB_TABLEPRE."duty_log WHERE dutyid='".$row['id']."'");
	 // echo $key1["progress"];
	 if($key1["progress"]/$nums<='100'){
		 echo '<div style="width:100%; background-color:#CCCCCC;">';
			 echo '<div style="width:';
			 if($key1["progress"]!=''){
				 echo $key1["progress"]/$nums;
			 }else{
				 echo '1';
			 }
			 echo '%; background-color:#006600;">
			  &nbsp;
			  </div>
		  </div>';
	 }else{
		 echo "任务己完成，但超出来进度！";
	 }
	 $progress=$key1["progress"]/$nums;
	 $progress=explode('.',$progress);
	 if($progress[1]!=''){
		 echo $progress[0].'.'.substr($progress[1], 0, 2)."%";
	 }else{
		 echo $progress[0]."%";
	 }
	  ?>	  </td>
      <td align="center" class="TableData"><?php echo get_realname($row['uid'])?></td>
      <td align="center" class="TableData"><?php echo str_replace(' ','<br>',$row['date']);?></td>
      <td align="center" class="TableData">
	  <?php if($row['dkey']=='1'){echo "进行中";}elseif($row['dkey']=='2'){echo "<font color=red>未完成</font>";}else{echo "<font color=#006600>己完成</font>";}?>	  </td>
      <td align="center" class="TableData">
	  <?php if($row['uid']==$_USER->id){?>
	   <a href="admin.php?ac=<?php echo $ac;?>&do=add&fileurl=<?php echo $fileurl;?>&id=<?php echo $row['id'];?>">编辑</a> | <a href="admin.php?ac=user&fileurl=<?php echo $fileurl;?>&did=<?php echo $row['id'];?>">执行人管理</a> | 
	   <?php }?><a href="admin.php?ac=<?php echo $ac;?>&do=view&fileurl=<?php echo $fileurl;?>&id=<?php echo $row['id'];?>">查看</a>
	   <?php
	   $uid = $db->fetch_one_array("SELECT id FROM ".DB_TABLEPRE."duty_user  WHERE dutyid = '".$row['id']."' and user = '".$_USER->id."' ");
	   if($uid['id']!=''){
	   ?>
	   <br>
	   <a href="admin.php?ac=log&fileurl=duty&did=<?php echo $row['id'];?>" style="color:red;">进度录入</a>
	   <?php }?>
	  </td>
    </tr>
	
<?php } ?>	

	
    <tr align="center" class="TableControl">
      <td height="35" colspan="9" align="left" nowrap>
        <input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /><b>全选</b>&nbsp;&nbsp;&nbsp;&nbsp;<img src="template/default/content/images/ico-1.png" align="absmiddle">
						  <a href="javascript:document:update.submit();">清理数据</a> &nbsp;&nbsp;
						  <?php
						echo get_exceldown('excel_1');?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo showpage($num,$pagesize,$page,$url)?>
</td>
    </tr>
  </table>
</form>

	<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="title" value="<?php echo $title?>" />
		<input type="hidden" name="number" value="<?php echo $number?>" />
		<input type="hidden" name="typeid" value="<?php echo $typeid?>" />
		<input type="hidden" name="tplid" value="<?php echo $tplid?>" />
		<input type="hidden" name="vstartdate" value="<?php echo $vstartdate?>" />
		<input type="hidden" name="venddate" value="<?php echo $venddate?>" />
		<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
		<input type="hidden" name="do" value="excel" />
	</form>
 
</body>
</html>
