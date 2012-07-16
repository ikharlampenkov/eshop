<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/allinclud.php';

$o_smarty = new simo_smarty();


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = '';
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

/*
  if (simo_session::existVar('isComplite', 'order')) {
  $isComplite = simo_session::getVar('isComplite', 'order');
  } else {
  $isComplite = false;
  }
 */


$o_order = new Order();

$user = simo_session::getVar('login', 'user');
if (is_null($user)) {
    $user = 'guest';
}

$o_order->setUser($user);
$o_order->restoreFromSession();

global $__cfg;

header('Expires: Fri, 25 Dec 1980 00:00:00 GMT'); // time in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Content-Type: text/html; charset=' . $__cfg['smarty.encoding']);
header('Content-Type: text/xml');

$strout = '<?xml version="1.0" encoding="' . $__cfg['smarty.encoding'] . '"?><response><result>';

if ($page == 'chart') {

    if ($action == 'addToChart') {
        /*
          if ($isComplite == true) {
          $o_order->clearSession();
          }
         */
        //if ($isComplite == false) {
        $o_order->addProduct($_GET['product'], $_GET['count'], $_GET['tone']);
        //}
        $o_smarty->assign('chart_list', $o_order->getProductList());
        $o_smarty->assign('summ', $o_order->getSumm());

        $isComplite = false;
    }

    if ($action == 'countChart') {
        //if ($isComplite == false) {
        $o_order->changeProduct($_GET['product'], $_GET['count']);
        //}
        $o_smarty->assign('chart_list', $o_order->getProductList());
        $o_smarty->assign('summ', $o_order->getSumm());
    }

    if ($action == 'order') {
        //if ($isComplite == false) {
        $data = array();
        $o_order->insertToDb($data);
        //}

        $o_smarty->assign('chart_list', $o_order->getProductList());
        $o_smarty->assign('summ', $o_order->getSumm());
        $isComplite = true;
        $o_order->clearSession();
    }
}

//simo_session::setVar('isComplite', $isComplite, 'order');
$o_smarty->assign('isComplite', $isComplite);

if ($__cfg['smarty.encoding'] != 'utf-8' && stripos($_SERVER['HTTP_USER_AGENT'], 'msie') === false) {
    $strout .= mb_convert_encoding($o_smarty->fetch('customer/' . $page . '.tpl'), 'windows-1251', 'utf-8');
} else {
    $strout .= $o_smarty->fetch('customer/' . $page . '.tpl');
}

$strout .= '</result></response>';

echo $strout;
flush();
?>
