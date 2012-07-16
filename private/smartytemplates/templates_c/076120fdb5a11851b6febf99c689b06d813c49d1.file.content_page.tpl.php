<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 22:45:26
         compiled from "F:/www/eshop/private/smartytemplates/templates/admin/content_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31934ffef116379964-12240164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '076120fdb5a11851b6febf99c689b06d813c49d1' => 
    array (
      0 => 'F:/www/eshop/private/smartytemplates/templates/admin/content_page.tpl',
      1 => 1336149168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31934ffef116379964-12240164',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div style="background-color:#f0f0f0; padding:5px;"><h1>О МАГАЗИНЕ</h1></div>


<?php if ($_smarty_tpl->getVariable('action')->value=="add"||$_smarty_tpl->getVariable('action')->value=="edit"){?>

<h1><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h1>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ($_smarty_tpl->getVariable('action')->value=='edit'){?>&id=<?php echo $_smarty_tpl->getVariable('conpage')->value['id'];?>
<?php }?>" method="post">
    <table width="100%">
        <input name="data[page_title]" value="<?php echo $_smarty_tpl->getVariable('conpage')->value['page_title'];?>
" hidden/>
        
        <tr>
            <td class="ttovar" width="150">Название страницы</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('conpage')->value['title'];?>
" /></td>
        </tr>
        <tr>
            <td class="ttovar">Текст</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('ckeditor')->value;?>
 </td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }else{ ?>

<?php if ($_smarty_tpl->getVariable('conpage_list')->value!==false){?>
<table width="100%">
<?php  $_smarty_tpl->tpl_vars['conpage'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('conpage_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['conpage']->key => $_smarty_tpl->tpl_vars['conpage']->value){
?>
    <tr>
        <td class="ttovar"><?php echo $_smarty_tpl->tpl_vars['conpage']->value['title'];?>
</td>
        <td class="tedit"><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['conpage']->value['id'];?>
" class="tedit">редактировать</a></td>
    </tr>
<?php }} ?>
</table>
<?php }?>

<?php }?>