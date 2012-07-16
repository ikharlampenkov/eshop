<?php /* Smarty version Smarty-3.0.7, created on 2012-07-10 21:31:40
         compiled from "F:/www/eshop/private/smartytemplates/templates/admin/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67574ffc3cccd73f58-48672244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e8e7d72b9e5b659a232ffe709b401bd08dbf190' => 
    array (
      0 => 'F:/www/eshop/private/smartytemplates/templates/admin/banner.tpl',
      1 => 1341569580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67574ffc3cccd73f58-48672244',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div style="background-color:#f0f0f0; padding:5px;"><h1>БАННЕР</h1></div>

<?php if ($_smarty_tpl->getVariable('action')->value=='add'||$_smarty_tpl->getVariable('action')->value=="edit"){?>

<h1><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h1>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ($_smarty_tpl->getVariable('action')->value=='edit'){?>&id=<?php echo $_smarty_tpl->getVariable('banner')->value->id;?>
<?php }?>" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td width="200" class="ttovar">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('banner')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar">Рисунок</td>
            <td class="ttovar">
                <?php if (isset($_smarty_tpl->getVariable('banner',null,true,false)->value)&&$_smarty_tpl->getVariable('banner')->value->img->getName()){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
files/<?php echo $_smarty_tpl->getVariable('banner')->value->img->getName();?>
"/><br/>
                <?php }?>
                <input type="file" name="img"/></td>
        </tr>
        <tr>
            <td class="ttovar">Контент</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('ckeditor')->value;?>
</td>
        </tr>

    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

    <?php }else{ ?>

<table width="100%">
    <tr>
        <td colspan="5" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle"><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add">добавить баннер</a></td>
    </tr>
    <?php if ($_smarty_tpl->getVariable('bannerList')->value){?>
        <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
            <tr>
                <td class="ttovar"><?php if ($_smarty_tpl->getVariable('banner')->value->img->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('banner')->value->img->getPreview();?>
"/><?php }else{ ?>&nbsp;<?php }?></td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('banner')->value->title;?>
</td>
                <td class="tedit"><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit&id=<?php echo $_smarty_tpl->getVariable('banner')->value->getId();?>
">редактировать</a><br/>
                    <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del&id=<?php echo $_smarty_tpl->getVariable('banner')->value->getId();?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('banner')->value->title;?>
');" style="color: #830000">удалить</a></td>
            </tr>
        <?php }} ?>
    <?php }?>
</table>

<?php }?>
