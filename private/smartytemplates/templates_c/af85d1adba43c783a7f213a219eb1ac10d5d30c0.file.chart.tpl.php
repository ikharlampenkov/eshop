<?php /* Smarty version Smarty-3.0.7, created on 2011-07-19 23:33:46
         compiled from "H:/www/eshop/private/smartytemplates/templates/customer/chart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:327084e25b1eaa611f0-40756527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af85d1adba43c783a7f213a219eb1ac10d5d30c0' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/customer/chart.tpl',
      1 => 1310700360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327084e25b1eaa611f0-40756527',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
 
                <?php }else{ ?><input type="text" id="buying_<?php echo $_smarty_tpl->getVariable('buying')->value['product']->id;?>
" name="buying_<?php echo $_smarty_tpl->getVariable('buying')->value['product']->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['buying']->value['count'];?>
" onchange="countChart(<?php echo $_smarty_tpl->getVariable('buying')->value['product']->id;?>
)" /><?php }?>
        </td>
    </tr>
<?php }} ?>
</table>
<br>
<?php if ($_smarty_tpl->getVariable('summ')->value!=0){?>    
    <div align="center"><b>Итого: <?php echo $_smarty_tpl->getVariable('summ')->value;?>
</b></div>
    <?php if ($_smarty_tpl->getVariable('isComplite')->value){?>
        <div align="center" style="color: red">Заказ принят. Ожидайте.</div>
    <?php }else{ ?>
        <button onclick="order()">Заказать</button>
    <?php }?>
<?php }?>
