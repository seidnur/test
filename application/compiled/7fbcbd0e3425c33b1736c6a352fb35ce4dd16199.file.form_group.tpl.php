<?php /* Smarty version Smarty-3.1.7, created on 2019-09-28 11:30:30
         compiled from "C:\xampp\htdocs\kass\application\views\form_group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:258515d8f2836e97a79-57740584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fbcbd0e3425c33b1736c6a352fb35ce4dd16199' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_group.tpl',
      1 => 1562043062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '258515d8f2836e97a79-57740584',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'group_fields' => 0,
    'group_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d8f28373502b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8f28373502b')) {function content_5d8f28373502b($_smarty_tpl) {?><div class="panel panel-default">
                <div class="panel-body">
                  
                        <a class="btn btn-sm btn-warning" href="group"> <span class="fa fa-list"></span>  <?php echo lang('listing');?>
</a>
                        <a class="btn btn-success btn-sm" href="group/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>
                    
                    <div class="inner">
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>
                            <h3><?php echo lang('new_record');?>
</h3>
                        <?php }else{ ?>
                            <h3>Edit record: #<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
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

        <form class="form" method='post' action='group/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['group_fields']->value['group_name'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['group_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['group_data']->value['group_name'];?>
<?php }?>" name="group_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['group_fields']->value['permission'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['group_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['group_data']->value['permission'];?>
<?php }?>" name="permission" />
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
                </div><!-- .panel-body -->
            </div><!-- .panel -->
<?php }} ?>