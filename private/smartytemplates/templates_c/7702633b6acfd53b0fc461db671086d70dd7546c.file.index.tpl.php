<?php /* Smarty version Smarty-3.0.7, created on 2011-05-09 20:54:01
         compiled from "H:/www/gkh/private/smartytemplates/templates/admin/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96484dc7f1f9b15929-80323118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7702633b6acfd53b0fc461db671086d70dd7546c' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/admin/index.tpl',
      1 => 1304949161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96484dc7f1f9b15929-80323118',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"></meta>
<meta name="DESCRIPTION" content="<?php echo $_smarty_tpl->getVariable('description')->value;?>
"></meta>
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('keywords')->value;?>
"></meta>
<meta name="author-corporate" content=""></meta>
<meta name="publisher-email" content=""></meta>

<style type="text/css">
table {
    width: 100%;
}

tr {
   vertical-align: top;
}

input {
    width: 100%;
}

textarea {
    width: 100%;
    height: 200px;
}

#save {
    width: 100px;
}

</style>

<script type="text/javascript" language="javascript" src="/js/main.js" ></script>

<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>

</head>
<body>
<?php $_template = new Smarty_Internal_Template("error_msg.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="1">
  <tr>
    <td valign="top" height="150">

        <table width="100%" height="150" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>ЖКХИНФОРМ.РФ</td>
                <td width="300">

                    <div><?php echo $_smarty_tpl->getVariable('user')->value;?>
</div> <a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
?logout">Выйти</a>

                </td>
            </tr>
        </table>


    </td>
  </tr>
  <tr>
    <td>

        <table border="1" width="100">
            <tr>
                <td width="230">

                    <a href="?page=content_page">Контентная страница</a><br /><br />
                    <a href="?page=city">Города</a><br /><br />
                    <a href="?page=reu">РЭУ</a><br /><br />
                    <a href="?page=support">Тех. поддержка</a><br /><br />
                    <a href="?page=news">Новости</a><br /><br />

                </td>
                <td>

                    <?php if (isset($_smarty_tpl->getVariable('page',null,true,false)->value)){?>
                        <?php if ($_smarty_tpl->getVariable('page')->value=="content_page"){?>
                            <?php $_template = new Smarty_Internal_Template("admin/content_page.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                        <?php }?>
                        <?php if ($_smarty_tpl->getVariable('page')->value=="city"){?>
                            <?php $_template = new Smarty_Internal_Template("admin/city.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                        <?php }?>
                        <?php if ($_smarty_tpl->getVariable('page')->value=="reu"){?>
                            <?php $_template = new Smarty_Internal_Template("admin/reu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                        <?php }?>
                        <?php if ($_smarty_tpl->getVariable('page')->value=="support"){?>
                            <?php $_template = new Smarty_Internal_Template("admin/support.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                        <?php }?>
                        <?php if ($_smarty_tpl->getVariable('page')->value=="news"){?>
                            <?php $_template = new Smarty_Internal_Template("admin/news.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                        <?php }?>
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