<?php
define('IN_ECS', true);
require (dirname(__FILE__) . '/../../m/includes/init.php');
$oid = $_GET['oid'];
$_SESSION['wxch_oid'] = $oid; //1?
$getoid = 'oid=' . $oid;
$appid = $db -> getOne("SELECT appid FROM `site_weixin_config` WHERE `id` = 1");//
$cfg_baseurl = $db -> getOne("SELECT cfg_value FROM site_weixin_cfg WHERE cfg_name = 'baseurl'");  //http://www.mall93.cn/
$back_url = $cfg_baseurl . 'wechat/oauth/wxch_back.php?' . $getoid;//http://www.mall93.cn/wechat/oauth/wxch_back.php?oid=1
$redirect_uri = urlencode($back_url);//���ַ�����URL���� ����ֵ
$state = 'wechat';
$scope = 'snsapi_userinfo';//Ӧ����Ȩ������snsapi_base ����������Ȩҳ�棬ֱ����ת��ֻ�ܻ�ȡ�û�openid����snsapi_userinfo ��������Ȩҳ�棬��ͨ��openid�õ��ǳơ��Ա����ڵء�����//����ʹ��δ��ע������£�ֻҪ�û���Ȩ��Ҳ�ܻ�ȡ����Ϣ�� 
$oauth_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=' . $scope . '&state=' . $state . '#wechat_redirect';
header('Expires: 0');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cahe, must-revalidate');
header('Cache-Control: post-chedk=0, pre-check=0', false);
header('Pragma: no-cache');
header("HTTP/1.1 301 Moved Permanently");
header("Location: $oauth_url");
exit;
