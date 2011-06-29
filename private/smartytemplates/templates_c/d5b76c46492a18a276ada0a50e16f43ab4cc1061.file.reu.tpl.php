<?php /* Smarty version Smarty-3.0.7, created on 2011-04-19 23:12:26
         compiled from "H:/www/gkh/private/smartytemplates/templates/admin/reu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:300744dadb46a456c62-35485562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5b76c46492a18a276ada0a50e16f43ab4cc1061' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/admin/reu.tpl',
      1 => 1303228414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300744dadb46a456c62-35485562',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>РЭУ</h1>


<?php if ($_smarty_tpl->getVariable('action')->value=="add"||$_smarty_tpl->getVariable('action')->value=="edit"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ('edit'){?>&id=<?php echo $_smarty_tpl->getVariable('reu')->value['id'];?>
<?php }?>" method="post">
    <table>
        <tr>
            <td width="200">Город</td>
            <td><select name="data[city_id]" >
                <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('city_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['id'];?>
" <?php if (isset($_smarty_tpl->getVariable('reu',null,true,false)->value)&&$_smarty_tpl->getVariable('reu')->value['city_id']==$_smarty_tpl->tpl_vars['city']->value['id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['title'];?>
</option>
                <?php }} ?>
                </select></td>
        </tr>
        <tr>
            <td width="200">Название</td>
            <td><input name="data[title]" value='<?php echo $_smarty_tpl->getVariable('reu')->value['title'];?>
' /></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input name="data[email]" value="<?php echo $_smarty_tpl->getVariable('reu')->value['email'];?>
" /></td>
        </tr>
        <tr>
            <td>Логин</td>
            <td><input name="data[login]" value="<?php echo $_smarty_tpl->getVariable('reu')->value['user']['login'];?>
" /></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input name="data[password]" value="<?php echo $_smarty_tpl->getVariable('reu')->value['user']['password'];?>
" /></td>
        </tr>
        <tr>
            <td>Контактные данные</td>
            <td><textarea name="data[contact_info_admin]"><?php echo $_smarty_tpl->getVariable('reu')->value['contact_info_admin'];?>
</textarea></td>
        </tr>
        <tr>
            <td>Модерировать</td>
            <td><input type="checkbox" name="data[is_moderated]" value="<?php echo $_smarty_tpl->getVariable('reu')->value['is_moderated'];?>
" <?php if ($_smarty_tpl->getVariable('reu')->value['is_moderated']){?>checked="checked"<?php }?> style="width: 14px;" /></td>
        </tr>
    </table>
    <input name="data[user_id]" type="hidden" value="<?php if (isset($_smarty_tpl->getVariable('reu',null,true,false)->value['user_id'])){?><?php echo $_smarty_tpl->getVariable('reu')->value['user_id'];?>
<?php }else{ ?>0<?php }?>" />
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }else{ ?>

<?php if ($_smarty_tpl->getVariable('reu_list')->value!==false){?>
<table>
<?php  $_smarty_tpl->tpl_vars['reu'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('reu_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['reu']->key => $_smarty_tpl->tpl_vars['reu']->value){
?>
    <tr style="background-color: <?php if ($_smarty_tpl->tpl_vars['reu']->value['is_moderated']){?>#ccffcc<?php }else{ ?>#ffd2ba<?php }?>">
        <td><?php echo $_smarty_tpl->tpl_vars['reu']->value['city_title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['reu']->value['title'];?>
</td>
        <td><a href="?action=logoin_as_reu&id=<?php echo $_smarty_tpl->tpl_vars['reu']->value['id'];?>
">Войти как РЭУ</a> </td>
        <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['reu']->value['id'];?>
">редактировать</a><br /><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del&id=<?php echo $_smarty_tpl->tpl_vars['reu']->value['id'];?>
">удалить</a> </td>
    </tr>
<?php }} ?>
</table>
<?php }?>

<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add">добавить</a>

<?php }?>