<?php /* Smarty version Smarty-3.0.7, created on 2011-06-30 23:50:46
         compiled from "H:/www/eshop/private/smartytemplates/templates/customer/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105824e0ca966009901-90381509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30aff718a1f07101142f7f3883cd03e56fc2a26a' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/customer/index.tpl',
      1 => 1309452643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105824e0ca966009901-90381509',
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

                    <table border="1" width="100%">
                        <tr>
                            <td colspan="2">

                                <div><?php echo $_smarty_tpl->getVariable('conpage')->value['content'];?>
</div>

                            </td>
                        </tr>
                        <tr>
                            <td>

                                <?php if ($_smarty_tpl->getVariable('path')->value){?>
                                    <div>
                                        <?php  $_smarty_tpl->tpl_vars['prub'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('path')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['prub']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['prub']->iteration=0;
if ($_smarty_tpl->tpl_vars['prub']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['prub']->key => $_smarty_tpl->tpl_vars['prub']->value){
 $_smarty_tpl->tpl_vars['prub']->iteration++;
 $_smarty_tpl->tpl_vars['prub']->last = $_smarty_tpl->tpl_vars['prub']->iteration === $_smarty_tpl->tpl_vars['prub']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_prub']['last'] = $_smarty_tpl->tpl_vars['prub']->last;
?>
                                            <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('prub')->value->getId();?>
"><?php if (!$_smarty_tpl->getVariable('prub')->value->isRoot){?><?php echo $_smarty_tpl->getVariable('prub')->value->title;?>
<?php }else{ ?>..<?php }?></a> <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['_prub']['last']){?>/<?php }?>
                                        <?php }} ?>
                                    </div>
                                <?php }?>

                                <?php if (!$_smarty_tpl->getVariable('cur_rubric')->value->isRoot){?>
                                    <h3><?php echo $_smarty_tpl->getVariable('cur_rubric')->value->title;?>
</h3>
                                <?php }?>

                                <?php if ($_smarty_tpl->getVariable('rubric_list')->value){?>

                                    <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                                        <div><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('rubric')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a></div>
                                    <?php }} ?>
                                    
                                <?php }?>

                                <?php if ($_smarty_tpl->getVariable('product_list')->value){?>

                                    <table>
                                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
                                            <tr>
                                                <td width="110"><?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
" /><?php }else{ ?>&nbsp;<?php }?></td>
                                                <td><div><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</div>
                                                    <div><?php echo $_smarty_tpl->getVariable('product')->value->shortText;?>
</div>
                                                    <div><?php echo $_smarty_tpl->getVariable('product')->value->fullText;?>
</div>
                                                    <div><b>Цена</b> <?php echo $_smarty_tpl->getVariable('product')->value->price;?>
</div>
                                                </td>
                                            </tr>
                                        <?php }} ?>
                                    </table>
                                <?php }?>


                            </td>
                            <td width="230">
                                <div>Корзина</div>


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