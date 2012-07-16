<?php /* Smarty version Smarty-3.0.7, created on 2012-06-02 16:17:38
         compiled from "F:/www/eshop/private/smartytemplates/templates/chart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:224914fc9da32186ff5-92170789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a3aa69bd8894e414636821a31e8515394322a32' => 
    array (
      0 => 'F:/www/eshop/private/smartytemplates/templates/chart.tpl',
      1 => 1336144916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224914fc9da32186ff5-92170789',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_smarty_tpl->getVariable('chart_list',null,true,false)->value)){?>

<table width="100%">
<?php  $_smarty_tpl->tpl_vars['buying'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('chart_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['buying']->key => $_smarty_tpl->tpl_vars['buying']->value){
?>
    <tr>
        <td style="background-color:white; padding: 10px;"><b><?php echo $_smarty_tpl->getVariable('buying')->value['product']->title;?>
</b><br/>
            <?php if ($_smarty_tpl->getVariable('isComplite')->value){?>Кол-во: <?php echo $_smarty_tpl->tpl_vars['buying']->value['count'];?>

                <?php }else{ ?><input type="text" class="buy-count" id="buying_<?php echo $_smarty_tpl->getVariable('buying')->value['product']->id;?>
" name="buying_<?php echo $_smarty_tpl->getVariable('buying')->value['product']->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['buying']->value['count'];?>
" onchange="countChartS(<?php echo $_smarty_tpl->getVariable('buying')->value['product']->id;?>
)"/><?php }?>
        </td>
    </tr>
<?php }} ?>
</table>
<br>
<?php }?>

<?php if (isset($_smarty_tpl->getVariable('summ',null,true,false)->value)&&$_smarty_tpl->getVariable('summ')->value!=0){?>
<div align="center"><b>Итого: <?php echo $_smarty_tpl->getVariable('summ')->value;?>
</b></div>
    <?php if ($_smarty_tpl->getVariable('isComplite')->value){?>
    <div align="center" style="color: red">Заказ принят. Ожидайте.</div>
        <?php }else{ ?>

    Имя: <input type="text" id="name" name="name"/><br/>
    Телефон: <input type="text" id="tel" name="tel"/><br/>
    E-mail: <input type="text" id="email" name="email"/><br/>
    <button onclick="orderS()">Заказать</button>
    <?php }?>
<?php }?>
