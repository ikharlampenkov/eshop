<?php /* Smarty version Smarty-3.0.7, created on 2011-05-12 23:13:57
         compiled from "H:/www/gkh/private/smartytemplates/templates/admin/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114254dcc07455551a5-65558921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55ba315861e9cf54b38ee91c09f45c5dfceb4bee' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/admin/news.tpl',
      1 => 1305216834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114254dcc07455551a5-65558921',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'H:\www\gkh\private\classes\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'H:\www\gkh\private\classes\smarty\plugins\modifier.truncate.php';
?><h1>Новости</h1>


<?php if ($_smarty_tpl->getVariable('action')->value=="add_category"||$_smarty_tpl->getVariable('action')->value=="edit_category"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ('edit'){?>&id=<?php echo $_smarty_tpl->getVariable('news_category')->value['id'];?>
<?php }?>" method="post">
    <table>
        <tr>
            <td width="200">Название</td>
            <td><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('news_category')->value['title'];?>
" /></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }elseif($_smarty_tpl->getVariable('action')->value=="add_news"||$_smarty_tpl->getVariable('action')->value=="edit_news"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ('edit'){?>&id=<?php echo $_smarty_tpl->getVariable('news')->value['id'];?>
<?php }?>" method="post">
    <table>
        <tr>
            <td width="200">Название</td>
            <td><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('news')->value['title'];?>
" /></td>
        </tr>
        <tr>
            <td width="200">Категория</td>
            <td><select name="data[news_category_id]">
                <?php  $_smarty_tpl->tpl_vars['news_category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news_category_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_category']->key => $_smarty_tpl->tpl_vars['news_category']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['news_category']->value['id'];?>
" <?php if (isset($_smarty_tpl->getVariable('news',null,true,false)->value)&&$_smarty_tpl->getVariable('news')->value['news_category_id']==$_smarty_tpl->tpl_vars['news_category']->value['id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['news_category']->value['title'];?>
</option>
                <?php }} ?>    
                </select>
            </td>
        </tr>
        <tr>
            <td width="200">Дата</td>
            <td><input name="data[date]" value="<?php if (isset($_smarty_tpl->getVariable('news',null,true,false)->value['date'])){?><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('news')->value['date'],"%d.%m.%Y");?>
<?php }else{ ?><?php echo smarty_modifier_date_format(time(),"%d.%m.%Y");?>
<?php }?>" /></td>
        </tr>
        <tr>
            <td width="200">Анонс</td>
            <td><textarea name="data[short_text]"><?php echo $_smarty_tpl->getVariable('news')->value['short_text'];?>
</textarea></td>
        </tr>
        <tr>
            <td width="200">Текст новости</td>
            <td><textarea name="data[full_text]"><?php echo $_smarty_tpl->getVariable('news')->value['full_text'];?>
</textarea></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }elseif($_smarty_tpl->getVariable('action')->value=="show_comment"){?>

<div><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('news')->value['date'],"%d.%m.%Y");?>
&nbsp;<?php echo $_smarty_tpl->getVariable('news')->value['title'];?>
</div><br />

<?php if ($_smarty_tpl->getVariable('news_comment_list')->value!==false){?>
<table>
<?php  $_smarty_tpl->tpl_vars['news_comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news_comment_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_comment']->key => $_smarty_tpl->tpl_vars['news_comment']->value){
?>
    <tr>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_comment']->value['date'],"%d.%m.%Y");?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['news_comment']->value['nickname'];?>
</td>
        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news_comment']->value['text'],100);?>
</td>
        <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit_news_comment&id=<?php echo $_smarty_tpl->tpl_vars['news_comment']->value['id'];?>
&news_id=<?php echo $_smarty_tpl->getVariable('news')->value['id'];?>
">редактировать</a><br />
            <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del_news_comment&id=<?php echo $_smarty_tpl->tpl_vars['news_comment']->value['id'];?>
&news_id=<?php echo $_smarty_tpl->getVariable('news')->value['id'];?>
">удалить</a> </td>
    </tr>
<?php }} ?>
</table>
<?php }?>

<?php }elseif($_smarty_tpl->getVariable('action')->value=="edit_news_comment"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
<?php echo $_smarty_tpl->getVariable('news')->value['title'];?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit_news_comment&id=<?php echo $_smarty_tpl->getVariable('news_comment')->value['id'];?>
&news_id=<?php echo $_smarty_tpl->getVariable('news')->value['id'];?>
" method="post">
    <table>
        <tr>
            <td width="200">Дата</td>
            <td><input name="data[date]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('news_comment')->value['date'],"%d.%m.%Y");?>
" /></td>
        </tr>
        <tr>
            <td width="200">Имя</td>
            <td><input name="data[nickname]" value="<?php echo $_smarty_tpl->getVariable('news_comment')->value['nickname'];?>
" /></td>
        </tr>
        <tr>
            <td width="200">Комментарий</td>
            <td><textarea name="data[text]"><?php echo $_smarty_tpl->getVariable('news_comment')->value['text'];?>
</textarea></td>
        </tr>
        <tr>
            <td>Модерировать</td>
            <td><input type="checkbox" name="data[is_moderated]" <?php if ($_smarty_tpl->getVariable('news_comment')->value['is_moderated']){?>checked="checked"<?php }?> style="width: 14px;" /></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }else{ ?>


<h4>Категории новостей</h4>

<?php if ($_smarty_tpl->getVariable('news_category_list')->value!==false){?>
<table>
<?php  $_smarty_tpl->tpl_vars['news_category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news_category_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_category']->key => $_smarty_tpl->tpl_vars['news_category']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['news_category']->value['title'];?>
</td>
        <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit_category&id=<?php echo $_smarty_tpl->tpl_vars['news_category']->value['id'];?>
">редактировать</a><br />
            <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del_category&id=<?php echo $_smarty_tpl->tpl_vars['news_category']->value['id'];?>
">удалить</a> </td>
    </tr>
<?php }} ?>
</table>
<?php }?>

<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add_category">добавить категорию</a>

<hr width="100%" size="1" />

<h4>Новости</h4>

<?php if ($_smarty_tpl->getVariable('news_list')->value!==false){?>

<table>
    <tr>
        <td id="pager">Страница: 
        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('page_info')->value['page_count'];?>
<?php $_tmp1=ob_get_clean();?><?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['name'] = 'pager';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] = is_array($_loop=$_tmp1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total']);
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']==$_smarty_tpl->getVariable('cur_page')->value){?><b><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']+1;?>
</b><?php }else{ ?><a href=<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
&pager=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
 ><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']+1;?>
</a> <?php }?>
        <?php endfor; endif; ?>   
        </td>
    </tr>
</table>
<br/>

<table>
<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
?>
    <tr>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value['date'],"%d.%m.%Y");?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['news']->value['category_title'];?>
</td>
        <td><?php echo smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['news']->value['short_text']),50);?>
</td>
        <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=show_comment&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
">просмотреть комментарии</a><br />
            <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit_news&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
">редактировать</a><br />
            <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del_news&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
">удалить</a> </td>
    </tr>
<?php }} ?>
</table>

<br/>
<table>
    <tr>
        <td id="pager">Страница: 
        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('page_info')->value['page_count'];?>
<?php $_tmp2=ob_get_clean();?><?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['name'] = 'pager';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] = is_array($_loop=$_tmp2) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total']);
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']==$_smarty_tpl->getVariable('cur_page')->value){?><b><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']+1;?>
</b><?php }else{ ?><a href=<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
&pager=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
 ><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']+1;?>
</a> <?php }?>
        <?php endfor; endif; ?>   
        </td>
    </tr>
</table>
<br/>
<?php }?>

<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add_news">добавить новость</a>

<?php }?>