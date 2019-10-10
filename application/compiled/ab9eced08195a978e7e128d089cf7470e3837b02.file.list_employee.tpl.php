<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 15:59:19
         compiled from "C:\xampp\htdocs\kass\application\views\list_employee.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182995d9f39378ac6f9-43931610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab9eced08195a978e7e128d089cf7470e3837b02' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\list_employee.tpl',
      1 => 1563024864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182995d9f39378ac6f9-43931610',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'employee_data' => 0,
    'employee_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f3937916e5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f3937916e5')) {function content_5d9f3937916e5($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="employee"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="employee/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>
        <h3>
                <?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='english'){?>
                    <?php echo lang('listing');?>
 <?php echo lang('of');?>
 <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>

                <?php }elseif($_smarty_tpl->tpl_vars['selected_language']->value=='amharic'){?>
                               <?php echo lang('of');?>
<?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
 <?php echo lang('listing');?>
  
                <?php }?>      </h3>
            <?php if (!empty($_smarty_tpl->tpl_vars['employee_data']->value)){?>
                <form action="employee/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
			<th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_full_name'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_gender'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_birth_date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_hire_date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_salary'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_phone'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_email'];?>
</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employee_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="<?php echo $_smarty_tpl->tpl_vars['row']->value['emp_user_id'];?>
"/></td>
				<td class="text-capitalize"><?php echo $_smarty_tpl->tpl_vars['row']->value['emp_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['emp_middle_name'];?>
  <?php echo $_smarty_tpl->tpl_vars['row']->value['emp_last_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['emp_gender'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['emp_birth_date'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['emp_hire_date'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['emp_salary'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['emp_phone'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['emp_email'];?>
</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="employee/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['emp_user_id'];?>
"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="employee/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['emp_user_id'];?>
"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('employee/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['emp_user_id'];?>
')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-danger" type="submit">
                                   <?php echo lang('delete_selected');?>

                            </button>
                        </div>
                        <div class="pagination">
                            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                        </div>
                    </div>
                </form>
            <?php }else{ ?>
                <?php echo lang('no_records_found');?>

            <?php }?>

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>