<?php /* Smarty version Smarty-3.0.7, created on 2011-06-30 23:01:43
         compiled from "H:/www/eshop/private/smartytemplates/templates/admin/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:259084e0c9de7357223-17437072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59a5a98ae2e1c6d46b211a322a8dfd0d3ce8957a' => 
    array (
      0 => 'H:/www/eshop/private/smartytemplates/templates/admin/catalog.tpl',
      1 => 1309449700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259084e0c9de7357223-17437072',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Каталог</h1>

<?php if ($_smarty_tpl->getVariable('action')->value=='add_rubric'||$_smarty_tpl->getVariable('action')->value=="edit_rubric"){?>

    <h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

    <form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ($_smarty_tpl->getVariable('action')->value=='edit_rubric'){?>&id=<?php echo $_smarty_tpl->getVariable('rubric')->value['id'];?>
<?php }?>&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
" method="post">
        <table>
            <tr>
                <td width="200">Название</td>
                <td><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
" /></td>
            </tr>
            <tr>
                <td>Рубрика</td>
                <td><select name="data[parent]">
                        <?php  $_smarty_tpl->tpl_vars['rub'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_tree')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rub']->key => $_smarty_tpl->tpl_vars['rub']->value){
?>
                            <option value="<?php echo $_smarty_tpl->getVariable('rub')->value->id;?>
" <?php if ((isset($_smarty_tpl->getVariable('rubric',null,true,false)->value)&&$_smarty_tpl->getVariable('rub')->value->id==$_smarty_tpl->getVariable('rubric')->value->parent)||(!isset($_smarty_tpl->getVariable('rubric',null,true,false)->value)&&$_smarty_tpl->getVariable('rub')->value->id==$_smarty_tpl->getVariable('cur_rubric')->value->getId())){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('rub')->value->title;?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>


<?php }elseif($_smarty_tpl->getVariable('action')->value=='add_product'||$_smarty_tpl->getVariable('action')->value=='edit_product'){?>

    <h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

    <form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ($_smarty_tpl->getVariable('action')->value=='edit_product'){?>&id=<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
<?php }?>&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td width="200">Название</td>
                <td><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('product')->value->title;?>
" /></td>
            </tr>
            <tr>
                <td>Рисунок</td>
                <td><?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?><img src="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getName();?>
" /><br />
                    &nbsp;<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del_img&id=<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
">удалить</a><br /><?php }?>
                    <input type="file"  name="img" /></td>
            </tr>
            <tr>
                <td>Рубрика</td>
                <td><select name="data[rubric]">
                        <?php  $_smarty_tpl->tpl_vars['rub'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_tree')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rub']->key => $_smarty_tpl->tpl_vars['rub']->value){
?>
                            <option value="<?php echo $_smarty_tpl->getVariable('rub')->value->id;?>
" <?php if ((isset($_smarty_tpl->getVariable('product',null,true,false)->value)&&$_smarty_tpl->getVariable('rub')->value->id==$_smarty_tpl->getVariable('product')->value->rubric->id)||(!isset($_smarty_tpl->getVariable('product',null,true,false)->value)&&$_smarty_tpl->getVariable('rub')->value->id==$_smarty_tpl->getVariable('cur_rubric')->value->getId())){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('rub')->value->title;?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Цена</td>
                <td><input name="data[price]" value="<?php echo $_smarty_tpl->getVariable('product')->value->price;?>
" /></td>
            </tr>
            <tr>
                <td>Текст</td>
                <td><textarea name="data[shot_text]"><?php echo $_smarty_tpl->getVariable('product')->value->shortText;?>
</textarea></td>
            </tr>
            <tr>
                <td>Полный текст</td>
                <td><textarea name="data[full_text]"><?php echo $_smarty_tpl->getVariable('product')->value->fullText;?>
</textarea></td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>

<?php }else{ ?>
    
    <?php if ($_smarty_tpl->getVariable('path')->value){?>
    <div>
    <?php  $_smarty_tpl->tpl_vars['prub'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('path')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['prub']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['prub']->iteration=0;
if ($_smarty_tpl->tpl_vars['prub']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['prub']->key => $_smarty_tpl->tpl_vars['prub']->value){
 $_smarty_tpl->tpl_vars['prub']->iteration++;
 $_smarty_tpl->tpl_vars['prub']->last = $_smarty_tpl->tpl_vars['prub']->iteration === $_smarty_tpl->tpl_vars['prub']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_prub']['last'] = $_smarty_tpl->tpl_vars['prub']->last;
?>
        <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('prub')->value->getId();?>
"><?php if (!$_smarty_tpl->getVariable('prub')->value->isRoot){?><?php echo $_smarty_tpl->getVariable('prub')->value->title;?>
<?php }else{ ?>..<?php }?></a> <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['_prub']['last']){?>/<?php }?>
    <?php }} ?>
    </div>
    <?php }?>
    
    <?php if (!$_smarty_tpl->getVariable('cur_rubric')->value->isRoot){?>
    <h3><?php echo $_smarty_tpl->getVariable('cur_rubric')->value->title;?>
</h3>
    <?php }?>

    <h4>Рубрики</h4>
    
    <?php if ($_smarty_tpl->getVariable('rubric_list')->value){?>

        <table>
            <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                <tr>
                    <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('rubric')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a></td>
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
">добавить рубрику</a>

    <hr/>

    <h4>Товары</h4>

    <?php if ($_smarty_tpl->getVariable('product_list')->value){?>

        <table>
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
                <tr>
                    <td><?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
" /><?php }else{ ?>&nbsp;<?php }?></td>
                    <td><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</td>
                    <td><?php echo $_smarty_tpl->getVariable('product')->value->shortText;?>
</td>
                    <td><?php echo $_smarty_tpl->getVariable('product')->value->price;?>
</td>
                    <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit_product&id=<?php echo $_smarty_tpl->getVariable('product')->value->getId();?>
&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
">редактировать</a><br /><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del_product&id=<?php echo $_smarty_tpl->getVariable('product')->value->getId();?>
&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
">удалить</a> </td>
                </tr>
            <?php }} ?>
        </table>
    <?php }?>

    <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add_product&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
">добавить товар</a>

<?php }?>
