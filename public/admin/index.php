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

        global $__cfg;

        include_once $__cfg['site.dir'] . 'ckeditor/ckeditor.php';
        include_once $__cfg['site.dir'] . 'ckfinder/ckfinder.php';

        $CKEditor = new CKEditor();
        $CKEditor->basePath = '/ckeditor/';
        $CKEditor->returnOutput = true;

        $ckFinder = new CKFinder();
        $ckFinder->BasePath = '/ckfinder/';
        $ckFinder->SetupCKEditorObject($CKEditor);

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

            $conpage = $o_content_page->getContentPage($_GET['id']);

            $o_smarty->assign('txt', 'Редактировать контентную страницу');
            $o_smarty->assign('ckeditor', $CKEditor->editor('data[content]', $conpage['content']));
            $o_smarty->assign('conpage', $conpage);
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
            unset($o_rubric);
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        } elseif ($action == 'add_product') {
            if (isset($_POST['data'])) {
                $o_product = new Product();
                $o_product->setTitle($_POST['data']['title']);
                $o_product->setRubric($_POST['data']['rubric']);
                $o_product->setShortText($_POST['data']['short_text']);
                $o_product->setFullText($_POST['data']['full_text']);
                $o_product->setPrice($_POST['data']['price']);

                if (isset($_POST['data']['is_spec'])) {
                    $o_product->setIsSpec(1);
                } else {
                    $o_product->setIsSpec(0);
                }

                $o_product->insertToDb();
                simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
                exit;
            }

            $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
            $o_smarty->assign('txt', 'Добавить товар');
        } elseif ($action == 'edit_product' && isset($_GET['id'])) {
            $o_product = Product::getInstanceById($_GET['id']);

            if (isset($_POST['data'])) {
                $o_product->setTitle($_POST['data']['title']);
                $o_product->setRubric($_POST['data']['rubric']);
                $o_product->setShortText($_POST['data']['short_text']);
                $o_product->setFullText($_POST['data']['full_text']);
                $o_product->setPrice($_POST['data']['price']);

                if (isset($_POST['data']['is_spec'])) {
                    $o_product->setIsSpec(1);
                } else {
                    $o_product->setIsSpec(0);
                }

                $o_product->updateToDb();
                simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
                exit;
            }

            if (isset($_POST['tone'])) {
                $o_tone = new ProductTone();
                $o_tone->setProduct($o_product);
                $o_tone->setTitle($_POST['tone']['title']);

                $o_tone->insertToDb();
                simo_functions::chLocation('?page=' . $page . '&action=edit_product&id=' . $o_product->getId() . '&rubric=' . $cur_rubric->id);
                exit;
            }

            if (isset($_GET['delete_tone'])) {
                $o_tone = ProductTone::getInstanceById($_GET['delete_tone']);
                $o_tone->deleteFromDb();
                simo_functions::chLocation('?page=' . $page . '&action=edit_product&id=' . $o_product->getId() . '&rubric=' . $cur_rubric->id);
                exit;
            }

            $o_smarty->assign('product', $o_product);
            $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
            $o_smarty->assign('productToneList', ProductTone::getAllInstance($o_product));
            $o_smarty->assign('txt', 'Редактировать товар');
        } elseif ($action == 'del_product' && isset($_GET['id'])) {
            $o_product = Product::getInstanceById($_GET['id']);
            $o_product->deleteFromDb();
            unset($o_product);
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        } elseif ($action == 'del_img' && isset($_GET['id'])) {
            $o_product = Product::getInstanceById($_GET['id']);
            $o_product->deleteImg();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        } else {


            $o_smarty->assign('rubric_list', $o_catalog->getAllRubric($cur_rubric->getId()));
            $o_smarty->assign('product_list', $o_catalog->getAllProduct($cur_rubric->getId()));
            $o_smarty->assign('path', $cur_rubric->getPathToRubric());
        }
    }

    if ($page == 'order') {

        $o_catalog = new ProductCatalog();


        if ($action == 'add_status') {
            $o_status = new Status();
            if (isset($_POST['data'])) {
                $o_status->setTitle($_POST['data']['title']);
                $o_status->setPrior($_POST['data']['prior']);
                $o_status->setColor($_POST['data']['color']);
                $o_status->insertToDb();
                simo_functions::chLocation('?page=' . $page);
                exit;
            }
            $o_smarty->assign('status', $o_status);
            $o_smarty->assign('txt', 'Добавить статус');
        } elseif ($action == 'edit_status' && isset($_GET['id'])) {
            $o_status = Status::getInstanceById($_GET['id']);

            if (isset($_POST['data'])) {
                $o_status->setTitle($_POST['data']['title']);
                $o_status->setPrior($_POST['data']['prior']);
                $o_status->setColor($_POST['data']['color']);
                $o_status->updateToDb();
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $o_smarty->assign('status', $o_status);
            $o_smarty->assign('txt', 'Редактировать статус');
        } elseif ($action == 'del_status' && isset($_GET['id'])) {
            $o_status = Status::getInstanceById($_GET['id']);
            $o_status->deleteFromDb();
            unset($o_status);
            simo_functions::chLocation('?page=' . $page);
            exit;
        } elseif ($action == 'edit' && isset($_GET['id'])) {
            $o_order = Order::getInstanceById($_GET['id']);

            if (isset($_POST['data'])) {
                $o_order->setDiscount($_POST['data']['discount']);
                $o_order->setIsComplite($_POST['data']['is_complite']);
                $o_order->setStatus($_POST['data']['status']);

                $o_order->updateToDb();
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $o_user = new share_user();
            $o_smarty->assign('user_list', $o_user->getAllUser());
            $o_smarty->assign('status_list', Status::getAllInstance());

            $o_smarty->assign('order', $o_order);
            $o_smarty->assign('txt', 'Редактировать заказ');
        } elseif ($action == 'del' && isset($_GET['id'])) {
            $o_order = Order::getInstanceById($_GET['id']);
            $o_order->deleteFromDb();
            unset($o_product);
            simo_functions::chLocation('?page=' . $page);
            exit;
        } else {
            $o_order = new Order();

            if (isset($_POST['info']['email'])) {
                $o_order->saveEmail($_POST['info']['email']);
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $o_smarty->assign('email', $o_order->getEmail());

            $o_smarty->assign('status_list', Status::getAllInstance());
            $o_smarty->assign('order_list', $o_catalog->getAllOrder());
        }
    }

    if ($page == 'banner') {
        if ($action == 'add') {
            $oBanner = new Banner();

            global $__cfg;

            include_once $__cfg['site.dir'] . 'ckeditor/ckeditor.php';
            include_once $__cfg['site.dir'] . 'ckfinder/ckfinder.php';

            $CKEditor = new CKEditor();
            $CKEditor->basePath = '/ckeditor/';
            $CKEditor->returnOutput = true;

            $ckFinder = new CKFinder();
            $ckFinder->BasePath = '/ckfinder/';
            $ckFinder->SetupCKEditorObject($CKEditor);

            if (isset($_POST['data'])) {
                $oBanner = new Banner();
                $oBanner->setTitle($_POST['data']['title']);
                $oBanner->setContent($_POST['data']['content']);

                $oBanner->insertToDb();
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $o_smarty->assign('banner', $oBanner);
            $o_smarty->assign('ckeditor', $CKEditor->editor('data[content]', $oBanner->getContent()));
            $o_smarty->assign('txt', 'Добавить баннер');
        } elseif ($action == 'edit' && isset($_GET['id'])) {
            $oBanner = Banner::getInstanceById($_GET['id']);

            global $__cfg;

            include_once $__cfg['site.dir'] . 'ckeditor/ckeditor.php';
            include_once $__cfg['site.dir'] . 'ckfinder/ckfinder.php';

            $CKEditor = new CKEditor();
            $CKEditor->basePath = '/ckeditor/';
            $CKEditor->returnOutput = true;

            $ckFinder = new CKFinder();
            $ckFinder->BasePath = '/ckfinder/';
            $ckFinder->SetupCKEditorObject($CKEditor);

            if (isset($_POST['data'])) {
                $oBanner->setTitle($_POST['data']['title']);
                $oBanner->setContent($_POST['data']['content']);
                $oBanner->updateToDb();
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $o_smarty->assign('banner', $oBanner);
            $o_smarty->assign('ckeditor', $CKEditor->editor('data[content]', $oBanner->getContent()));
            $o_smarty->assign('txt', 'Редактировать баннер');
        } elseif ($action == 'del' && isset($_GET['id'])) {
            $oBanner = Banner::getInstanceById($_GET['id']);
            $oBanner->deleteFromDb();
            unset($oBanner);
            simo_functions::chLocation('?page=' . $page);
            exit;
        } else {
            $o_smarty->assign('bannerList', Banner::getAllInstance());

        }
    }

    if ($page == 'banner_top') {
        if ($action == 'add') {
            $oBanner = new BannerTop();

            if (isset($_POST['data'])) {
                $oBanner->setTitle($_POST['data']['title']);
                if (isset($_POST['data']['is_first_page'])) {
                    $oBanner->setIsFirstPage(1);
                } else {
                    $oBanner->setIsFirstPage(0);
                }

                $oBanner->insertToDb();
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $o_smarty->assign('banner', $oBanner);

            $o_smarty->assign('txt', 'Добавить верхний баннер');
        } elseif ($action == 'edit' && isset($_GET['id'])) {
            $oBanner = BannerTop::getInstanceById($_GET['id']);

            if (isset($_POST['data'])) {
                $oBanner->setTitle($_POST['data']['title']);
                if (isset($_POST['data']['is_first_page'])) {
                    $oBanner->setIsFirstPage(1);
                } else {
                    $oBanner->setIsFirstPage(0);
                }

                $oBanner->updateToDb();
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $o_smarty->assign('banner', $oBanner);

            $o_smarty->assign('txt', 'Редактировать верхний баннер');
        } elseif ($action == 'del' && isset($_GET['id'])) {
            $oBanner = BannerTop::getInstanceById($_GET['id']);
            $oBanner->deleteFromDb();
            unset($oBanner);
            simo_functions::chLocation('?page=' . $page);
            exit;
        } else {
            $o_smarty->assign('bannerList', BannerTop::getAllInstance());

        }
    }

    if ($page == 'news') {

        $o_news = new gkh_news();


        if ($action == 'add_news') {
            global $__cfg;

            include_once $__cfg['site.dir'] . 'ckeditor/ckeditor.php';
            include_once $__cfg['site.dir'] . 'ckfinder/ckfinder.php';

            $CKEditor = new CKEditor();
            $CKEditor->basePath = '/ckeditor/';
            $CKEditor->returnOutput = true;

            $ckFinder = new CKFinder();
            $ckFinder->BasePath = '/ckfinder/';
            $ckFinder->SetupCKEditorObject($CKEditor);


            if (isset($_POST['data'])) {
                $o_news->addNews($_POST['data']);
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $o_smarty->assign('ckeditor', $CKEditor->editor('data[full_text]', ''));
            $o_smarty->assign('txt', 'Добавить статью');
        } elseif ($action == 'edit_news' && isset($_GET['id'])) {

            global $__cfg;

            include_once $__cfg['site.dir'] . 'ckeditor/ckeditor.php';
            include_once $__cfg['site.dir'] . 'ckfinder/ckfinder.php';

            $CKEditor = new CKEditor();
            $CKEditor->basePath = '/ckeditor/';
            $CKEditor->returnOutput = true;

            $ckFinder = new CKFinder();
            $ckFinder->BasePath = '/ckfinder/';
            $ckFinder->SetupCKEditorObject($CKEditor);

            if (isset($_POST['data'])) {
                $o_news->updateNews($_GET['id'], $_POST['data']);
                simo_functions::chLocation('?page=' . $page);
                exit;
            }

            $tempNews =  $o_news->getNews($_GET['id']);

            $o_smarty->assign('txt', 'Редактировать статью');
            $o_smarty->assign('news', $tempNews);

            $o_smarty->assign('ckeditor', $CKEditor->editor('data[full_text]', $tempNews['full_text']));
        } elseif ($action == 'del_news') {
            $o_news->deleteNews($_GET['id']);
            simo_functions::chLocation('?page=' . $page);
        } else {

            if (isset($_GET['pager'])) {
                $cur_page = $_GET['pager'];
            } else {
                $cur_page = 0;
            }
            $o_smarty->assign('cur_page', $cur_page);

            $o_smarty->assign('news_list_full', $o_news->getAllNews($cur_page));
            $o_smarty->assign('page_info', $o_news->getPageInfo($cur_page));
        }
    }

    $o_smarty->display('admin/index.tpl');

} else {
    $o_smarty->assign('login', false);

    if (isset($_POST['login']) && isset($_POST['psw'])) {
        if ($o_fmuser->logIn($_POST['login'], $_POST['psw'])) {
            header("Location: /admin/");
        } else {
            $o_smarty->assign('login_fail', '1');
        }
    }

    $o_smarty->display('admin/login.tpl');
}

?>