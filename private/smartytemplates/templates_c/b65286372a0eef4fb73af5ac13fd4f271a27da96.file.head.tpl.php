<?php /* Smarty version Smarty-3.0.7, created on 2012-07-16 21:37:48
         compiled from "F:/www/eshop/private/smartytemplates/templates/share/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33375004273c4d1791-36792668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b65286372a0eef4fb73af5ac13fd4f271a27da96' => 
    array (
      0 => 'F:/www/eshop/private/smartytemplates/templates/share/head.tpl',
      1 => 1342449465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33375004273c4d1791-36792668',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="DESCRIPTION" content="<?php echo $_smarty_tpl->getVariable('description')->value;?>
"/>
    <meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('keywords')->value;?>
"/>
    <meta name="author-corporate" content=""/>
    <meta name="publisher-email" content=""/>

    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>

    <script type="text/javascript" language="javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
</head>
<body>

<?php $_template = new Smarty_Internal_Template("error_msg.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<table>
    <tr>
        <td>&nbsp;</td>
        <td class="main-block">

            <table>
                <tr>
                    <td class="head-block">
                        <img src="<?php if ($_smarty_tpl->getVariable('bannerTop')->value!==false){?>/files/<?php echo $_smarty_tpl->getVariable('bannerTop')->value->img->getName();?>
<?php }else{ ?>/i/head.jpg<?php }?>" />
                    </td>
                </tr>
                <tr>
                    <td class="head-url"><a href="/">ТиандеМагазин.рф</a></td>
                </tr>
                <tr>
                    <td class="discont-block">

                        <table class="top-menu-table">
                            <tr>
                                <td>&nbsp;</td>
                                <td class="top-menu"><a href="?page=about">О магазине</a></td>
                                <td class="top-menu"><a href="?page=business">Бизнес</a></td>
                            <?php if ($_smarty_tpl->getVariable('login')->value==false){?>
                                <td class="top-menu"><a href="?page=discount">Получить 35% скидку</a></td>
                            <?php }?>
                                <td class="top-menu"><a href="?page=news">Статьи</a></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td>

                        <table>
                            <tr>
                                <td class="sp-block">

                                    <table>
                                        <tr>
                                        <?php if ($_smarty_tpl->getVariable('specList')->value!=false){?>
                                            <?php  $_smarty_tpl->tpl_vars['spec'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('specList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['spec']->key => $_smarty_tpl->tpl_vars['spec']->value){
?>
                                                <td class="sp-block-place">

                                                    <div class="container">

                                                        <div>

                                                            <div style="float: left; vertical-align: bottom; height: 152px; width: 120px; text-align: center; padding: 0; margin: 20px 0 0 0;">
                                                                <?php if ($_smarty_tpl->getVariable('spec')->value->img->getName()){?><img src='/files/<?php echo $_smarty_tpl->getVariable('spec')->value->img->getPreview();?>
' style='height: 150px; width: 105px;'><?php }?>
                                                            </div>
                                                            <div style="float: right; width: 148px; text-align: left;">
                                                                <p><?php echo $_smarty_tpl->getVariable('spec')->value->title;?>
</p>

                                                                <p style='font-size: 14px;'><?php echo $_smarty_tpl->getVariable('spec')->value->shortText;?>
</p>

                                                                <p style='font-size: 14px;'><b>Цена:</b> <?php echo $_smarty_tpl->getVariable('spec')->value->price;?>
</p>

                                                                <div style="text-align: right; height: 20px; width: 148px; padding: 0; margin: 0">
                                                                    <a class='tov_podr' style="text-align: right" href='?page=catalog&action=good&id=<?php echo $_smarty_tpl->getVariable('spec')->value->id;?>
&rubric=<?php echo $_smarty_tpl->getVariable('spec')->value->rubric->id;?>
'> подробнее&nbsp;<span style='color: #fba61a; font-size: 10px;'>&gt;</span></a>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>

                                                </td>
                                            <?php }} ?>
                                        <?php }?>

                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td class="cat-block">

                                    <table>
                                        <tr>
                                            <td class="cat-tree-block">

                                            <?php if ($_smarty_tpl->getVariable('rubric_tree')->value){?>

                                                <ul class="tt-menu">
                                                    <?php if ($_smarty_tpl->getVariable('rubric_tree')->value){?>
                                                        <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_tree')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                                                            <li><a href="?page=catalog&rubric=<?php echo $_smarty_tpl->getVariable('rubric')->value['info']->getId();?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value['info']->title;?>
</a>
                                                                <?php if ($_smarty_tpl->tpl_vars['rubric']->value['child']){?>
                                                                <?php $_template = new Smarty_Internal_Template("_subchild.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('child',$_smarty_tpl->tpl_vars['rubric']->value['child']); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                                                                <?php }?>
                                                            </li>
                                                        <?php }} ?>
                                                    <?php }?>
                                                </ul>
                                            <?php }?>

                                                <br/>

                                            <?php if (isset($_smarty_tpl->getVariable('chart_list',null,true,false)->value)||(isset($_smarty_tpl->getVariable('summ',null,true,false)->value)&&$_smarty_tpl->getVariable('summ')->value!=0)){?>
                                                <h3>Корзина</h3>

                                                <div id="chart_content"><?php $_template = new Smarty_Internal_Template("chart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>
                                            <?php }?>

                                            <?php if (isset($_smarty_tpl->getVariable('orders_list',null,true,false)->value)){?>
                                                <h1>Заказы</h1>

                                                <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('orders_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
?>
                                                    <div <?php if ($_smarty_tpl->getVariable('order')->value->isComplite==0){?>class="ttovarred" <?php }else{ ?>class="ttovar"<?php }?>>
                                                        <div>№ <?php echo $_smarty_tpl->getVariable('order')->value->id;?>
 от <?php echo $_smarty_tpl->getVariable('order')->value->date;?>
</div>
                                                        <div>Сумма:<?php echo $_smarty_tpl->getVariable('order')->value->getSumm();?>
</div>
                                                        <div>Скидка: <?php echo $_smarty_tpl->getVariable('order')->value->discount;?>
</div>
                                                        <div>Итого: <?php echo $_smarty_tpl->getVariable('order')->value->getSummWithDiscount();?>
</div>
                                                    </div>
                                                    <br/>
                                                <?php }} ?>
                                            <?php }?>

                                                <br/>

                                                <div class="menu-phone">
                                                <?php if (isset($_smarty_tpl->getVariable('user',null,true,false)->value)){?>
                                                    <span class="user-info">
                                                                                Пользователь: <?php echo $_smarty_tpl->getVariable('user')->value;?>
&nbsp;/&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
?logout" style="color:black">Выйти</a>
                                                    </span><br/>
                                                <?php }?>
                                                <?php echo $_smarty_tpl->getVariable('contacts')->value['content'];?>

                                                </div>

                                            </td>
                                            <td class="cat-main-block">