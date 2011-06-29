<?php /* Smarty version Smarty-3.0.7, created on 2011-04-18 23:49:14
         compiled from "H:/www/gkh/private/smartytemplates/templates/reu/support.tpl" */ ?>
<?php /*%%SmartyHeaderCode:294654dac6b8a6bf433-36138295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bccf00ddb7975893584df89c2c95bd73e9a21716' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/reu/support.tpl',
      1 => 1303145352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294654dac6b8a6bf433-36138295',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'H:\www\gkh\private\classes\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'H:\www\gkh\private\classes\smarty\plugins\modifier.truncate.php';
?><h1>Техническая поддержка</h1>


<?php if ($_smarty_tpl->getVariable('action')->value=="question"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" enctype="multipart/form-data">
    <table>
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
</h2>
<div><?php echo $_smarty_tpl->getVariable('ticket')->value['title'];?>
</div>
<br />

<?php if ($_smarty_tpl->getVariable('ticket')->value['post_list']){?>
<table>
<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ticket')->value['post_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
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
<?php }} ?>
</table>
<?php }?>

<h4>Задать вопрос</h4>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
&id=<?php echo $_smarty_tpl->getVariable('ticket')->value['id'];?>
" method="post" enctype="multipart/form-data">
    <table>
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

<?php }else{ ?>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
" method="post" >
    <table>
        <tr>
            <td width="185">E-mail для тех. поддержки</td>
            <td><input name="data[email]" value="<?php echo $_smarty_tpl->getVariable('reu_info')->value['email'];?>
" /> </td>
        </tr> 
    </table>
    <input name="save" type="submit" value="Изменить e-mail" style="width: 150px;" />
</form> 
<br />

<?php if ($_smarty_tpl->getVariable('ticket_list')->value!==false){?>
<table>
<?php  $_smarty_tpl->tpl_vars['ticket'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ticket_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->key => $_smarty_tpl->tpl_vars['ticket']->value){
?>
    <tr style="background-color: <?php if ($_smarty_tpl->tpl_vars['ticket']->value['is_complete']){?>#ccffcc<?php }else{ ?>#ffd2ba<?php }?>" >
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ticket']->value['date'],"%d.%m.%Y %H:%M");?>
</td>
        <td><?php echo smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['ticket']->value['title']),30,'');?>
</td>
        <td><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=view_ticket&id=<?php echo $_smarty_tpl->tpl_vars['ticket']->value['id'];?>
">просмотреть</a><br /> </td>
    </tr>
<?php }} ?>
</table>
<?php }?>

<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=question">Задать вопрос</a>

<?php }?>