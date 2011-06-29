<?php /* Smarty version Smarty-3.0.7, created on 2011-04-19 22:13:46
         compiled from "H:/www/gkh/private/smartytemplates/templates/recover_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198824dada6aa8cdfe1-48389359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e5f23321f0d664d9a0eb98f89bda6392d4e767f' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/recover_password.tpl',
      1 => 1303226021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198824dada6aa8cdfe1-48389359',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Восстановление пароля</h1>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
" method="post">
    <table width="100%">
        <tr>
            <td width="200">Логин</td>
            <td><input name="data[login]" /></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input name="data[email]" /> </td>
        </tr>
        <tr>
            <td><input type="submit" name="action" value="Восстановить" /> </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</form>