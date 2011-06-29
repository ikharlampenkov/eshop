<?php /* Smarty version Smarty-3.0.7, created on 2011-03-27 20:19:00
         compiled from "H:/www/gkh/private/smartytemplates/templates/left_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:254264d8f39445af516-58938905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d267ac674416eeeded5a61a6694b5b582a4343f' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/left_menu.tpl',
      1 => 1244819197,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '254264d8f39445af516-58938905',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" cellspacing="0" cellpadding="0" style="width : 100%; margin-top:20px;">
<?php if ($_smarty_tpl->getVariable('role')->value==0){?>
  <tr height="25">
      <td align="center"><a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
project/" class="mo">Проекты</a></td>
  </tr>
  <tr height="25">
      <td align="center"><a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
anketa/" class="mo">Анкета</a></td>
  </tr>
  <tr height="25">
      <td align="center"><a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
fm/" class="mo">Финансовая модель</a></td>
  </tr>
<?php }elseif($_smarty_tpl->getVariable('role')->value==1){?>
  <tr height="25">
      <td align="center"><a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
user/" class="mo">Пользователи</a></td>
  </tr>
  <tr height="25">
      <td align="center"><a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
fm/" class="mo">Финансовая модель</a></td>
  </tr>
<?php }elseif($_smarty_tpl->getVariable('role')->value==2){?>
  <tr height="25">
      <td align="center"><a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
anketa/" class="mo">Анкета</a></td>
  </tr>
<?php }?>
  
  
  
</table>
<br>
<div><?php echo $_smarty_tpl->getVariable('user')->value;?>
</div> <a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
logout/">Выйти</a>