<?php
/*微信支付通知地址 支付成不成功能返回通知信息 czneng*/
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . 'includes/lib_payment.php');
require(ROOT_PATH .'includes/modules/payment/wx_new_qrcode.php');
$payment = new wx_new_qrcode();
if($payment->respond())
{
$sql2 = 'UPDATE ' . $ecs->table('order_info') . " SET test = 'testp' WHERE order_id = 3";
$db->query($sql2);
}
else
{
$sql2 = 'UPDATE ' . $ecs->table('order_info') . " SET test = '999' WHERE order_id = 3";
$db->query($sql2);
}
exit;