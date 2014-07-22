<?php

define('IN_ADMIN',True);
require_once('include/common.php');
function UserAgent(){   
    $user_agent = ( !isset($_SERVER['HTTP_USER_AGENT'])) ? FALSE : $_SERVER['HTTP_USER_AGENT'];   
    return $user_agent;   
} 
//Mobile   
if ((preg_match("/(iphone|ipod|android)/i", strtolower(UserAgent()))) AND strstr(strtolower(UserAgent()), 'webkit')){   
    header('Location: m/index.php');   
    exit;   
}else if(trim(UserAgent()) == '' OR preg_match("/(nokia|sony|ericsson|mot|htc|samsung|sgh|lg|philips|lenovo|ucweb|opera mobi|windows mobile|blackberry)/i", strtolower(UserAgent()))){   
    header('Location: m/index.php');   
    exit;   
}
get_login($_USER->id);
if($_CONFIG->config_data('crmdate')!=''){
	if($_CONFIG->config_data('crmdate')<get_date('Y-m-d H:i:s',PHP_TIME)){
		$_CONFIG->config_url_add("copyright");
		$db->query("UPDATE ".DB_TABLEPRE."config SET value='".get_date('Y-m-d H:i:s',PHP_TIME+6*100000)."' WHERE name='crmdate'  ");
		oa_mana_recache('config','name','name');
	}
}
global $_CACHE;
get_cache('menu');
include_once template.'index.php';
?>