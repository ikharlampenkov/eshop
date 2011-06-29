<?php /* Smarty version Smarty-3.0.7, created on 2011-04-19 23:56:55
         compiled from "H:/www/gkh/private/smartytemplates/templates/reu/messaging.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187844dadbed7009dd4-80947556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '572a0201117949f5ca72310fbf366866a54f1e4e' => 
    array (
      0 => 'H:/www/gkh/private/smartytemplates/templates/reu/messaging.tpl',
      1 => 1303232002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187844dadbed7009dd4-80947556',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Рассылка универсальных сообщений</h1>

<?php if ($_smarty_tpl->getVariable('action')->value=="send_dept_message"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post">

    <table border="0">
        <tr>
            <td colspan="6"><b>Фильтр</b></td>
        </tr>
        <tr>
            <td>По улице: </td>
            <td><select name="filter[street][]" multiple="multiple">
                    <option value="">Все</option>
                <?php  $_smarty_tpl->tpl_vars['street'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('street_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['street']->key => $_smarty_tpl->tpl_vars['street']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['street']->value['street'];?>
" <?php if (!empty($_smarty_tpl->getVariable('cur_street',null,true,false)->value)&&in_array($_smarty_tpl->tpl_vars['street']->value['street'],$_smarty_tpl->getVariable('cur_street')->value)){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['street']->value['street'];?>
</option>
                <?php }} ?>
                </select></td>
            <td>По дому: </td>
            <td><input name="filter[house]" value="<?php echo $_smarty_tpl->getVariable('cur_house')->value;?>
" /></td>
            <td>По квартире:</td>
            <td><input name="filter[apartment]" value="<?php echo $_smarty_tpl->getVariable('cur_apartment')->value;?>
"/></td>
        </tr>
        <tr>
            <td>Выводить по: </td>
            <td>
                <select name="filter[rec_on_page]" id="rec_on_page"  >
                      <?php  $_smarty_tpl->tpl_vars['rop'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rec_on_page')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rop']->key => $_smarty_tpl->tpl_vars['rop']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['rop']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->getVariable('cur_rec_on_page')->value==$_smarty_tpl->tpl_vars['key']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['rop']->value;?>
</option>
                      <?php }} ?>
                </select>
            </td>
            <td>Выводить с: </td>
            <td colspan="3"><input name="filter[start_from]" <?php if ($_smarty_tpl->getVariable('cur_start_from')->value!=0){?>value="<?php echo $_smarty_tpl->getVariable('cur_start_from')->value;?>
"<?php }?> /></td>
        </tr>
        <tr>
            <td colspan="6"><input id="save" name="save" type="submit" value="Выбрать" /></td>
        </tr>
    </table>
</form>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post">

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

    <table border="1">
        <tr>
            <td width="25" align="center">&nbsp;</td>
            <td>лицевой счет</td>
            <td>сектор</td>
            <td>улица</td>
            <td>дом</td>
            <td>квартира</td>
            <td>фио</td>
            <td>телефон</td>
            <td>моб. телефон</td>
            <td>сумма долга</td>
            <td>сумма пени</td>
            <td>сумма долга c пеней</td>
            <td>кол-во мес</td>
        </tr>
<?php  $_smarty_tpl->tpl_vars['debt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dept_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['debt']->key => $_smarty_tpl->tpl_vars['debt']->value){
?>
        <tr>
            <td><input id="check" type="checkbox" name="data[debts][<?php echo $_smarty_tpl->tpl_vars['debt']->value['id'];?>
]" /></td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['personal_account'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['sector'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['street'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['house'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['apartment'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['fio'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['phone_number'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['mobile_phone_number'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['amount_debt'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['amount_penalty'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['amount_debt_w_penalties'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['number_months'];?>
</td>
        </tr>
<?php }} ?>
    </table>

    <br />
    <input id="save" name="save" type="submit" value="Разослать" />
</form>

<?php }elseif($_smarty_tpl->getVariable('action')->value=="send_message"){?>

<h2><?php echo $_smarty_tpl->getVariable('txt')->value;?>
</h2>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post">

    <table>
        <tr>
            <td colspan="6"><b>Фильтр</b></td>
        </tr>
        <tr>
            <td>По улице: </td>
            <td><select name="filter[street][]" multiple="multiple">
                    <option value="">Все</option>
                <?php  $_smarty_tpl->tpl_vars['street'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('street_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['street']->key => $_smarty_tpl->tpl_vars['street']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['street']->value['street'];?>
" <?php if (!empty($_smarty_tpl->getVariable('cur_street',null,true,false)->value)&&in_array($_smarty_tpl->tpl_vars['street']->value['street'],$_smarty_tpl->getVariable('cur_street')->value)){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['street']->value['street'];?>
</option>
                <?php }} ?>
                </select></td>
            <td>По дому: </td>
            <td><input name="filter[house]" value="<?php echo $_smarty_tpl->getVariable('cur_house')->value;?>
" /></td>
            <td>По квартире:</td>
            <td><input name="filter[apartment]" value="<?php echo $_smarty_tpl->getVariable('cur_apartment')->value;?>
"/></td>
        </tr>
        <tr>
            <td>Выводить по: </td>
            <td>
                <select name="filter[rec_on_page]" id="rec_on_page"  >
                      <?php  $_smarty_tpl->tpl_vars['rop'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rec_on_page')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rop']->key => $_smarty_tpl->tpl_vars['rop']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['rop']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->getVariable('cur_rec_on_page')->value==$_smarty_tpl->tpl_vars['key']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['rop']->value;?>
</option>
                      <?php }} ?>
                </select>
            </td>
            <td>Выводить с: </td>
            <td colspan="3"><input name="filter[start_from]" <?php if ($_smarty_tpl->getVariable('cur_start_from')->value!=0){?>value="<?php echo $_smarty_tpl->getVariable('cur_start_from')->value;?>
"<?php }?> /></td>
        </tr>
        <tr>
            <td colspan="6"><input id="save" name="save" type="submit" value="Выбрать" /></td>
        </tr>
    </table>
</form>

<form action="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post">

    <div>Сообщение</div>
    <textarea name="data[message]"></textarea>
    <br /><br />

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

    <table border="1">
        <tr>
            <td width="25" align="center">&nbsp;</td>
            <td>лицевой счет</td>
            <td>сектор</td>
            <td>улица</td>
            <td>дом</td>
            <td>квартира</td>
            <td>фио</td>
            <td>телефон</td>
            <td>моб. телефон</td>
            <td>сумма долга</td>
            <td>сумма пени</td>
            <td>сумма долга c пеней</td>
            <td>кол-во мес</td>
        </tr>
<?php  $_smarty_tpl->tpl_vars['debt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dept_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['debt']->key => $_smarty_tpl->tpl_vars['debt']->value){
?>
        <tr>
            <td><input id="check" type="checkbox" name="data[debts][<?php echo $_smarty_tpl->tpl_vars['debt']->value['id'];?>
]" /></td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['personal_account'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['sector'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['street'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['house'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['apartment'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['fio'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['phone_number'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['mobile_phone_number'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['amount_debt'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['amount_penalty'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['amount_debt_w_penalties'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['number_months'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['debt']->value['status_housing'];?>
</td>
        </tr>
<?php }} ?>
    </table>

    <input id="save" name="save" type="submit" value="Разослать" />
</form>

<?php }else{ ?>
<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=send_dept_message" >Разослать информацию о задолженности</a><br />

<a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=send_message" >Разослать сообщение</a><br />
<?php }?>