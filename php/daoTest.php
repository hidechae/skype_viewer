<?php
//require_once '../MySmarty.php';
require_once '/home/hideyuki-utsunomiya/public_html/skype_viewer/bootstrap.php';

$dao = $_GET['dao'];
var_dump("dao = $dao");
$main_dao = getDao($dao);
$res = $main_dao->get("select", array(), 10, 0);
//$res = $main_dao->get("select_by_chatname", array('chatname' => '"#g.hideyuki.utsunomiya.yd3y/$g.jun.tomioka.647n;98211476030f5d19"'), 10, 0);
var_dump($res);

$smarty = new MySmarty();
$smarty->assign('', $res);
$smarty->display(TPL_DIR . 'index.tpl');
