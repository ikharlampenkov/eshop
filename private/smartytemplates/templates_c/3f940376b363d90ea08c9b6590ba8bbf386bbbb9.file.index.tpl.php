<?php /* Smarty version Smarty-3.0.7, created on 2012-07-10 22:31:23
         compiled from "F:/www/eshop/private/smartytemplates/templates/admin/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:244514ffc4acb8ff133-44006228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f940376b363d90ea08c9b6590ba8bbf386bbbb9' => 
    array (
      0 => 'F:/www/eshop/private/smartytemplates/templates/admin/index.tpl',
      1 => 1341934272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244514ffc4acb8ff133-44006228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>

    <style type="text/css">
        h1 {
            font-size: 20px;
            font-weight: normal;
        }

        body {
            font-family: tahoma, sans-serif;
        }

        tr {
            vertical-align: top;
        }

        input {
            width: 100%;
        }

        input[type=checkbox] {
            width: 14px;
        }

        textarea {
            width: 100%;
            height: 200px;
        }

        input[type=submit] {
            width: 100px;
        }

        #save {
            width: 100px;
        }

        .menu {
            color: #69aefc;
            font-weight: bold;
        }

        .menu:hover {
            color: #69aefc;
            font-weight: bold;
            text-decoration: none;
        }

        .rmenu {
            color: #1465c0;
        }

        .rmenu:hover {
            #1465c0;
            text-decoration: none;
        }

        .tedit {
            background-color: #ebf4ff;
            padding: 10px;
            width: 100px;
        }

        .tdel {
            background-color: #ebf4ff;
            padding: 10px;
            width: 50px;
        }

        a.tdel {
            color: #830000;
        }

        a.tedit {
            color: #1465c0;
        }

        .ttovar {
            background-color: #f7f7f7;
            padding: 10px;
        }

        .ttovarred {
            background-color: #ffdede;
            padding: 10px;
        }

        a {
            color: #1465c0
        }
    </style>

    <script type="text/javascript" language="javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>

</head>
<body>
<?php $_template = new Smarty_Internal_Template("error_msg.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<table width="1000" height="100%" cellpadding="0" cellspacing="0" border="0" align="center">
    <tr>
        <td valign="top" height="40">

            <table width="100%" height="40" cellpadding="0" cellspacing="0" border="0" style="background-color:#69aefc">
                <tr>
                    <td style="font-size:26px; color: white;padding-left: 25px;" valign="middle">eSHOP - административная панель управения</td>
                    <td width="300" valign="middle" style="color:white">

                        Пользователь: <?php echo $_smarty_tpl->getVariable('user')->value;?>
 &nbsp; / &nbsp; <a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
?logout" style="color:black">Выйти</a>

                    </td>
                </tr>
            </table>


        </td>
    </tr>
    <tr>
        <td>

            <table border="0" cellpadding="20" width="100%">
                <tr>
                    <td width="230">

                        <table border="0" cellpadding="10" cellspacing="10" width="100%" height="100%" style="background-color:#f0f0f0">
                            <tr>
                                <td><h1>Меню:</h1></td>
                            </tr>
                            <tr>
                                <td><a href="?page=content_page" class="menu">О МАГАЗИНЕ</a></td>
                            </tr>
                            <tr>
                                <td><a href="?page=catalog" class="menu">КАТАЛОГ ТОВАРОВ</a></td>
                            </tr>
                            <tr>
                                <td><a href="?page=order" class="menu">ЗАКАЗЫ</a></td>
                            </tr>
                            <tr>
                                <td><a href="?page=banner" class="menu">БАННЕРЫ</a></td>
                            </tr>
                            <tr>
                                <td><a href="?page=banner_top" class="menu">ВЕРХНИЙ БАННЕР</a></td>
                            </tr>
                            <tr>
                                <td><a href="?page=user" class="menu">ПОЛЬЗОВАТЕЛИ</a></td>
                            </tr>

                        </table>

                    </td>
                    <td>

                    <?php if (isset($_smarty_tpl->getVariable('page',null,true,false)->value)&&!empty($_smarty_tpl->getVariable('page',null,true,false)->value)){?>
                                    <?php $_template = new Smarty_Internal_Template("admin/".($_smarty_tpl->getVariable('page')->value).".tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                                <?php }?>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td height="40">&nbsp;</td>
    </tr>
</table>


</body>
</html>