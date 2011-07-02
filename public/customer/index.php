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

$o_catalog = new ProductCatalog();

if (isset($_GET['rubric'])) {
    $cur_rubric = Rubric::getInstanceById($_GET['rubric']);
} else {
    $cur_rubric = Rubric::getRootRubric();
}

$o_smarty->assign('cur_rubric', $cur_rubric);

$o_smarty->assign('rubric_list', $o_catalog->getAllRubric($cur_rubric->getId()));
$o_smarty->assign('product_list', $o_catalog->getAllProduct($cur_rubric->getId()));
$o_smarty->assign('path', $cur_rubric->getPathToRubric());

$o_content_page = new gkh_content_page();
$o_smarty->assign('conpage', $o_content_page->getContentPage('main'));

$o_order = new Order();
$o_order->user = simo_session::getVar('login', 'user');
$o_order->restoreFromSession();

$o_smarty->display('customer/index.tpl');
?>
