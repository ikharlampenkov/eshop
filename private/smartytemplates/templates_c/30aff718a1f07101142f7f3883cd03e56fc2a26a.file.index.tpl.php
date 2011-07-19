<?php /* Smarty version Smarty-3.0.7, created on 2011-07-19 23:58:05
         compiled from "H:/www/eshop/private/smartytemplates/templates/customer/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195034e25b79dedec89-36572398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30aff718a1f07101142f7f3883cd03e56fc2a26a' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/customer/index.tpl',
      1 => 1311094683,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195034e25b79dedec89-36572398',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"></meta>
        <meta name="DESCRIPTION" content="<?php echo $_smarty_tpl->getVariable('description')->value;?>
"></meta>
        <meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('keywords')->value;?>
"></meta>
        <meta name="author-corporate" content=""></meta>
        <meta name="publisher-email" content=""></meta>

        <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="/css/user.css" />

        <script type="text/javascript" language="javascript" src="/js/jquery.min.js" ></script>
        <script type="text/javascript" language="javascript" src="/js/jquery-ui.min.js" ></script>
        <script type="text/javascript" language="javascript" src="/js/main.js" ></script>

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
                            <td style="font-size:26px; color: white;padding-left: 25px;" valign="middle">eSHOP - панель для покупателя</td>
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
                <td valign="top" height="150">

                    <table width="100%" height="150" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td style="padding: 10px;"> <div><?php echo nl2br($_smarty_tpl->getVariable('conpage')->value['content']);?>
</div> </td>
                        </tr>
                    </table>


                </td>
            </tr>
            <tr>
                <td>

                    <table border="0" width="100%">
                        <tr>
                            <td>

                                <?php if ($_smarty_tpl->getVariable('path')->value){?>
                                    <div class="ttovar">
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
<?php }else{ ?><< Назад<?php }?></a> <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['_prub']['last']){?>/<?php }?>
                                        <?php }} ?>
                                    </div>
                                <?php }?>

                                <?php if (!$_smarty_tpl->getVariable('cur_rubric')->value->isRoot){?>
                                    <h1><?php echo $_smarty_tpl->getVariable('cur_rubric')->value->title;?>
</h1>
                                <?php }?>

                                <?php if ($_smarty_tpl->getVariable('rubric_list')->value){?>
								<table width="100%">
                                    <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                                        <tr><td class="ttovar"><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('rubric')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a></td></tr>
                                    <?php }} ?>
								</table>
                                <?php }?>

                                <?php if ($_smarty_tpl->getVariable('product_list')->value){?>

                                    <table width="100%">
                                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
                                            <tr>
                                                <td width="110" class="ttovar" ><?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
" /><?php }else{ ?>&nbsp;<?php }?></td>
                                                <td class="ttovar"><div><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</div>
                                                    <div><?php echo $_smarty_tpl->getVariable('product')->value->shortText;?>
 <a href="#" id="productshowlink_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" onclick="showInfo(<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
)">подробнее...</a> </div>
                                                    <div id="productinfo_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" style="display:none;"><?php echo nl2br($_smarty_tpl->getVariable('product')->value->fullText);?>
</div>
                                                    <div><b>Цена</b> <?php echo $_smarty_tpl->getVariable('product')->value->price;?>
</div>
                                                </td>
                                                <td class="ttovar" ><input type="text" id="product_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" name="product_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" value=""/> <button onclick="addToChart(<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
)">Заказать</button></td>
                                            </tr>
                                        <?php }} ?>
                                    </table>
                                <?php }?>


                            </td>
                            <td width="230" class="tedit2" >
                                <h1>Корзина</h1>

                                <div id="chart_content"><?php $_template = new Smarty_Internal_Template("customer/chart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>

                                <?php if ($_smarty_tpl->getVariable('orders_list')->value){?>
                                    <h1>Заказы</h1>
                                    
                                    <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('orders_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
?>
                                        <div <?php if ($_smarty_tpl->getVariable('order')->value->isComplite==0){?>class="ttovarred"<?php }else{ ?>class="ttovar"<?php }?>>
                                            <div>№ <?php echo $_smarty_tpl->getVariable('order')->value->id;?>
 от <?php echo $_smarty_tpl->getVariable('order')->value->date;?>
</div>
                                            <div>Сумма:<?php echo $_smarty_tpl->getVariable('order')->value->getSumm();?>
</div>
                                            <div>Скидка: <?php echo $_smarty_tpl->getVariable('order')->value->discount;?>
</div>
                                            <div>Итого: <?php echo $_smarty_tpl->getVariable('order')->value->getSummWithDiscount();?>
</div>
                                        </div><br/>                  
                                    <?php }} ?>
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