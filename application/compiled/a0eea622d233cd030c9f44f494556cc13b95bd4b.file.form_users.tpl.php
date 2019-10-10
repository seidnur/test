<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 14:25:30
         compiled from "C:\xampp\htdocs\kass\application\views\form_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:282845d612cba2d0c40-91139024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0eea622d233cd030c9f44f494556cc13b95bd4b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_users.tpl',
      1 => 1563032766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '282845d612cba2d0c40-91139024',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'users_fields' => 0,
    'users_data' => 0,
    'related_employee' => 0,
    'rel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d612cba33b24',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d612cba33b24')) {function content_5d612cba33b24($_smarty_tpl) {?>    <div class="panel panel-default">
                    <div class="panel-body">
                            <a class="btn btn-sm btn-warning" href="users"> <span class="fa fa-list"></span>  <?php echo lang('listing');?>
</a>
                            <a class="btn btn-success btn-sm" href="users/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>
                        <div class="inner">
                            <?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>
                                <h3><?php echo lang('create_record');?>
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
                            <form class="form" method='post' action='users/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">
    <div class="col-lg-12" style="margin-top:20px">
                                <div class="col-lg-6">
        	<div class="form-group">
                <label><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['user_name'];?>
<span class="error">*</span></label>
        		<div>
        	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['user_name'];?>
<?php }?>" name="user_name" />
        		</div>
        	</div>
        	<div class="form-group">
                <label><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['user_password'];?>
<span class="error">*</span></label>
        		<div>
        	       	<input class="form-control"  type="password" maxlength="255" autocomplete="new-password" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['user_password'];?>
<?php }?>" name="user_password" />
        		</div>
        	</div>
        	<div class="form-group">
                <label ><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['user_emp_id'];?>
<span class="error">*</span></label>
        		<select class="field form-control select addr" name="user_emp_id" >
                    <option value="0"></option>
                    <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_employee']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['employee_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['users_data']->value['user_emp_id']==$_smarty_tpl->tpl_vars['rel']->value['employee_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['employee_name'];?>
</option>
                    <?php } ?>
            	</select>
            </div>
            </div>
            <div class="col-lg-6">
         	<div class="form-group">
                <label><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['user_remark'];?>
<span class="error">*</span></label>
        		<div>
        	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['user_remark'];?>
<?php }?>" name="user_remark" />
        		</div>
        	</div>
        	<div class="form-group">
                <label><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['user_accout_status'];?>
</label>
        		<div>
        	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['user_accout_status'];?>
<?php }?>" name="user_accout_status" />
        		</div>
        	</div>
        	<div class="form-group">
                <label><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['user_email'];?>
</label>
        		<div>
        	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['user_email'];?>
<?php }?>" name="user_email" />
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
                    </div><!-- .content -->
                </div><!-- .block -->
<?php }} ?>