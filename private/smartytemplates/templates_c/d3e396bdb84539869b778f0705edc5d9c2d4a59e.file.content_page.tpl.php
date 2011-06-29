<?php /* Smarty version Smarty-3.0.7, created on 2011-06-29 21:56:38
         compiled from "H:/www/eshop/private/smartytemplates/templates/admin/content_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180364e0b3d2649b9b1-18768149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3e396bdb84539869b778f0705edc5d9c2d4a59e' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/admin/content_page.tpl',
      1 => 1309359131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180364e0b3d2649b9b1-18768149',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Контентные страницы</h1>


<?php if ($_smarty_tpl->getVariable('action')->value=="add"||$_smarty_tpl->getVariable('action')->value=="edit"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ('edit'){?>&id=<?php echo $_smarty_tpl->getVariable('conpage')->value['id'];?>
<?php }?>" method="post">
    <table>
        <tr>
            <td width="200">Название страницы (англ)</td>
            <td><input name="data[page_title]" value="<?php echo $_smarty_tpl->getVariable('conpage')->value['page_title'];?>
" /></td>
        </tr>
        <tr>
            <td>Название страницы</td>
            <td><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('conpage')->value['title'];?>
" /></td>
        </tr>
        <tr>
            <td>Текст</td>
            <td><textarea name="data[content]"><?php echo $_smarty_tpl->getVariable('conpage')->value['content'];?>
</textarea></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }else{ ?>

<?php if ($_smarty_tpl->getVariable('conpage_list')->value!==false){?>
<table>
<?php  $_smarty_tpl->tpl_vars['conpage'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('conpage_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['conpage']->key => $_smarty_tpl->tpl_vars['conpage']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['conpage']->value['page_title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['conpage']->value['title'];?>
</td>
        <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['conpage']->value['id'];?>
">редактировать</a><br /><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del&id=<?php echo $_smarty_tpl->tpl_vars['conpage']->value['id'];?>
">удалить</a> </td>
    </tr>
<?php }} ?>
</table>
<?php }?>

<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add">добавить</a>

<?php }?>