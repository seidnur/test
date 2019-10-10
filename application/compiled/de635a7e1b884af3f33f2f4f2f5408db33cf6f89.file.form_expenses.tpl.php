<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 10:59:53
         compiled from "C:\xampp\htdocs\kass\application\views\form_expenses.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255685d3887f70308c6-57828517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de635a7e1b884af3f33f2f4f2f5408db33cf6f89' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_expenses.tpl',
      1 => 1563028036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255685d3887f70308c6-57828517',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d3887f71af57',
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'expenses_fields' => 0,
    'related_expense_type' => 0,
    'rel' => 0,
    'expenses_data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d3887f71af57')) {function content_5d3887f71af57($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-body">

        <a class="btn btn-sm btn-warning" href="expenses"> <span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
        <a class="btn btn-success btn-sm" href="expenses/create/"> <span class="fa fa-plus"></span><?php echo lang('new_record');?>
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

            <form class="form" method='post' action='expenses/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
                  enctype="multipart/form-data">

                <div class="col-lg-12" style="margin-top:20px">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['expenses_fields']->value['exp_reason_id'];?>
<span class="error">*</span></label>
                            <select class="field form-control select addr" name="exp_reason_id">
                                <option value="0">choose expense type</option>
                                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_expense_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['expense_type_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['expenses_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['expenses_data']->value['exp_reason_id']==$_smarty_tpl->tpl_vars['rel']->value['expense_type_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['expense_type_name'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['expenses_fields']->value['year'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['expenses_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['expenses_data']->value['year'];?>
<?php }?>" name="year"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['expenses_fields']->value['Month'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['expenses_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['expenses_data']->value['Month'];?>
<?php }?>" name="Month"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['expenses_fields']->value['amount'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['expenses_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['expenses_data']->value['amount'];?>
<?php }?>" name="amount"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['expenses_fields']->value['paid'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['expenses_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['expenses_data']->value['paid'];?>
<?php }?>" name="paid"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['expenses_fields']->value['remark'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['expenses_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['expenses_data']->value['remark'];?>
<?php }?>" name="remark"/>
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