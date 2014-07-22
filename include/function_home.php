<?php
!defined('IN_TOA') && exit('Access Denied!');

//获取工作流数据
function home_workclass($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0169c2 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">工作流审批</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT a.* FROM ".DB_TABLEPRE."workclass a,".DB_TABLEPRE."workclass_personnel b WHERE  a.id=b.workid and (b.pertype=0 or b.pertype=4) and b.name like '%".get_realname($_USER->id)."%' and a.type!=1 order by b.perid asc");
	while ($row = $db->fetch_array($query)) {	
		echo '<ul>';
		echo '<li>【';
		echo public_value('typename','workclass_type','tid='.$row['typeid']);
		echo '】【';
		echo public_value('title','workclass_template','tplid='.$row['tplid']);
		echo '】 <a href="admin.php?ac=list&do=view&fileurl=workclass&workid='.$row['id'].'" target="_blank">'.$row['title'].'</a>  <a href="admin.php?ac=list&do=personnel&fileurl=workclass&workid='.$row['id'].'"><font color=red>审批>></font></a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//公告
function home_news_34($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_032034 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" ';
	echo ' id="img_resize_'.$num.'" title="折叠"></a>';
	echo '<span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">公告通知</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."news WHERE (receive like'%".get_realname($_USER->id)."%' or receive='0' or uid='".$_USER->id."') and (type ='3' or type ='4') ORDER BY id desc LIMIT 0,8");
	while ($row = $db->fetch_array($query)) {	
		echo '<ul>';
		echo '<li>【';
			if($row['type']==3){
				echo '公告';
			}else{
				echo '通知';
			}
			
		echo '】<a onclick="iframeloading(';
		echo "'<iframe src=";
		echo 'admin.php?ac=news&fileurl=workbench&do=views&id=';
		echo $row['id'].'&type='.$row['type'].'></iframe>';
		echo "'";
		echo ');">'.$row['subject'].'</a></li>';
		echo '</ul>';
			
		//echo '】<a href="admin.php?ac=news&fileurl=workbench&do=views&id='.$row['id'].'&type=';
		//echo $row['type'].'" target="_blank">'.$row['subject'].'</a></li>';
		//echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//新闻
function home_news_1($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_f3660a color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a>';
	echo '<span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">新闻</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."news WHERE type =1 AND (receive like'%".get_realname($_USER->id)."%' or receive='0') ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=news&fileurl=workbench&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['subject'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//电子期刊
function home_news_6($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_ed0282 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a>';
	echo '<span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">电子期刊</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."news WHERE type =6 AND (receive like'%".get_realname($_USER->id)."%' or receive='0') ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=news&fileurl=workbench&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['subject'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//大事记
function home_news_5($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_57c4ff color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a>';
	echo '<span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">大事记</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."news WHERE type =5 AND (receive like'%".get_realname($_USER->id)."%' or receive='0') ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=news&fileurl=workbench&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['subject'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//公文审批
function home_app($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_fd2d11 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a>';
	echo '<span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">公文审批</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT type,fileid FROM ".DB_TABLEPRE."personnel where (pkey=0 or pkey=4) and name like '%".get_realname($_USER->id)."%' order by id asc");
	while ($row = $db->fetch_array($query)) {
		if($row['type']==1){
			$table = "attachment";
		}else{
			$table = "approval";
		}
		$sql = "SELECT category,title,id FROM ".DB_TABLEPRE.$table."  WHERE id = '".$row['fileid']."'";
		$rs = $db->fetch_one_array($sql);
		echo '<ul>';
		echo '<li>【';
		if($row['type']==1){
			echo '收文';
		}else{
			echo '发文';
		}
		echo '】 <a href="admin.php?ac='.$table.'&do=view&fileurl=app&fileid='.$rs['id'].'&apptype=';
		echo $rs['category'].'" target="_blank">'.$rs['title'].'</a>';
		echo '  <a href="admin.php?ac='.$table.'&fileurl=app&type=1">';
		echo '<font color="#FF0000">进入办理</font></a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//日程安排
function home_workdate($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module_right listColor ">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_01c03f color_style_0 moduleHeader ">';
	echo '<a href="javascript:_resize('.$num.');" id="img_resize_'.$num.'" class="expand expand_arrow" title="折叠"></a>';
	echo '<span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">日程安排</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."workdate WHERE uid =".$_USER->id." ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
			echo '<ul>';
			echo '<li>【';
			if($row['otype']==1){
				echo '全天';
			}else{
				echo $row['startdate'];
			}
			echo '】<a href="admin.php?ac=workdate&fileurl=workbench&do=views&id=';
			echo $row['id'].'" target="_blank">'.cut_str(strip_tags($row['content']),54).'</a></li>';
			echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//工作计划
function home_plan($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module_right listColor ">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0096db color_style_0 moduleHeader ">';
	echo '<a href="javascript:_resize('.$num.');" id="img_resize_'.$num.'" class="expand expand_arrow" title="折叠"></a>';
	echo '<span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">工作计划</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body" style="">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."plan WHERE uid = $_USER->id or participation LIKE '%".get_realname($_USER->id)."%' or person LIKE '%".get_realname($_USER->id)."%' ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {	
		echo '<ul>';
		echo '<li>【';
		if($row['completiondate']!=''){
			echo "<span style='color:#ccc;'>已结束</span>";
		}else{
			echo "未结束";
		}
		
		echo '】<a onclick="iframeloading(';
		echo "'<iframe src=";
		echo 'admin.php?ac=plan&fileurl=workbench&do=views&id=';
		echo $row['id'].'></iframe>';
		echo "'";
		echo ');">'.$row['title'].'</a><br><span>  结束时间:'.$row['enddate'].'</span></li>';
		echo '</ul>';
		
		//echo '】<a href="admin.php?ac=plan&fileurl=workbench&do=views&id=';
		//echo $row['id'].'" >'.$row['title'].'</a><br><span>  结束时间:'.$row['enddate'].'</span></li>';
		//a link 去掉 target="_blank"  修改点1换ajax
		//echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//我的任务
function home_duty($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module_right listColor ">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_9425b2 color_style_0 moduleHeader ">';
	echo '<a href="javascript:_resize('.$num.');" id="img_resize_'.$num.'" class="expand expand_arrow" title="折叠"></a>';
	echo '<span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">我的任务</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."duty WHERE uid='".$_USER->id."' or user like '%".get_realname($_USER->id)."%' ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li>【';
		if($row['dkey']=='1'){
			echo "进行中";
		}elseif($row['dkey']=='2'){
			echo "<font color=red>未完成</font>";
		}else{
			echo "<font color=#ccc>己完成</font>";
		}

		echo '】<a onclick="iframeloading(';
		echo "'<iframe src=";
		echo 'admin.php?ac=duty&do=view&fileurl=duty&id=';
		echo $row['id'].'></iframe>';
		echo "'";
		echo ');">'.$row['title'].'</a></li>';
		echo '</ul>';
		
		//echo '】<a href="admin.php?ac=duty&do=view&fileurl=duty&id=';  修改未完成
		//echo $row['id'].'">'.$row['title'].'</a></li>';
		//echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//工作日记
function home_blog($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_7aba01 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">工作日记</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."blog WHERE uid='".$_USER->id."' or type=2 ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li>【'.$row['date'].'】';
		echo '<a href="admin.php?ac=blog&fileurl=workbench&do=views&id='.$row['id'].'"';
		echo ' target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//个人文件柜
function home_document_1($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_fd2d11 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">个人文件柜</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document WHERE uid='".$_USER->id."' and type=1 ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=document&fileurl=knowledge&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//公共文件柜
function home_document_2($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0d9b8d color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">公共文件柜</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document WHERE (readuser LIKE'%".get_realname($_USER->id)."%' or uid='".$_USER->id."' or readuser='全体人员') and type=2 ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=document&fileurl=knowledge&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//网络硬盘
function home_document_3($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_4914a0 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">网络硬盘</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document WHERE (readuser LIKE'%".get_realname($_USER->id)."%' or uid='".$_USER->id."' or readuser='全体人员') and type=3 ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=document&fileurl=knowledge&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//下载管理
function home_document_4($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0169c2 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">下载管理</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document WHERE (readuser LIKE'%".get_realname($_USER->id)."%' or uid='".$_USER->id."' or readuser='全体人员') and type=4 ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=document&fileurl=knowledge&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//规章制度
function home_document_5($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_032034 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">规章制度</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document WHERE (readuser LIKE'%".get_realname($_USER->id)."%' or uid='".$_USER->id."' or readuser='全体人员') and type=5 ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=document&fileurl=knowledge&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//报表管理
function home_document_6($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_f3660a color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">报表管理</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document WHERE (readuser LIKE'%".get_realname($_USER->id)."%' or uid='".$_USER->id."' or readuser='全体人员') and type=6 ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=document&fileurl=knowledge&do=views&id='.$row['id'].'&type=';
		echo $row['type'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//知识阅读
function home_knowledge($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_ed0282 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">知识阅读</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."knowledge WHERE type ='2' or uid = ".$_USER->id." ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=know&fileurl=knowledge&do=views&id='.$row['id'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//投票
function home_app1($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_57c4ff color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">投票</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."app WHERE uid = ".$_USER->id." and (user like '%".get_realname($_USER->id)."%' or user='') ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=app&fileurl=knowledge&do=views&id='.$row['id'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//论坛
function home_bbs($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_01c03f color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">论坛</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."bbs  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=bbs&fileurl=knowledge&do=views&id='.$row['id'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//档案管理
function home_file($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0096db color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">档案借阅</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	//【'.$row['date'].'】
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."file_read where appperson=".$_USER->id."  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li>【'.$row['filenumber'].'】<a href="admin.php?ac=views&do=edit&fileurl=file&id='.$row['fileid'].'" target="_blank">'.$row['filename'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//项目审批
function home_project($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_9425b2 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">项目审批</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT a.* FROM ".DB_TABLEPRE."project a,".DB_TABLEPRE."project_personnel b WHERE  a.id=b.projectid and (b.pertype=0 or b.pertype=4) and b.name like '%".get_realname($_USER->id)."%' and a.type!=1 and b.appkey2=1 order by b.perid asc");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li>【'.get_realname($row['uid']).'】<a href="admin.php?ac=list&fileurl=project&do=view&projectid='.$row['id'].'" target="_blank">'.$row['title'].'</a>  <a href="admin.php?ac=list&do=personnel&fileurl=project&projectid'.$row['id'].'"><font color=red>审批>></font></a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//培训管理
function home_training($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_7aba01 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">培训管理</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."training where responsible LIKE '%".get_realname($_USER->id)."%' or user LIKE '%".get_realname($_USER->id)."%' or uid=".$_USER->id."  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li>【'.$row['number'].'】<a href="admin.php?ac=training&fileurl=human&do=views&id='.$row['id'].'" target="_blank">'.$row['name'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//图书管理
function home_book($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_fd2d11 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">图书借阅</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."book_read where appperson=".$_USER->id."  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li>【'.$row['booknumber'].'】<a href="admin.php?ac=views&do=edit&fileurl=book&id='.$row['bookid'].'" target="_blank">'.$row['bookname'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//办公用品
function home_goods($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0d9b8d color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">办公用品</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."office_goods_record where uid =".$_USER->id."  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=goods_record&fileurl=goods" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//会议管理
function home_conference($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_4914a0 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">会议管理</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."conference where uid =".$_USER->id." or attendance LIKE '%".get_realname($_USER->id)."%'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=conference&fileurl=administrative&do=views&id='.$row['id'].'">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//客户信息
function home_company($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0d9b8d color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">客户信息</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_company where uid='".$_USER->id."' or user='".get_realname($_USER->id)."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=company&fileurl=crm&do=view&id='.$row['id'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//客户关怀
function home_care($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_fd2d11 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">客户关怀</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_care where (uid='".$_USER->id."' or user='".get_realname($_USER->id)."') and type=1  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=care&fileurl=crm&do=view&id='.$row['id'].'&type=1&cid='.$row['cid'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//客户回访
function home_service($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_7aba01 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">客户回访</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_service where (uid='".$_USER->id."' or user='".get_realname($_USER->id)."')  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=service&fileurl=crm&do=view&id='.$row['id'].'&type=1&cid='.$row['cid'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//客户投诉
function home_complaints($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_57c4ff color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">客户投诉</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_complaints where (uid='".$_USER->id."' or user='".get_realname($_USER->id)."') and type=1  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=complaints&fileurl=crm&do=view&id='.$row['id'].'&type=1&cid='.$row['cid'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//报价单
function home_offer($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_9425b2 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">报价单</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_offer where uid='".$_USER->id."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=offer&fileurl=crm&do=view&id='.$row['id'].'&cid='.$row['cid'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//解决方案
function home_program($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0096db color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">解决方案</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_program where uid='".$_USER->id."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=program&fileurl=crm&do=view&id='.$row['id'].'&cid='.$row['cid'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//合同
function home_contract($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_01c03f color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">合同</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_contract where uid='".$_USER->id."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=contract&fileurl=crm&do=view&id='.$row['id'].'&cid='.$row['cid'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//订单
function home_order($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_57c4ff color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">订单</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_order where uid='".$_USER->id."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=order&fileurl=crm&do=view&id='.$row['id'].'&cid='.$row['cid'].'" target="_blank">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//收款单
function home_price($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_ed0282 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">收款单</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_price where uid='".$_USER->id."' or user='".get_realname($_USER->id)."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=price&fileurl=crm&do=view&id='.$row['id'].'">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//付款单
function home_payment($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_f3660a color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">付款单</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_payment where uid='".$_USER->id."' or user='".get_realname($_USER->id)."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=payment&fileurl=crm&do=view&id='.$row['id'].'">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//供应商信息
function home_supplier($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_032034 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">供应商信息</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_supplier where uid='".$_USER->id."' or user='".get_realname($_USER->id)."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=supplier&fileurl=crm&do=view&id='.$row['id'].'">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//采购信息
function home_purchase($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_0169c2 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">采购信息</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_purchase where uid='".$_USER->id."' or user='".get_realname($_USER->id)."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=purchase&fileurl=crm&do=view&id='.$row['id'].'">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//代理商信息
function home_business($num){
	global $db,$_USER;
	echo '<div id="module_'.$num.'" class="module listColor">';
	echo '<div class="head">';
	echo '<h4 id="module_'.$num.'_head" class="module_032034 color_style_0 moduleHeader">';
	echo '<a href="javascript:_resize('.$num.');" class="expand expand_arrow" id="img_resize_'.$num.'" title="折叠"></a><span id="module_'.$num.'_text" class="text" onclick="_resize('.$num.');">代理商信息</span>';
	echo '</h4>';
	echo '</div>';
	echo '<div id="module_'.$num.'_body" class="module_body">';
	echo '<div id="module_'.$num.'_ul" class="module_div">';
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."crm_business where uid='".$_USER->id."' or user='".get_realname($_USER->id)."'  ORDER BY id desc LIMIT 8");
	while ($row = $db->fetch_array($query)) {
		echo '<ul>';
		echo '<li><a href="admin.php?ac=business&fileurl=crm&do=view&id='.$row['id'].'">'.$row['title'].'</a></li>';
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

?>