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

if ($page == 'content_page') {

    $o_content_page = new gkh_content_page();

    if ($action == 'add') {
        if (isset($_POST['data'])) {
            $o_content_page->addContentPage($_POST['data']);
            simo_functions::chLocation('?page=' . $page);
            exit;
        }

        $o_smarty->assign('conpage', '');
        $o_smarty->assign('txt', 'Добавить контентную страницу');
    } elseif ($action == 'edit' && isset($_GET['id'])) {

        if (isset($_POST['data'])) {
            $o_content_page->updateContentPage($_GET['id'], $_POST['data']);
            simo_functions::chLocation('?page=' . $page);
            exit;
        }

        $o_smarty->assign('txt', 'Редактировать контентную страницу');
        $o_smarty->assign('conpage', $o_content_page->getContentPage($_GET['id']));
    } elseif ($action == 'del') {
        $o_content_page->deleteContentPage($_GET['id']);
        simo_functions::chLocation('?page=' . $page);
    } else {
        $o_smarty->assign('conpage_list', $o_content_page->getAllContentPage());
    }
}

if ($page == 'user') {

    $o_user = new share_user();
    $o_smarty->assign('role_list', $o_user->role_list);

    if ($action == 'add') {
        if (isset($_POST['data'])) {
            $o_user->addUser($_POST['data']);
            simo_functions::chLocation('?page=' . $page);
            exit;
        }

        $o_smarty->assign('user', '');
        $o_smarty->assign('txt', 'Добавить пользователя');
    } elseif ($action == 'edit' && isset($_GET['login'])) {

        if (isset($_POST['data'])) {
            $o_user->updateUser($_GET['login'], $_POST['data']);
            simo_functions::chLocation('?page=' . $page);
            exit;
        }

        $o_smarty->assign('txt', 'Редактировать пользователя');
        $o_smarty->assign('user', $o_user->getUser($_GET['login']));
    } elseif ($action == 'del') {
        $o_user->deleteUser($_GET['login']);
        simo_functions::chLocation('?page=' . $page);
    } else {
        $o_smarty->assign('user_list', $o_user->getAllUser());
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

    if ($action == 'add_rubric') {
        if (isset($_POST['data'])) {
            $o_rubric = new Rubric();
            $o_rubric->setTitle($_POST['data']['title']);
            $o_rubric->setParent($_POST['data']['parent']);
            $o_rubric->insertToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Добавить рубрику');
    } elseif ($action == 'edit_rubric' && isset($_GET['id'])) {
        $o_rubric = Rubric::getInstanceById($_GET['id']);

        if (isset($_POST['data'])) {
            $o_rubric->setTitle($_POST['data']['title']);
            $o_rubric->setParent($_POST['data']['parent']);
            $o_rubric->updateToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('rubric', $o_rubric);
        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Редактировать рубрику');
    } elseif ($action == 'del_rubric' && isset($_GET['id'])) {
        $o_rubric = Rubric::getInstanceById($_GET['id']);
        $o_rubric->deleteFromDb();
        simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
        exit;
    } else {


        $o_smarty->assign('rubric_list', $o_catalog->getAllRubric($cur_rubric->getId()));
        $o_smarty->assign('product_list', $o_catalog->getAllProduct($cur_rubric->getId()));
    }
}

$o_smarty->display('admin/index.tpl');
?>
