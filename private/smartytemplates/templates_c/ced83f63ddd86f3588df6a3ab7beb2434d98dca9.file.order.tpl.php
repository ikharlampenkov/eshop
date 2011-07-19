<?php /* Smarty version Smarty-3.0.7, created on 2011-07-19 23:43:00
         compiled from "H:/www/eshop/private/smartytemplates/templates/admin/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108014e25b414465ef4-14359506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ced83f63ddd86f3588df6a3ab7beb2434d98dca9' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/admin/order.tpl',
      1 => 1311092378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108014e25b414465ef4-14359506',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'H:\www\eshop\private\classes\smarty\plugins\modifier.date_format.php';
?><div style="background-color:#f0f0f0; padding:5px;"><h1>ЗАКАЗЫ</h1></div>

<?php if ($_smarty_tpl->getVariable('action')->value=='edit'){?>

    <h1><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h1>

    <form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
&id=<?php echo $_smarty_tpl->getVariable('order')->value->id;?>
" method="post">
        <table width="100%">
            <tr>
                <td class="ttovar">Пользователь</td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('order')->value->user;?>
 
                </td>
            </tr>
            <tr>
                <td class="ttovar">Дата</td>
                <td class="ttovar"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('order')->value->date,"%d.%m.%Y");?>
 </td>
            </tr>
            <tr>
                <td class="ttovar">Скидка</td>
                <td class="ttovar"><input name="data[discount]" value="<?php echo $_smarty_tpl->getVariable('order')->value->discount;?>
" /></td>
            </tr>
            <tr>
                <td class="ttovar">Завершeн</td>
                <td class="ttovar"><input type="checkbox" name="data[is_complite]" <?php if ($_smarty_tpl->getVariable('order')->value->isComplite){?>checked="checked"<?php }?> style="width:14px;" /></td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>

    <h1>Товары</h1>

    <?php if ($_smarty_tpl->getVariable('order')->value->productList){?>

        <table width="100%">
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('order')->value->productList; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
                <tr>
                    <td width="110" class="ttovar"><?php if ($_smarty_tpl->getVariable('product')->value['product']->img->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('product')->value['product']->img->getPreview();?>
" /><?php }else{ ?>&nbsp;<?php }?></td>
                    <td class="ttovar"><?php echo $_smarty_tpl->getVariable('product')->value['product']->title;?>
</td>
                    <td class="ttovar"><?php echo $_smarty_tpl->getVariable('product')->value['product']->price;?>
</td>
                    <td class="ttovar"><?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
</td>
                </tr>
            <?php }} ?>
            <tr>
                <td colspan="2" class="ttovar" align="right"><b>Итого</b></td>
                <td class="ttovar"><b><?php echo $_smarty_tpl->getVariable('order')->value->getSumm();?>
</b></td>
                <td class="ttovar">&nbsp;</td>
            </tr>
        </table>
    <?php }?>


<?php }else{ ?>

<?php if ($_smarty_tpl->getVariable('order_list')->value){?>

        <table width="100%">
            <tr>
                <td class="ttovar">Логин</td>
                <td class="ttovar">Дата</td>
                <td class="ttovar">Сумма</td>
                <td class="ttovar">Скидка</td>
                <td class="ttovar">Cо скидкой</td>
                <td class="ttovar">&nbsp;</td>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('order_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
?>
                <tr>
                    <td <?php if ($_smarty_tpl->getVariable('order')->value->isComplite==0){?>class="ttovarred"<?php }else{ ?>class="ttovar"<?php }?>><?php echo $_smarty_tpl->getVariable('order')->value->user;?>
</td>
                    <td <?php if ($_smarty_tpl->getVariable('order')->value->isComplite==0){?>class="ttovarred"<?php }else{ ?>class="ttovar"<?php }?>><?php echo $_smarty_tpl->getVariable('order')->value->date;?>
</td>
                    <td <?php if ($_smarty_tpl->getVariable('order')->value->isComplite==0){?>class="ttovarred"<?php }else{ ?>class="ttovar"<?php }?>><?php echo $_smarty_tpl->getVariable('order')->value->getSumm();?>
</td>
                    <td <?php if ($_smarty_tpl->getVariable('order')->value->isComplite==0){?>class="ttovarred"<?php }else{ ?>class="ttovar"<?php }?>><?php echo $_smarty_tpl->getVariable('order')->value->discount;?>
</td>
                    <td <?php if ($_smarty_tpl->getVariable('order')->value->isComplite==0){?>class="ttovarred"<?php }else{ ?>class="ttovar"<?php }?>><?php echo $_smarty_tpl->getVariable('order')->value->getSummWithDiscount();?>
</td>
                    <td class="tedit"><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit&id=<?php echo $_smarty_tpl->getVariable('order')->value->id;?>
">открыть</a><br />
                                      <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del&id=<?php echo $_smarty_tpl->getVariable('order')->value->id;?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('order')->value->user;?>
 <?php echo $_smarty_tpl->getVariable('order')->value->date;?>
');" style="color: #830000">удалить</a> </td>
                </tr>
            <?php }} ?>
        </table>
    <?php }?>

<?php }?>