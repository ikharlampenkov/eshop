<?php /* Smarty version Smarty-3.0.7, created on 2012-07-16 21:36:03
         compiled from "F:/www/eshop/private/smartytemplates/templates/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4008500426d39d1db6-66243938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7234300a979d00e07f5b3ed8a7bbf1b8dd195ad' => 
    array (
      0 => 'F:/www/eshop/private/smartytemplates/templates/catalog.tpl',
      1 => 1342449358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4008500426d39d1db6-66243938',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('action')->value=='good'){?>

    <?php if (count($_smarty_tpl->getVariable('path')->value)>1){?>
    <div class="nav_menu">
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
            <?php if (!$_smarty_tpl->getVariable('prub')->value->isRoot){?>
                <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('prub')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('prub')->value->title;?>
</a> /
            <?php }?>
        <?php }} ?>

        <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('cur_rubric')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('cur_rubric')->value->title;?>
</a>
    </div>
    <?php }?>

<table>
    <tr>
        <td width="150">
            <?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?><img src="<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
"/><?php }?>
        </td>
        <td>
            <h1><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</h1>

            <p style='font-size: 14px;'><?php echo nl2br($_smarty_tpl->getVariable('product')->value->fullText);?>
</p>


            <?php if ($_smarty_tpl->getVariable('productToneList')->value!==false){?>
                <p style='font-size: 14px;'><b>Выберите тон:</b></p>
                <?php  $_smarty_tpl->tpl_vars['tone'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productToneList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tone']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tone']->key => $_smarty_tpl->tpl_vars['tone']->value){
 $_smarty_tpl->tpl_vars['tone']->index++;
 $_smarty_tpl->tpl_vars['tone']->first = $_smarty_tpl->tpl_vars['tone']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_tone']['first'] = $_smarty_tpl->tpl_vars['tone']->first;
?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['_tone']['first']){?>
                        <div class="tone-big">
                            <ul id='tons'>
                                <li><img name='img_name' src='<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
files/<?php echo $_smarty_tpl->getVariable('tone')->value->img->getName();?>
'></li>
                                <li>
                                    <div id='ton_text'><span>Тон: <?php echo $_smarty_tpl->getVariable('tone')->value->title;?>
</span></div>
                                </li>
                            </ul>
                        </div>
                    <?php }?>
                <?php }} ?>

                <p style='width: 31em; margin-top: 5px;'>
                    <?php  $_smarty_tpl->tpl_vars['tone'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productToneList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tone']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tone']->key => $_smarty_tpl->tpl_vars['tone']->value){
 $_smarty_tpl->tpl_vars['tone']->index++;
 $_smarty_tpl->tpl_vars['tone']->first = $_smarty_tpl->tpl_vars['tone']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_tone']['first'] = $_smarty_tpl->tpl_vars['tone']->first;
?>
                        <img class='ton_input' id='ton_<?php echo $_smarty_tpl->getVariable('tone')->value->id;?>
' name='ton_<?php echo $_smarty_tpl->getVariable('tone')->value->id;?>
' onclick='f_ton(<?php echo $_smarty_tpl->getVariable('tone')->value->id;?>
)' pk_ton="<?php echo $_smarty_tpl->getVariable('tone')->value->id;?>
" text="Тон: <?php echo $_smarty_tpl->getVariable('tone')->value->title;?>
" src='<?php echo $_smarty_tpl->getVariable('siteurl')->value;?>
files/<?php echo $_smarty_tpl->getVariable('tone')->value->img->getName();?>
'/>
                    <?php }} ?>
                </p>
            <?php }?>

            <p style='font-size: 14px;'><b> Цена:</b> <?php echo $_smarty_tpl->getVariable('product')->value->price;?>
</p>

            <p style="">
                <input type="text" id="product_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" name="product_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" value="" style="width: 50px;"/>
                <input type="hidden" id="tone" name="tone" value="<?php if ($_smarty_tpl->getVariable('productToneList')->value!==false){?><?php echo $_smarty_tpl->getVariable('productToneList')->value[0]->id;?>
<?php }else{ ?>0<?php }?>"/>
                <button onclick="addToChartS(<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
)"> Заказать</button>
            </p>
        </td>
    </tr>
</table>

    <?php }else{ ?>

    <?php if (count($_smarty_tpl->getVariable('path')->value)>1){?>
    <div class="nav_menu">
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
            <?php if (!$_smarty_tpl->getVariable('prub')->value->isRoot){?>
                <a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('prub')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('prub')->value->title;?>
</a> <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['_prub']['last']){?>/<?php }?>
            <?php }?>
        <?php }} ?>
    </div>
    <?php }?>

    <?php if (!$_smarty_tpl->getVariable('cur_rubric')->value->isRoot){?>
    <h1><?php echo $_smarty_tpl->getVariable('cur_rubric')->value->title;?>
</h1>
    <?php }?>

<div class="rubric-block">
    <?php if ($_smarty_tpl->getVariable('rubric_list')->value){?>
        <ul class="tree">
            <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                <li class="rubric"><a href="?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&rubric=<?php echo $_smarty_tpl->getVariable('rubric')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a></li>
            <?php }} ?>
        </ul>
    </div><br/>
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('product_list')->value){?>

    <table>
    <tr>
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_product']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_product']['index']++;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['_product']['index']%2==0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['_product']['index']!=0){?></tr><tr><?php }?>

                <td>

                    <div class='prod_fieldset' style='margin: 0 12px 12px 0;'>
                        <table>
                            <tr>
                                <td rowspan=3 style='vertical-align: middle; height: 152px; width: 120px;'><?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?><img src='/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
' style='height: 150px; width: 105px;'/><?php }?></td>
                                <td style='color: #f68a2f; text-align: right; height: 24px;'></td>
                            </tr>
                            <tr>
                                <td style='font-size: 16px; height: 25px;'>
                                    <p><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</p>

                                    <p style='font-size: 14px;'><?php echo $_smarty_tpl->getVariable('product')->value->shortText;?>
</p>

                                    <p style='font-size: 14px;'><b> Цена:</b> <?php echo $_smarty_tpl->getVariable('product')->value->price;?>
</p>

                                    <p style=""><input type="text" id="product_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" name="product_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" value="" style="width: 50px;"/>
                                        <button onclick="addToChartS(<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
)"> Заказать</button>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style='font-size: 14px; text-align: right; vertical-align: top; height: 24px;'>
                                    <a class='tov_podr' href='?page=<?php echo $_smarty_tpl->getVariable('page')->value;?>
&action=good&id=<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
&rubric=<?php echo $_smarty_tpl->getVariable('product')->value->rubric->id;?>
'>подробнее&nbsp;<span style='color: #fba61a; font-size: 0.5em;'>&gt;</span></a>
                                </td>
                            </tr>
                        </table>
                    </div>

                </td>

        <?php }} ?>
    </tr>
    </table>

    <?php }?>
<?php }?>