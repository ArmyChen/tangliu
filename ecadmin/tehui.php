<?php
define('IN_ECS', true);

$urlhost=$_SERVER['HTTP_HOST'];

define('IN_ECTOUCH', true);
require(dirname(__FILE__) .'/includes/init.php');
if ($_REQUEST['act'] == 'main')
{
$zhekou = $db->getOne("SELECT value FROM ".$GLOBALS['ecs']->table('tehui') ." where id=1 ");
$add_time = $db->getOne("SELECT add_time FROM ".$GLOBALS['ecs']->table('tehui') ." where id=1 ");
$tshow = $db->getOne("SELECT tshow FROM ".$GLOBALS['ecs']->table('tehui') ." where id=1 ");

$smarty->assign('zhekou',$zhekou);
$smarty->assign('add_time',local_date('Y-m-d',$add_time));

$smarty->assign('tshow',$tshow);
$smarty->assign('ur_here','特惠管理');
$smarty->display('tehui.htm');
}

if ($_REQUEST['act'] == 'save_config')
{
$zhekou = $_POST['zhekou'];
$add_time = local_strtotime($_POST['add_time']);

$tshow = $_POST['tshow'];
$sql = "UPDATE ".$ecs->table('tehui') ." SET value='$zhekou' where id='1'" ;
$db->query($sql);
$sql = "UPDATE ".$ecs->table('tehui') ." SET add_time='$add_time' where id='1'" ;
$db->query($sql);
$sql = "UPDATE ".$ecs->table('tehui') ." SET tshow='$tshow' where id='1'" ;
$db->query($sql);

clear_cache_files();
sys_msg('修改成功！',0,array(array('href'=>'tehui.php?act=main','text'=>'网站特惠管理')));
}

?>