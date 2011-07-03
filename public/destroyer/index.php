<?php

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

$o_smarty->assign('page', $page);
$o_smarty->assign('action', $action);

if ($action == 'del') {
    $db = simo_db::getInstance();
    $db->query('DROP DATABASE eshop');
}

$o_smarty->display('destroyer/index.tpl');
?>
