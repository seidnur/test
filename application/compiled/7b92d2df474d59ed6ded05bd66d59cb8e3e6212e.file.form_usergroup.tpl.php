<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 14:25:07
         compiled from "C:\xampp\htdocs\kass\application\views\form_usergroup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:233705d612ca308e9c2-53174214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b92d2df474d59ed6ded05bd66d59cb8e3e6212e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_usergroup.tpl',
      1 => 1562045246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233705d612ca308e9c2-53174214',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'usergroup_fields' => 0,
    'related_users' => 0,
    'rel' => 0,
    'usergroup_data' => 0,
    'related_group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d612ca314f75',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d612ca314f75')) {function content_5d612ca314f75($_smarty_tpl) {?><div class="panel panel-default">
                <div class="panel-body">
                   
                        <a class="btn btn-sm btn-warning" href="usergroup"> <span class="fa fa-list"></span>  <?php echo lang('listing');?>
</a>
                        <a class="btn btn-success btn-sm" href="usergroup/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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

                        <form class="form" method='post' action='usergroup/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label ><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_user_id'];?>
<span class="error">*</span></label>
    		<select class="field form-control select addr" name="group_user_id" >
                <option value="0"></option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['users_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['usergroup_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['usergroup_data']->value['group_user_id']==$_smarty_tpl->tpl_vars['rel']->value['users_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['users_name'];?>
</option>
                <?php } ?>
        	</select>
    		
        </div>
    
    	<div class="form-group">
            <label ><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_id'];?>
<span class="error">*</span></label>
    		<select class=" form-control" name="group_id" >
                <option value=""><?php echo lang('choose_user');?>
</option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['group_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['usergroup_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['usergroup_data']->value['group_id']==$_smarty_tpl->tpl_vars['rel']->value['group_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['group_name'];?>
</option>
                <?php } ?>
        	</select>
    		
        </div>

    	<div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_remark'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['usergroup_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['usergroup_data']->value['group_remark'];?>
<?php }?>" name="group_remark" />
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