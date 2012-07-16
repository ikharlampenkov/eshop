<?php /* Smarty version Smarty-3.0.7, created on 2012-07-16 19:34:09
         compiled from "F:/www/eshop/private/smartytemplates/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:352450040a415abb62-97651137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f3a9ac595da20bc38421d4a9d1657572bdcef83' => 
    array (
      0 => 'F:/www/eshop/private/smartytemplates/templates/index.tpl',
      1 => 1341939840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '352450040a415abb62-97651137',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("share/head.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php if (isset($_smarty_tpl->getVariable('page',null,true,false)->value)&&!empty($_smarty_tpl->getVariable('page',null,true,false)->value)){?>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('page')->value).".tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <?php }else{ ?>

    <?php if ($_smarty_tpl->getVariable('bannerList')->value){?>
    <div id="myCarousel" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">

            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['banner']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
 $_smarty_tpl->tpl_vars['banner']->index++;
 $_smarty_tpl->tpl_vars['banner']->first = $_smarty_tpl->tpl_vars['banner']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_banner']['first'] = $_smarty_tpl->tpl_vars['banner']->first;
?>
                <div class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['_banner']['first']){?>active<?php }?> item">
                    <a href="?page=banner&id=<?php echo $_smarty_tpl->getVariable('banner')->value->id;?>
" title="">
                        <?php if ($_smarty_tpl->getVariable('banner')->value->img->getName()){?>
                            <img src="/files/<?php echo $_smarty_tpl->getVariable('banner')->value->img->getName();?>
" alt="<?php echo $_smarty_tpl->getVariable('banner')->value->title;?>
"/><?php }else{ ?>&nbsp;<?php }?>
                    </a>

                    <div class="carousel-caption">
                        <h4><?php echo $_smarty_tpl->getVariable('banner')->value->title;?>
</h4>
                    </div>
                </div>
            <?php }} ?>

        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
    <?php }?>

<?php }?>

<?php $_template = new Smarty_Internal_Template("share/foot.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>