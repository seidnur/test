<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 15:58:41
         compiled from "C:\xampp\htdocs\kass\application\views\show_import.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314915d9f3911eb6c41-83486611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2afcb534b582b3b3c33227ee7c3d4e88598ebcaa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\show_import.tpl',
      1 => 1562049418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314915d9f3911eb6c41-83486611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'id' => 0,
    'import_fields' => 0,
    'import_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f391200193',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f391200193')) {function content_5d9f391200193($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
            <a class="btn btn-warning btn-sm" href="import"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="import/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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
                <thead>
                <th width="20%"><?php echo lang('field');?>
</th>
                <th><?php echo lang('value');?>
</th>
                </thead>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_item_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sold_amount'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_sold_amount'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_amount'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_item_amount'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_available_amount'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_available_amount'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sale_itm_unit_price'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_sale_itm_unit_price'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_min_sale_price'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_min_sale_price'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sub_total'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_sub_total'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_date'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_date'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_inserted_by'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_inserted_by'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_remark'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_remark'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_Last_updated_by'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_Last_updated_by'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_Last_update'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_Last_update'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_deleted'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_deleted'];?>
</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="import/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <span class="fa fa-edit"></span> <?php echo lang('edit_record');?>

                    </a>
                </div>
            </div>
    </div><!-- .body -->
</div><!-- .panel -->
<?php }} ?>