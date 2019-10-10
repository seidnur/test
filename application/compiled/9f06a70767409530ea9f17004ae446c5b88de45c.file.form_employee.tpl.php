<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 10:53:59
         compiled from "C:\xampp\htdocs\kass\application\views\form_employee.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73035d60fb27ec6426-93409013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f06a70767409530ea9f17004ae446c5b88de45c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_employee.tpl',
      1 => 1563028158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73035d60fb27ec6426-93409013',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'employee_fields' => 0,
    'employee_data' => 0,
    'metadata' => 0,
    'e' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d60fb2800ab9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d60fb2800ab9')) {function content_5d60fb2800ab9($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-body">

        <a class="btn btn-sm btn-warning" href="employee"> <span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
        <a class="btn btn-success btn-sm" href="employee/create/"> <span class="fa fa-plus"></span><?php echo lang('new_record');?>
</a>

        <div class="inner">
            <?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>
            <h3><?php echo lang('new_record');?>
</h3>
            <?php }else{ ?>
            <h3><?php echo lang('edit_record');?>
: #<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
</h3>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>
            <div class="flash">
                <div class="alert alert-danger error">
                    <p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
                </div>
            </div>
            <?php }?>

            <form class="form" method='post' action='employee/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
            enctype="multipart/form-data">

            <div class="col-lg-12" style="margin-top:20px">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_first_name'];?>
<span class="error">*</span></label>
                        <div>
                            <input class="form-control" type="text" maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_first_name'];?>
<?php }?>"
                            name="emp_first_name"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_middle_name'];?>
<span class="error">*</span></label>
                        <div>
                            <input class="form-control" type="text" maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_middle_name'];?>
<?php }?>"
                            name="emp_middle_name"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_last_name'];?>
<span class="error">*</span></label>
                        <div>
                            <input class="form-control" type="text"  required maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_last_name'];?>
<?php }?>"
                            name="emp_last_name"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_gender'];?>
<span class="error">*</span></label>
                        <select class="form-control" name="emp_gender" required>
                            <option value="">Choose Gender</option>
                            <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['metadata']->value['emp_gender']['enum_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
$_smarty_tpl->tpl_vars['e']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['e']->key;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['e']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value['emp_gender'])){?><?php if ($_smarty_tpl->tpl_vars['employee_data']->value['emp_gender']==$_smarty_tpl->tpl_vars['metadata']->value['emp_gender']['enum_names'][$_smarty_tpl->tpl_vars['k']->value]){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['metadata']->value['emp_gender']['enum_names'][$_smarty_tpl->tpl_vars['k']->value];?>
</option>
                            <?php } ?>
                        </select>


                    </div>

                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_birth_date'];?>
<span class="error">*</span></label>
                        <div>
                            <input class="form-control datepicker bdate" type="text" maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_birth_date'];?>
<?php }?>"
                            name="emp_birth_date"/>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_hire_date'];?>
<span class="error">*</span></label>
                        <div>
                            <input class="form-control datepicker" type="text" required maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_hire_date'];?>
<?php }?>"
                            name="emp_hire_date"/>
                        </div>

                    </div>


                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_remark'];?>
<span class="error">*</span></label>
                        <div>
                            <input class="form-control" type="text" maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_remark'];?>
<?php }?>"
                            name="emp_remark"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_salary'];?>
</label>
                        <div>
                            <input class="form-control" type="number" maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_salary'];?>
<?php }?>"
                            name="emp_salary"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_phone'];?>
</label>
                        <div>
                            <input class="form-control" type="text" required maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_phone'];?>
<?php }?>"
                            name="emp_phone"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['emp_email'];?>
</label>
                        <div>
                            <input class="form-control" type="text" maxlength="255"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['emp_email'];?>
<?php }?>"
                            name="emp_email"/>
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group button-actions box-footer">
                <div class="col-md-offset-4 col-md-6">
                    <button class="btn btn-success" type="submit">
                        <?php echo lang('save');?>

                    </button>
                    <span class="text_button_padding"><?php echo lang('or');?>
</span>
                    <a class="btn btn-default link_button" href="javascript:window.history.back();"><?php echo lang('cancel');?>
</a>
                </div>
            </div>
        </form>
    </div><!-- .inner -->
</div><!-- .pane-body -->
</div><!-- .panel -->
<?php }} ?>