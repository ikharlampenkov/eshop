<?php /* Smarty version Smarty-3.0.7, created on 2011-06-29 21:40:21
         compiled from "H:/www/eshop/private/smartytemplates/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226234e0b3955114ef9-55497929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ac71442ec59b7522cedab4786614a65829cf80f' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/index.tpl',
      1 => 1309358418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226234e0b3955114ef9-55497929',
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

        <style >
            input {
    width: 99%;
            }

            textarea {
    width: 99%;
    height: 200px;
            }

            #save {
    width: 100px;
            }


        </style>

        <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>

    </head>
    <body>
        <?php $_template = new Smarty_Internal_Template("error_msg.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

        <?php if ($_smarty_tpl->getVariable('login')->value==false){?>

            <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td valign="middle" align="center">

                        <table height="100" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="300">

                                    <div style="text-align:center; vertical-align:middle;">
                                        <div style="border:1px solid black; width:250px; height:100px; padding:10px; text-align:left;">
                                        <?php if (isset($_smarty_tpl->getVariable('login_fail',null,true,false)->value)){?><div style="color:red; font-weight:bold; font-size:12px;">Вы ввели неправильный логин и пароль!</div><?php }?>
                                        <form method="post" style="margin:0px; padding:0px;">
                                            <div><span style="width:70px">Логин: </span><input name="login" type="text" style="width:150px;"></div>
                                            <div><span style="width:70px">Пароль: </span><input name="psw" type="password" style="width:150px;"></div>
                                            <div><input type="submit" value="Войти" style="width:70px;"></div>
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    </table>


                </td>
            </tr>
        </table>

    <?php }else{ ?>

    <?php }?>    

</body>
</html>