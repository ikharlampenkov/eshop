<?php /* Smarty version Smarty-3.0.7, created on 2011-03-28 11:03:59
         compiled from "H:/www/gkh/private/smartytemplates/templates/reu/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6634d9008afd9d306-42732411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d6116d929247a09688b29acc3e338384957994f' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/reu/contact.tpl',
      1 => 1301285032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6634d9008afd9d306-42732411',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Контакты</h1>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
" method="post">
    <table>
        <tr>
            <td width="200">Адрес</td>
            <td><input type="text" name="data[address]" value="<?php if (isset($_smarty_tpl->getVariable('contact',null,true,false)->value['address'])){?><?php echo $_smarty_tpl->getVariable('contact')->value['address'];?>
<?php }?>" /></td>
        </tr>
         <tr>
            <td width="200">Телефон</td>
            <td><input type="text" name="data[phone_number]" value="<?php if (isset($_smarty_tpl->getVariable('contact',null,true,false)->value['phone_number'])){?><?php echo $_smarty_tpl->getVariable('contact')->value['phone_number'];?>
<?php }?>" /></td>
        </tr>
    </table>
    <input type="hidden" name="data[id]" value="<?php if (isset($_smarty_tpl->getVariable('contact',null,true,false)->value['id'])){?><?php echo $_smarty_tpl->getVariable('contact')->value['id'];?>
<?php }else{ ?>0<?php }?>" />
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>