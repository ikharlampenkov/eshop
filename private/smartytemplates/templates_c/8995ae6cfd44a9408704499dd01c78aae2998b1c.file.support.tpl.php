<?php /* Smarty version Smarty-3.0.7, created on 2011-05-13 22:45:52
         compiled from "H:/www/gkh/private/smartytemplates/templates/admin/support.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105514dcd5230494769-29116946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8995ae6cfd44a9408704499dd01c78aae2998b1c' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/admin/support.tpl',
      1 => 1305301546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105514dcd5230494769-29116946',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'H:\www\gkh\private\classes\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'H:\www\gkh\private\classes\smarty\plugins\modifier.truncate.php';
?><h1>Техническая поддержка</h1>


<?php if ($_smarty_tpl->getVariable('action')->value=="answer"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
&id=<?php echo $_smarty_tpl->getVariable('tech_support_post')->value['id'];?>
" method="post">
    <table>
        <tr>
            <td width="200">Дата вороса</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('tech_support_post')->value['date_question'],"%d.%m.%Y %H:%M");?>
</td>
        </tr>
        <tr>
            <td width="200">Вопрос</td>
            <td><?php echo $_smarty_tpl->getVariable('tech_support_post')->value['question'];?>
</td>
        </tr>
        <tr>
            <td width="200">Ответ</td>
            <td><textarea name="data[answer]"><?php echo $_smarty_tpl->getVariable('tech_support_post')->value['answer'];?>
</textarea></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }elseif($_smarty_tpl->getVariable('action')->value=="question"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>РЭУ</td>
            <td><select name="data[reu_id]">
                <?php  $_smarty_tpl->tpl_vars['reu'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('reu_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['reu']->key => $_smarty_tpl->tpl_vars['reu']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['reu']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['reu']->value['title'];?>
</option>
                <?php }} ?>
                </select></td>
        </tr>
        <tr>
            <td width="200">Вопрос</td>
            <td><textarea name="data[question]"></textarea></td>
        </tr>
		<tr>
            <td width="200">Прикрепит файл</td>
            <td>
			<div id="file_list">
			<input type="file" name="qfile1" />
			</div>
			<input type="hidden" id="file_count" value="2" />
			<a href="#" onclick="addFile('file_list', 'file_count')">Прикрепить еще один файл</a>
			</td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }elseif($_smarty_tpl->getVariable('action')->value=='view_ticket'){?>

<h2>Вопрос № <?php echo $_smarty_tpl->getVariable('ticket')->value['id'];?>
 от <?php echo $_smarty_tpl->getVariable('reu_info')->value['title'];?>
</h2>
<div><?php echo $_smarty_tpl->getVariable('ticket')->value['title'];?>
</div>
<br />

<div><b>Контакты:</b> <?php echo $_smarty_tpl->getVariable('reu_info')->value['contact_info_admin'];?>
 </div><br />

<?php if ($_smarty_tpl->getVariable('ticket')->value['post_list']){?>
<table>
<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ticket')->value['post_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['post']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['post']->iteration=0;
if ($_smarty_tpl->tpl_vars['post']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
 $_smarty_tpl->tpl_vars['post']->iteration++;
 $_smarty_tpl->tpl_vars['post']->last = $_smarty_tpl->tpl_vars['post']->iteration === $_smarty_tpl->tpl_vars['post']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_post']['last'] = $_smarty_tpl->tpl_vars['post']->last;
?>
    <tr>
        <td style="background-color: #e0e0e0;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['date_question'],"%d.%m.%Y %H:%M");?>
<br />
                <?php echo $_smarty_tpl->tpl_vars['post']->value['question'];?>

                <?php if ($_smarty_tpl->tpl_vars['post']->value['file_list']!=false){?>
            <div>
                    <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['post']->value['file_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_file']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_file']['iteration']++;
?>
                <a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
temp_support/<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
" target="_blank">Файл <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['_file']['iteration'];?>
</a><br />
                    <?php }} ?>
            </div>
                <?php }?>
        </td>
    </tr>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['_post']['last']){?>
    <tr>
        <td>
            <form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
&id=<?php echo $_smarty_tpl->getVariable('ticket')->value['id'];?>
&reu_id=<?php echo $_smarty_tpl->getVariable('ticket')->value['reu_id'];?>
" method="post">
		Ответ<br />
                <textarea name="data[answer]"><?php echo $_smarty_tpl->tpl_vars['post']->value['answer'];?>
</textarea><br />

                Прикрепит файл<br />
                <div id="file_list">
                    <input type="file" name="qfile1" />
                </div>
                <input type="hidden" id="file_count" value="2" />
                <a href="#" onclick="addFile('file_list', 'file_count')">Прикрепить еще один файл</a><br /><br />
                
                Статус<br />
                <select name="data[tech_support_ticket_status_id]">
                    <?php  $_smarty_tpl->tpl_vars['ticket_status'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ticket_status_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ticket_status']->key => $_smarty_tpl->tpl_vars['ticket_status']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['ticket_status']->value['id'];?>
" <?php if ($_smarty_tpl->getVariable('ticket')->value['tech_support_ticket_status_id']==$_smarty_tpl->tpl_vars['ticket_status']->value['id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['ticket_status']->value['title'];?>
</option>
                    <?php }} ?>
                </select><br /><br />

                <input name="data[id]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" />
                <input id="save" name="save" type="submit" value="Сохранить" />
            </form>
        </td>
    </tr>
		<?php }else{ ?>
    <tr>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['date_answer'],"%d.%m.%Y %H:%M");?>
<br />
                <?php echo $_smarty_tpl->tpl_vars['post']->value['answer'];?>

            <?php if ($_smarty_tpl->tpl_vars['post']->value['answer_file_list']!=false){?>
            <div>
                    <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['post']->value['answer_file_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_file']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_file']['iteration']++;
?>
                <a href="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
temp_support/<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
" target="_blank">Файл <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['_file']['iteration'];?>
</a><br />
                    <?php }} ?>
            </div>
                <?php }?>
        </td>
    </tr>
		<?php }?>
<?php }} ?>
</table>
<?php }?>

<?php }elseif($_smarty_tpl->getVariable('action')->value=="add_status"||$_smarty_tpl->getVariable('action')->value=="edit_status"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
<?php if ('edit'){?>&id=<?php echo $_smarty_tpl->getVariable('ticket_status')->value['id'];?>
<?php }?>" method="post">
    <table>
        <tr>
            <td width="200">Название</td>
            <td><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('ticket_status')->value['title'];?>
" /></td>
        </tr>
        <tr>
            <td width="200">Рейтинг</td>
            <td><input name="data[rating]" value="<?php echo $_smarty_tpl->getVariable('ticket_status')->value['rating'];?>
" /></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

<?php }else{ ?>

<h4>Статусы заявок</h4>

<?php if ($_smarty_tpl->getVariable('ticket_status_list')->value!==false){?>
<table>
<?php  $_smarty_tpl->tpl_vars['ticket_status'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ticket_status_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ticket_status']->key => $_smarty_tpl->tpl_vars['ticket_status']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['ticket_status']->value['title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['ticket_status']->value['rating'];?>
</td>
        <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=edit_status&id=<?php echo $_smarty_tpl->tpl_vars['ticket_status']->value['id'];?>
">редактировать</a><br />
            <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=del_status&id=<?php echo $_smarty_tpl->tpl_vars['ticket_status']->value['id'];?>
">удалить</a> </td>
    </tr>
<?php }} ?>
</table>
<?php }?>

<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=add_status">добавить статус заявки</a>

<hr width="100%" size="1" />

<h4>Заявки</h4>

<?php if ($_smarty_tpl->getVariable('ticket_list')->value!==false){?>
<table>
<?php  $_smarty_tpl->tpl_vars['ticket'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ticket_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->key => $_smarty_tpl->tpl_vars['ticket']->value){
?>
    <tr style="background-color: <?php if ($_smarty_tpl->tpl_vars['ticket']->value['is_complete']){?>#ccffcc<?php }else{ ?>#ffd2ba<?php }?>">
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ticket']->value['date'],"%d.%m.%Y %H:%M");?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['ticket']->value['reu_title'];?>
</td>
        <td><?php echo smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['ticket']->value['title']),30,'');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value['status'];?>
</td>
        <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=view_ticket&id=<?php echo $_smarty_tpl->tpl_vars['ticket']->value['id'];?>
&reu_id=<?php echo $_smarty_tpl->tpl_vars['ticket']->value['reu_id'];?>
">ответить</a><br /> </td>
    </tr>
<?php }} ?>
</table>
<?php }?>

<br />
<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=question">Задать вопрос</a>

<?php }?>