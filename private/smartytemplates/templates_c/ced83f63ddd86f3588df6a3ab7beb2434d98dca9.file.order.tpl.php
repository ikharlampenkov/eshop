<?php /* Smarty version Smarty-3.0.7, created on 2011-07-03 22:21:51
         compiled from "H:/www/eshop/private/smartytemplates/templates/admin/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:300184e10890f91a654-88484171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ced83f63ddd86f3588df6a3ab7beb2434d98dca9' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/admin/order.tpl',
      1 => 1309706509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300184e10890f91a654-88484171',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'H:\www\eshop\private\classes\smarty\plugins\modifier.date_format.php';
?><h1>Заказы</h1>

<?php if ($_smarty_tpl->getVariable('action')->value=='edit'){?> 
    
    <h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

    <form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
&id=<?php echo $_smarty_tpl->getVariable('order')->value->id;?>
" method="post">
        <table>
            <tr>
                <td>Пользователь</td>
                <td><select name="data[user_login]">
                        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
" <?php if ($_smarty_tpl->tpl_vars['user']->value['login']==$_smarty_tpl->getVariable('order')->value->user){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Дата</td>
                <td><input name="data[date]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('order')->value->date,"%d.%m.%Y");?>
" /></td>
            </tr>
            <tr>
                <td>Скидка</td>
                <td><input name="data[discount]" value="<?php echo $_smarty_tpl->getVariable('order')->value->discount;?>
" /></td>
            </tr>
            <tr>
                <td>Завершeн</td>
                <td><input type="checkbox" name="data[is_complite]" <?php if ($_smarty_tpl->getVariable('order')->value->isComplite){?>checked="checked"<?php }?> style="width:14px;" /></td>
            </tr>   
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>
     
    <h4>Товары</h4>

    <?php if ($_smarty_tpl->getVariable('order')->value->productList){?>

        <table>
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('order')->value->productList; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
                <tr>
                    <td width="110"><?php if ($_smarty_tpl->getVariable('product')->value['product']->img->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('product')->value['product']->img->getPreview();?>
" /><?php }else{ ?>&nbsp;<?php }?></td>
                    <td><?php echo $_smarty_tpl->getVariable('product')->value['product']->title;?>
</td>
                    <td><?php echo $_smarty_tpl->getVariable('product')->value['product']->price;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
</td>
                </tr>
            <?php }} ?>
            <tr>
                <td colspan="2">Итого</td>
                <td><?php echo $_smarty_tpl->getVariable('order')->value->getSumm();?>
</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    <?php }?>
                    
    
<?php }else{ ?>    

<?php if ($_smarty_tpl->getVariable('order_list')->value){?>

        <table>
            <tr>
                <td>Пользователь</td>
                <td>Дата</td>
                <td>Сумма</td>
                <td>Скидка</td>
                <td>Сумма со скидкой</td>
                <td>Завершен</td>
                <td>&nbsp;</td>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('order_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getVariable('order')->value->user;?>
</td>
                    <td><?php echo $_smarty_tpl->getVariable('order')->value->date;?>
</td>
                    <td><?php echo $_smarty_tpl->getVariable('order')->value->getSumm();?>
</td>
                    <td><?php echo $_smarty_tpl->getVariable('order')->value->discount;?>
</td>
                    <td><?php echo $_smarty_tpl->getVariable('order')->value->getSummWithDiscount();?>
</td>
                    <td><?php echo $_smarty_tpl->getVariable('order')->value->isComplite;?>
</td>
                    <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit&id=<?php echo $_smarty_tpl->getVariable('order')->value->id;?>
">редактировать</a><br />
                        <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del&id=<?php echo $_smarty_tpl->getVariable('order')->value->id;?>
">удалить</a> </td>
                </tr>
            <?php }} ?>
        </table>
    <?php }?>
    
<?php }?>