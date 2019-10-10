<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 14:00:55
         compiled from "C:\xampp\htdocs\kass\application\views\form_expense_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33085d6126f772fef9-52081231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bb0f0818a9aadb47fba220bb27e405b81c85277' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_expense_type.tpl',
      1 => 1563027874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33085d6126f772fef9-52081231',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'expense_type_fields' => 0,
    'expense_type_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d6126f7903ab',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6126f7903ab')) {function content_5d6126f7903ab($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-body">

        <a class="btn btn-sm btn-warning" href="expense_type"> <span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
        <a class="btn btn-success btn-sm" href="expense_type/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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

            <form class="form" method='post'
                  action='expense_type/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
                  enctype="multipart/form-data">


                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['expense_type_fields']->value['exp_type_name'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['expense_type_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['expense_type_data']->value['exp_type_name'];?>
<?php }?>"
                                       name="exp_type_name"/>
                            </div>

                        </div>
                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['expense_type_fields']->value['exp_type_remark'];?>
<span class="error">*</span></label>
                            <div>
                                <textarea cols="5" rows="5" class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['expense_type_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['expense_type_data']->value['exp_type_remark'];?>
<?php }?>"
                                          name="exp_type_remark"></textarea>
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