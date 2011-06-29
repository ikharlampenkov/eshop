<?php /* Smarty version Smarty-3.0.7, created on 2011-06-30 00:31:23
         compiled from "H:/www/eshop/private/smartytemplates/templates/admin/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20614e0b616bb96160-33944317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59a5a98ae2e1c6d46b211a322a8dfd0d3ce8957a' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/admin/catalog.tpl',
      1 => 1309368681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20614e0b616bb96160-33944317',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Каталог</h1>

<?php if ($_smarty_tpl->getVariable('action')->value=='add_rubric'){?>


<?php }else{ ?>

    <?php if ($_smarty_tpl->getVariable('rubric_list')->value){?> 

        <table>
            <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['rubric']->value['title'];?>
</td>
                    <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit_rubric&id=<?php echo $_smarty_tpl->getVariable('rubric')->value->getId();?>
&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
">редактировать</a><br /><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del_rubric&id=<?php echo $_smarty_tpl->getVariable('rubric')->value->getId();?>
&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
">удалить</a> </td>
                </tr>
            <?php }} ?>
        </table>
    <?php }?>

<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add_rubric&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
">добавить</a>   

<?php }?>
