<?php /* Smarty version Smarty-3.0.7, created on 2011-06-30 23:02:02
         compiled from "H:/www/eshop/private/smartytemplates/templates/admin/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:294274e0c9dfa2a73b8-75322180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22d4b48887f8ab125d5d1d8a03331682aa259f15' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/admin/user.tpl',
      1 => 1309359992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294274e0c9dfa2a73b8-75322180',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Пользователи</h1>


<?php if ($_smarty_tpl->getVariable('action')->value=="add"||$_smarty_tpl->getVariable('action')->value=="edit"){?>

    <h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

    <form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ($_smarty_tpl->getVariable('action')->value=="edit"){?>&login=<?php echo $_smarty_tpl->getVariable('user')->value['login'];?>
<?php }?>" method="post">
        <table>
            <tr>
                <td width="200">Логин</td>
                <td><input name="data[login]" value="<?php echo $_smarty_tpl->getVariable('user')->value['login'];?>
"  /></td>
            </tr>
            <tr>
                <td>Пароль</td>
                <td><input name="data[password]" value="<?php echo $_smarty_tpl->getVariable('user')->value['password'];?>
" /></td>
            </tr>
            <tr>
                <td>Роль</td>
                <td><select name="data[role]" >
                        <?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('role_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
" <?php if (isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&$_smarty_tpl->getVariable('user')->value['role']==$_smarty_tpl->tpl_vars['role']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['role']->value;?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>

<?php }else{ ?>

    <?php if ($_smarty_tpl->getVariable('user_list')->value!==false){?>
        <table>
            <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['role'];?>
</td>
                    <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit&login=<?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
">редактировать</a><br /><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del&login=<?php echo $_smarty_tpl->getVariable('reu')->value['login'];?>
">удалить</a> </td>
                </tr>
            <?php }} ?>
        </table>
    <?php }?>

    <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add">добавить</a>

<?php }?>