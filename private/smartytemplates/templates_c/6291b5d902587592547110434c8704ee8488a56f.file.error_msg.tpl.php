<?php /* Smarty version Smarty-3.0.7, created on 2011-06-30 20:33:15
         compiled from "H:/www/eshop/private/smartytemplates/templates/error_msg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136104e0c7b1b40b683-71402768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6291b5d902587592547110434c8704ee8488a56f' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/error_msg.tpl',
      1 => 1242574452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136104e0c7b1b40b683-71402768',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('exception')->value){?>
<script>
function closeErrorMsg()
{
 o_errorblock = document.getElementById("errorblock");
 o_errorblock.style.display = "none";
}
</script>
<div style="background-color:#ffffd7; border : 1px solid Black; font-size:12px; color:#000000; width:400px;" id="errorblock">
<div>Сообщение об ошибке: <?php echo $_smarty_tpl->getVariable('e_message')->value;?>
</div>
<div>Код ошибки: <?php echo $_smarty_tpl->getVariable('e_code')->value;?>
</div>
<input type="button" value="Закрыть" onclick="closeErrorMsg();">
</div>
<?php }?>