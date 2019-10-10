<?php /* Smarty version Smarty-3.1.7, created on 2019-07-16 13:36:08
         compiled from "C:\xampp\htdocs\kass\application\views\show_sales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:220125d2da8988a3653-79508488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '855fc49f84e762be75f9ed6256b45a49bab5ec80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\show_sales.tpl',
      1 => 1563052585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220125d2da8988a3653-79508488',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'id' => 0,
    'sales_fields' => 0,
    'sales_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d2da898a0209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d2da898a0209')) {function content_5d2da898a0209($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="sales"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="sales/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>


            <h3>
                <?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='english'){?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sale_itm_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['sale_itm_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sale_item_amount'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['sale_item_amount'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['Date_sold'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['Date_sold'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['soled_by'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['soled_by'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sale_remark'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['sale_remark'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sold_price'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['sold_price'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sale_payment_option'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['sale_payment_option'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sale_buyer_info'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['sale_buyer_info'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['Sale_sub_total'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['Sale_sub_total'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sale_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['sales_data']->value['sale_id'];?>
</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="sales/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <span class="fa fa-edit"></span> <?php echo lang('edit_record');?>

                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>