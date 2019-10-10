<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 15:59:03
         compiled from "C:\xampp\htdocs\kass\application\views\show_items.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175035d9f39273459d8-91884371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cde6e7b61282811476eeb21a24a869407ab9675a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\show_items.tpl',
      1 => 1570708014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175035d9f39273459d8-91884371',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'id' => 0,
    'items_fields' => 0,
    'items_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f39273b8c9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f39273b8c9')) {function content_5d9f39273b8c9($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="items"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="items/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['Itm_name'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['Itm_name'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_last_updated'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_last_updated'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_last_updated_by'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_last_updated_by'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_remark'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_remark'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['brand_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['brand_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_cat_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_cat_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['item_created_by'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['item_created_by'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_date_created'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_date_created'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_available_quantity'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_available_quantity'];?>
</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="items/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <span class="fa fa-edit"></span> <?php echo lang('edit_record');?>

                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>