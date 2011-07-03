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
    $o_smarty->assign('login', false);

    if (isset($_POST['login']) && isset($_POST['psw'])) {
        if ($o_fmuser->logIn($_POST['login'], $_POST['psw'])) {
            header("Location: /");
        } else {
            $o_smarty->assign('login_fail', '1');
        }
    }

    $o_smarty->display('index.tpl');
}
?>