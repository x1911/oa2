<?php
/*
	[PHPOA] (C) 2011-2014 天生创想 Inc.
	$Id: home.php 1209087 2014-01-08 08:58:28Z phpoa $
*/
define('IN_ADMIN',True);
require_once('include/common.php');
require_once('include/function_home.php');
require_once('include/function_charts.php');
get_login($_USER->id);
//重新获取背景
if($_GET['hometype']!=''){
	$db->query("update ".DB_TABLEPRE."user_view set hometype='".$_GET['hometype']."' WHERE uid = '".$_USER->id."' ");
	
}
$sql = "SELECT homemana,homebg,pic,sex,home_txt,hometype FROM ".DB_TABLEPRE."user_view  WHERE uid='".$_USER->id."'";
$bguser = $db->fetch_one_array($sql);
$homemana=$bguser['homemana'];
//处理桌面，以个人设定为先
if($bguser['hometype']!=''){
	$hometype=$bguser['hometype'];
}else{
	$hometype=$_CONFIG->config_data('home');
}
if($hometype==1){
	global $db;
	if($_GET['mid']!=''){
		$query = $db->query("SELECT menuid FROM ".DB_TABLEPRE."menu  where fatherid='".$_GET['mid']."' ");
		//and menutype='2' 纠结的一个条件
		while ($row = $db->fetch_array($query)) {
			$html.="'".$row['menuid']."',";
		}
	}
	if($_GET['mid']!=''){
		$nums=24;
		$where="where fatherid in(".$html."'".$_GET['mid']."')";
	}elseif($homemana!=''){
		$nums=24;
		$where="where menuid in(".substr($homemana, 0, -1).") and menutype=2";
	}else{
		$nums=24;
		$where="where fatherid!='0' and menutype=2";
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."menu $where");
	
	include_once template.'home.php';
}else{

	if($bguser['homebg']!=''){
		$bg=''.$bguser['homebg'];
	}else{
		$bg='template/default/home/images/wallpaper.jpg';
	}
	if($_GET['mid']==3){
		$bguser['home_txt']='home_workdate,home_duty,home_blog,home_conference,home_plan,home_document_1,home_news_34,home_news_1,home_news_6,home_news_5,';
		include_once template.'home_text.php';
		//header('Location: admin.php?ac=workdate&fileurl=workbench');
	}elseif($_GET['mid']==4){
		include_once template.'home_text_work.php';
		//header('Location: admin.php?ac=list&fileurl=workclass');
	}elseif($_GET['mid']==7){
		$bguser['home_txt']='home_company,home_care,home_service,home_complaints,home_offer,home_program,home_contract,home_order,home_price,home_payment,home_supplier,home_purchase,home_business,';
		include_once template.'home_text.php';
	}elseif($_GET['mid']==10){
		if(mysql_num_rows(mysql_query("SHOW TABLES LIKE 'PO_book'"))==1 && mysql_num_rows(mysql_query("SHOW TABLES LIKE 'PO_office_goods'"))==1) {
			$bguser['home_txt']='home_book,home_goods,home_conference,home_news_34,home_news_1,home_news_5,';
		}else{
			$bguser['home_txt']='home_conference,home_news_34,home_news_1,home_news_5,';
		}
		include_once template.'home_text.php';
	}elseif($_GET['mid']==11){
		header('Location: admin.php?ac=registration&fileurl=human');
	}elseif($_GET['mid']==5){
		header('Location: admin.php?ac=attachment&fileurl=app');
	}elseif($_GET['mid']==6){
		header('Location: admin.php?ac=index&fileurl=file');
	}elseif($_GET['mid']==8){
		header('Location: admin.php?ac=list&fileurl=project');
	}elseif($_GET['mid']==9){
		$bguser['home_txt']='home_document_2,home_document_3,home_document_4,home_document_5,home_document_6,home_knowledge,';
		include_once template.'home_text.php';
	}elseif($_GET['mid']==56){
		$bguser['home_txt']='home_app1,home_bbs,';
		include_once template.'home_text.php';
	}elseif($_GET['mid']==58){
		//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');
		header('Location: admin.php?ac=config&fileurl=mana');
	}else{
		include_once template.'home_text.php';
	}
}



function get_home_nums($type){
	global $db,$_USER;
	//短消息
	if($type=='admin.php?ac=receive&fileurl=sms'){
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."sms_receive where receiveperson='".$_USER->id."' and smskey='1'";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	//考勤
	}elseif($type=='admin.php?ac=registration&fileurl=workbench'){
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."registration where uid='".$_USER->id."' AND month='".get_date('m',PHP_TIME)."'";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	//新闻
	}elseif($type=='admin.php?ac=news&fileurl=workbench&type=1'){
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."news where type='1' AND (receive like'%".get_realname($_USER->id)."%' or receive='0')";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	//公告
	}elseif($type=='admin.php?ac=news&fileurl=workbench&type=3'){
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."news where type='3' AND (receive like'%".get_realname($_USER->id)."%' or receive='0')";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	//大事记
	}elseif($type=='admin.php?ac=news&fileurl=workbench&type=5'){
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."news where type='5' AND (receive like'%".get_realname($_USER->id)."%' or receive='0')";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	//通知
	}elseif($type=='admin.php?ac=news&fileurl=workbench&type=4'){
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."news where type='4' AND (receive like'%".get_realname($_USER->id)."%' or receive='0')";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=duty&fileurl=duty'){
	//任务管理
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."duty where user='".get_realname($_USER->id)."' and dkey='1'";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=workdate&fileurl=workbench'){
	//日程安排
		$venddate=get_date('Y-m-d H:i:s',PHP_TIME);
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."workdate where uid='".$_USER->id."'  AND (startdate>='".$vstartdate."' and enddate<='".$venddate."')";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=plan&fileurl=workbench'){
	//工作计划
		$venddate=get_date('Y-m-d H:i:s',PHP_TIME);
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."plan where (participation like'%".get_realname($_USER->id)."%' or person like'%".get_realname($_USER->id)."%')  AND (startdate>='".$vstartdate."' and enddate<='".$venddate."')";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=blog&fileurl=workbench'){
		//工作日记
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."blog where uid=".$_USER->id." AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(date)";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=conference&fileurl=administrative'){
		//会议管理
		$venddate=get_date('Y-m-d H:i:s',PHP_TIME);
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."conference where (attendance like'%".get_realname($_USER->id)."%' or staffid =".$_USER->id.") AND (startdate>='".$vstartdate."' and enddate<='".$venddate."')";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=list&fileurl=workclass'){
		//工作流
		$venddate=get_date('Y-m-d H:i:s',PHP_TIME);
		$sql = "SELECT COUNT(*) as nums FROM ".DB_TABLEPRE."workclass where uid='".$_USER->id."'";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=list&fileurl=workclass&type=2'){
		//工作流[经我审批]
		$venddate=get_date('Y-m-d H:i:s',PHP_TIME);
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."workclass a,".DB_TABLEPRE."workclass_personnel b WHERE a.id=b.workid and b.pertype!=0 and b.name like '%".get_realname($_USER->id)."%' order by b.perid desc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=list&fileurl=workclass&type=1'){
		//工作流[待我审批]
		$venddate=get_date('Y-m-d H:i:s',PHP_TIME);
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."workclass a,".DB_TABLEPRE."workclass_personnel b WHERE  a.id=b.workid and (b.pertype=0 or b.pertype=4) and b.name like '%".get_realname($_USER->id)."%' and a.type!=1 order by b.perid asc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=attachment&fileurl=app&type=1'){
		//公文[收文审批]
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."attachment a,".DB_TABLEPRE."personnel b where a.id=b.fileid and (b.pkey=0 or b.pkey=4) and b.name like '%".get_realname($_USER->id)."%' and a.attakey!=1 and b.type=1 order by b.id asc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=attachment&fileurl=app&type=3'){
		//公文[收文阅读]
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."attachment a,".DB_TABLEPRE."distribution b where a.id=b.fileid and b.uid='".$_USER->id."' and b.dkey=1 order by b.viewdate asc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=attachment&fileurl=app'){
		//公文[收文列表]
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."attachment WHERE uid='".$_USER->id."'  order by id desc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=approval&fileurl=app'){
		//公文[发文列表]
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."approval WHERE userid='".$_USER->id."' order by id desc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=approval&fileurl=app&type=1'){
		//公文[发文办理]
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."approval a,".DB_TABLEPRE."personnel b where a.id=b.fileid and (b.pkey=0 or b.pkey=4) and b.name like '%".get_realname($_USER->id)."%' and a.akey!=1 and b.type=2 order by b.id asc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=approval&fileurl=app&type=3'){
		//公文[发文阅读]
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."approval a,".DB_TABLEPRE."distribution b where a.id=b.fileid and b.uid='".$_USER->id."' and b.dkey=2 order by b.viewdate asc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=list&fileurl=project'){
		//项目[项目列表]
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."project WHERE  uid='".$_USER->id."'  order by id desc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}elseif($type=='admin.php?ac=list&fileurl=project&type=1'){
		//项目[项目审批]
		$sql = "SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."project a,".DB_TABLEPRE."project_personnel b WHERE a.id=b.projectid and (b.pertype=0 or b.pertype=4) and b.name like '%".get_realname($_USER->id)."%' and a.type!=1 and b.appkey2=1 order by b.perid asc";
		$nums = $db->result($sql);
		if($nums>0){
			return $nums;
		}else{
			return '0';
		}
	
	}else{//无数据
		return '0';
	}
}
?>