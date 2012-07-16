<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/allinclud.php';

$o_smarty = new simo_smarty();
$o_fmuser = new share_user();

if ($o_fmuser->isLogin()) {
    $o_smarty->assign('login', true);
    $o_smarty->assign('user', simo_session::getVar('login', 'user'));
    $o_smarty->assign('role', $o_fmuser->getUserRole());

    if (isset($_GET['logout'])) {
        $o_fmuser->logOut();
        header("Location: /");
    }

    if ($o_fmuser->getUserRole() == share_user::UT_ADMIN) {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/index.php';
    } elseif ($o_fmuser->getUserRole() == share_user::UT_CUSTOMER) {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/customer/index.php';
    } elseif ($o_fmuser->getUserRole() == share_user::UT_DESTROYER) {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/destroyer/index.php';
    } else {

    }
} else {
    $isFirstPage = 0;

    $o_smarty->assign('login', false);

    if (isset($_POST['login']) && isset($_POST['psw'])) {
        if ($o_fmuser->logIn($_POST['login'], $_POST['psw'])) {
            header("Location: /");
        } else {
            $o_smarty->assign('login_fail', '1');
        }
    }

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

    if ($page == 'anketa') {
        $o_anketa = new anketa();

        if (isset($_POST) && !empty($_POST)) {

            $o_anketa->_sendToEmail($_POST);

            simo_session::setVar('isComplite', 1, 'anketa');
            simo_functions::chLocation('?page=' . $page);
            exit;
        }

        if (simo_session::existVar('isComplite', 'anketa')) {
            simo_session::clearVar('isComplite', 'anketa');
            $o_smarty->assign('isComplite', true);
        }
    }

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
            $o_smarty->assign('productToneList', ProductTone::getAllInstance($o_product));
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
    $o_smarty->assign('specList', $o_catalog->getSpecProduct());

    //print_r($o_catalog->getRubricTreeM());

    $o_smarty->assign('bannerList', Banner::getAllInstance());
    $o_smarty->assign('bannerTop', BannerTop::getPageInstance($isFirstPage));

    $o_content_page = new gkh_content_page();
    $o_smarty->assign('contacts', $o_content_page->getContentPage('contact'));

    $o_smarty->display('index.tpl');
}
?>