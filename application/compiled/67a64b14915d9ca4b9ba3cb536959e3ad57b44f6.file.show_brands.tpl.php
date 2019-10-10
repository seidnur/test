<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 15:55:12
         compiled from "C:\xampp\htdocs\kass\application\views\show_brands.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76135d9f3840e52a75-39045564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a64b14915d9ca4b9ba3cb536959e3ad57b44f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\show_brands.tpl',
      1 => 1570714824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76135d9f3840e52a75-39045564',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'id' => 0,
    'brands_fields' => 0,
    'brands_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f3840ea8a6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f3840ea8a6')) {function content_5d9f3840ea8a6($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="brands">
                <span class="fa fa-plus"></span> <?php echo lang('listing');?>

            </a>
            <a class="btn btn-sm btn-success" href="brands/create/">
                <span class="fa fa-plus"></span> <?php echo lang('new_record');?>

            </a>

            <h3><?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='english'){?>
                    <?php echo lang('details');?>
 <?php echo lang('of');?>
 <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
 <?php echo lang('record');?>
 #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>

                <?php }elseif($_smarty_tpl->tpl_vars['selected_language']->value=='amharic'){?>
                    <?php echo lang('of');?>
<?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
 <?php echo lang('record');?>
 #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 <?php echo lang('details');?>

                <?php }?>
            </h3>

            <table class="table table-responsive" width="50%">
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['brands_fields']->value['brand_id'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['brands_data']->value['brand_id'];?>
</td>
                </tr>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['brands_fields']->value['brand_name'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['brands_data']->value['brand_name'];?>
</td>
                </tr>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['brands_fields']->value['brand_description'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['brands_data']->value['brand_description'];?>
</td>
                </tr>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['brands_fields']->value['brand_cat_id'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['brands_data']->value['brand_cat_id'];?>
</td>
                </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="brands/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <span class="fa fa-edit"></span> <?php echo lang('edit_record');?>

                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>