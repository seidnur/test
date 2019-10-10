<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 10:53:54
         compiled from "C:\xampp\htdocs\kass\application\views\show_employee.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217025d60fb22eeae40-98204051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c96ad6e2f8388c2eb91f1ced3c7f1afc524cc99' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\show_employee.tpl',
      1 => 1563053570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217025d60fb22eeae40-98204051',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'id' => 0,
    'employee_fields' => 0,
    'employee_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d60fb23041a8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d60fb23041a8')) {function content_5d60fb23041a8($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="employee"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="employee/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_user_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_user_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_first_name'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_first_name'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_middle_name'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_middle_name'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_last_name'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_last_name'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_gender'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_gender'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_birth_date'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_birth_date'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_hire_date'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_hire_date'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_created_by'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_created_by'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_date_created'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_date_created'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_remark'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_remark'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_salary'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_salary'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_phone'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_phone'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_email'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_email'];?>
</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="employee/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <span class="fa fa-edit"></span> <?php echo lang('edit_record');?>

                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>