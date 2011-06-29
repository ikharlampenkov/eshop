<?php /* Smarty version Smarty-3.0.7, created on 2011-04-19 21:41:49
         compiled from "H:/www/gkh/private/smartytemplates/templates/registr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173384dad9f2de2d275-90748986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e799523e58a29575f928a136e88dbab920e5fc6' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/registr.tpl',
      1 => 1303224107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173384dad9f2de2d275-90748986',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Регистрация нового РЭУ</h1>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
" method="post">
    <table width="100%">
        <tr>
            <td width="200">Город</td>
            <td><select name="data[city_id]" >
                <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('city_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['city']->value['title'];?>
</option>
                <?php }} ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Название</td>
            <td><input name="data[title]" /> </td>
        </tr>
        <tr>
            <td>Контактная информация</td>
            <td><textarea name="data[contact_info_admin]"></textarea></td>
        </tr>
        <tr>
            <td>Что заинтересовало?</td>
            <td><textarea name="data[what_interested]"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="action" value="Зарегистрировать" /> </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</form>