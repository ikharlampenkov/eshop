<?php /* Smarty version Smarty-3.0.7, created on 2012-07-16 19:34:09
         compiled from "F:/www/eshop/private/smartytemplates/templates/_subchild.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1952550040a41be7625-42008021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '316c860e0f4e8174abc9b457b2a4cc6495d73700' => 
    array (
      0 => 'F:/www/eshop/private/smartytemplates/templates/_subchild.tpl',
      1 => 1341939840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1952550040a41be7625-42008021',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="child">
<?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('child')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
    <li><a href="?page=catalog&rubric=<?php echo $_smarty_tpl->getVariable('rubric')->value['info']->getId();?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value['info']->title;?>
</a>
    <?php if ($_smarty_tpl->tpl_vars['rubric']->value['child']){?>
    <?php $_template = new Smarty_Internal_Template("_subchild.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('child',$_smarty_tpl->tpl_vars['rubric']->value['child']); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <?php }?>
    </li>
<?php }} ?>
</ul>