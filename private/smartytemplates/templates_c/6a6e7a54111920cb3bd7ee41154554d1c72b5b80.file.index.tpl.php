<?php /* Smarty version Smarty-3.0.7, created on 2011-07-03 22:37:46
         compiled from "H:/www/eshop/private/smartytemplates/templates/destroyer/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84714e108cca42cb90-73157488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a6e7a54111920cb3bd7ee41154554d1c72b5b80' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/destroyer/index.tpl',
      1 => 1309707126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84714e108cca42cb90-73157488',
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
                            <td>Электронный магазин</td>
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

                    <a href="?page=main&action=del">Удалить</a> 

                </td>
            </tr>
            <tr>
                <td height="40">&nbsp;</td>
            </tr>
        </table>



    </body>
</html>