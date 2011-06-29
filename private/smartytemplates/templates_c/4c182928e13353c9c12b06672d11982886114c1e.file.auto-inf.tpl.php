<?php /* Smarty version Smarty-3.0.7, created on 2011-04-14 21:23:02
         compiled from "H:/www/gkh/private/smartytemplates/templates/reu/auto-inf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97294da703462ce313-91617374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c182928e13353c9c12b06672d11982886114c1e' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/reu/auto-inf.tpl',
      1 => 1302788549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97294da703462ce313-91617374',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'H:\www\gkh\private\classes\smarty\plugins\modifier.date_format.php';
?><h1>Управление авто-информатором</h1>

<h4>Обновить БД</h4>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=update_db" enctype="multipart/form-data" method="post">
    <table>
        <tr>
            <td width="150">Выберите файл</td>
            <td><input type="file" name="data[file]" /></td>
        </tr>
        <tr>
            <td colspan="2"><input id="save" name="save" type="submit" value="Обновить БД" /></td>
        </tr>
    </table>
</form>

<hr width="100%" size="1" />

<h4>История обновлений</h4>

<?php if ($_smarty_tpl->getVariable('history_list')->value!=false){?>
<table border="1">
    <tr>
        <td>Дата</td>
        <td></td>
    </tr>
<?php  $_smarty_tpl->tpl_vars['history'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('history_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['history']->key => $_smarty_tpl->tpl_vars['history']->value){
?>
    <tr>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['history']->value['date'],"%d.%m.%Y %H:%M");?>
</td>
        <td><a href="">загрузить</a></td>
    </tr>
<?php }} ?>
</table>

<?php }?>

<hr width="100%" size="1" />