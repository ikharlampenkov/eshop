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

$isFirstPage = 0;

/*
if (simo_session::existVar('isComplite', 'order')) {
    $isComplite = simo_session::getVar('isComplite', 'order');
} else {
    $isComplite = false;
}
 */

if ($page == 'catalog') {
    $o_catalog = new ProductCatalog();

    if (isset($_GET['rubric'])) {
        $cur_rubric = Rubric::getInstanceById($_GET['rubric']);
    } else {
        $cur_rubric = Rubric::getRootRubric();
    }

    $o_smarty->assign('cur_rubric', $cur_rubric);
    $o_smarty->assign('path', $cur_rubric->getPathToRubric());

    if ($action == 'good') {
        $o_product = Product::getInstanceById($_GET['id']);
        $o_smarty->assign('product', $o_product);
    } else {
        $o_smarty->assign('rubric_list', $o_catalog->getAllRubric($cur_rubric->getId()));
        $o_smarty->assign('product_list', $o_catalog->getAllProduct($cur_rubric->getId()));
    }

}

if ($page == 'news') {

    $o_news = new gkh_news();


    if ($action == 'view_news' && isset($_GET['id'])) {
        $news = $o_news->getNews($_GET['id']);
        $o_smarty->assign('news', $news);
    } else {

        if (isset($_GET['pager'])) {
            $cur_page = $_GET['pager'];
        } else {
            $cur_page = 0;
        }
        $o_smarty->assign('cur_page', $cur_page);

        $o_smarty->assign('news_list_full', $o_news->getAllNews($cur_page));
        $o_smarty->assign('page_info', $o_news->getPageInfo($cur_page, -1));
    }
}

if ($page == 'business') {
    $o_content_page = new gkh_content_page();
    $o_smarty->assign('conpage', $o_content_page->getContentPage('main'));
}

if ($page == 'about') {
    $o_content_page = new gkh_content_page();
    $o_smarty->assign('conpage', $o_content_page->getContentPage('about'));
}

if ($page == 'discount') {
    $o_content_page = new gkh_content_page();
    $o_smarty->assign('conpage', $o_content_page->getContentPage('discount'));
}

if ($page == 'banner') {
    $oBanner = Banner::getInstanceById($_GET['id']);
    $o_smarty->assign('banner', $oBanner);
}

if ($page == '') {
    $isFirstPage = 1;
}

$o_catalog = new ProductCatalog();

$o_smarty->assign('rubric_tree', $o_catalog->getRubricTreeM(false));


$o_order = new Order();
$o_order->setUser(simo_session::getVar('login', 'user'));
$o_order->restoreFromSession();

$o_smarty->assign('chart_list', $o_order->getProductList());
$o_smarty->assign('summ', $o_order->getSumm());

$o_smarty->assign('orders_list', $o_catalog->getAllOrderByUser(simo_session::getVar('login', 'user')));

//$o_smarty->assign('isComplite', $isComplite);

$o_smarty->assign('bannerList', Banner::getAllInstance());
$o_smarty->assign('bannerTop', BannerTop::getPageInstance($isFirstPage));

$o_content_page = new gkh_content_page();
$o_smarty->assign('contacts', $o_content_page->getContentPage('contact'));

$o_smarty->display('customer/index.tpl');
?>
