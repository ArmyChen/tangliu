<?php
define('IN_ECS', true);
if(!empty($_SESSION['wxch_oid'])) {
	$oid = $_SESSION['wxch_oid'];
} else {
	if(isset($_GET['oid'])) {
		$oid = $_GET['oid'];
	} else {
		$oid = '';
	}
}

require (dirname(__FILE__) . '/../../m/includes/init.php');
$wxch_config = $db->getRow("SELECT * FROM `site_weixin_config` WHERE `id` = 1");
$appid = $wxch_config['appid'];
$appsecret = $wxch_config['appsecret'];
$code = !empty($_GET['code']) ? $_GET['code'] : ''; //code作为换取access_token的票据
$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
//echo $url;

$ret_json = curl_get_contents($url);//获取返回的参数
//print_r($ret_json);
//exit;
$ret = json_decode($ret_json);
$openid = $ret->openid;
$openid = !empty($ret->openid) ? $ret->openid : '';//用户唯一标识
//$access_token = $ret->access_token;
$access_token = !empty($ret->access_token) ? $ret->access_token : ''; //网页授权接口调用凭证,注意：此access_token与基础支持的access_token不同 
$cfg_baseurl = $db->getOne("SELECT cfg_value FROM site_weixin_cfg WHERE cfg_name = 'baseurl'");  //http://www.mall93.cn/
$cfg_murl = $db->getOne("SELECT cfg_value FROM site_weixin_cfg WHERE cfg_name = 'murl'"); //m/
$back_url = $db->getOne("SELECT `contents` FROM `site_weixin_oauth` WHERE `oid` = '$oid'");//http://www.mall93.cn/mobile
$affiliate_id = $db->getOne("SELECT `affiliate` FROM `site_weixin_user` WHERE `wxid` = '$openid'"); //推荐编号

//甜心100修复完善
if($affiliate_id>=1) //推荐编号大于0
{
	$affiliate = '?u='.$affiliate_id;
	if(strpos($back_url,".php")==false){
		
		$back_url = $back_url."/index.php".$affiliate;
	}elseif(strpos($back_url,"?")>0){
		$affiliate = '&u='.$affiliate_id;
		$back_url = $back_url.$affiliate;
	}else{
	
		$back_url = $back_url.$affiliate;
	}
}

//甜心100修复完善
$update_sql = "UPDATE `site_weixin_oauth` SET `count` = `count` + 1 WHERE `oid` = $oid; ";





$db->query($update_sql);
if(!empty($openid) && strlen($openid) == 28)
{








	$wxch_ecs = $ecs->table('users');

	$w_res = $db->getRow("SELECT * FROM  ".$wxch_ecs." WHERE  `wxid` = '$openid'");
	$_SESSION['wxid'] = $openid;



    
	$url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
	$res_json = curl_get_contents($url);
	$w_user = json_decode($res_json,TRUE);
	$users=get_user_infos($openid);

$niname=$w_user['nickname'];
$niname = str_replace("'", '', $niname);
$time = time();
//echo " update  nikename='$str' ";
	if($users['uid']){
		$w_sql = "UPDATE  " .$ecs->table('weixin_user'). " SET  `nickname` =  '$niname',`sex` =  '$w_user[sex]',`city` =  '$w_user[city]',`country` =  '$w_user[country]',`province` =  '$w_user[province]',`headimgurl` =  '$w_user[headimgurl]',`dateline` =  '$time' WHERE `wxid` = '$openid';";
		$db->query($w_sql);
		$_SESSION['user_id']=$users['uid'];
	}else{
		$sql = "INSERT INTO " .$ecs->table('weixin_user'). " (wxid,nickname,sex,city,country,province,language,headimgurl,localimgurl,subscribe_time,dateline)".
								"VALUES ('$w_user[openid]','$niname','$w_user[sex]','$w_user[city]','$w_user[country]','$w_user[province]','','$w_user[headimgurl]','','$gmtime()','$gmtime()')";
		$db->query($sql);

		$users_id = $db->insert_id();
				$passwords=md5('123456');
				$pxmark='hs';
				$db -> query("INSERT INTO `site_users` (`user_id`, `password` , `user_name`,`wxid`, `reg_time`) VALUES ('$users_id','$passwords','$pxmark$users_id','$w_user[openid]','$time')");

				$_SESSION['user_id']=$users_id;
	}


update_user_info();









}
//echo $back_url;

header("HTTP/1.1 301 Moved Permanently");
header("Location: $back_url");
exit;
function curl_get_contents($url) 
{
	if(isset($_SERVER['HTTP_USER_AGENT'])) {
		$agent = $_SERVER['HTTP_USER_AGENT'];
	} else {
		$agent = '';
	}
	
	if(isset($_SERVER['HTTP_REFERER'])) {
		$referer = $_SERVER['HTTP_REFERER'];
	} else {
		$referer = '';
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_REFERER,$referer);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$r = curl_exec($ch);
	curl_close($ch);
	return $r;
}


function get_user_infos($openid)
{
    /* 获得文章的信息 */
    $sql = "SELECT * ".
            " FROM " .$GLOBALS['ecs']->table('weixin_user') .
            " WHERE     wxid='$openid'  ";

    $row = $GLOBALS['db']->getRow($sql);



    return $row;
}
?>