<?php /* Smarty version Smarty-3.1.7, created on 2019-08-23 19:56:01
         compiled from "C:\xampp\htdocs\kass\application\views\form_credit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185965d3840ae43ba92-63564923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8460bff69134f731f9109a7e2dba2a57972bbcb4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_credit.tpl',
      1 => 1563028124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185965d3840ae43ba92-63564923',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d3840ae5ea85',
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'credit_fields' => 0,
    'credit_data' => 0,
    'related_items' => 0,
    'rel' => 0,
    'metadata' => 0,
    'e' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d3840ae5ea85')) {function content_5d3840ae5ea85($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-body">
        <a class="btn btn-sm btn-warning" href="credit"> <span class="fa fa-liist"></span> <?php echo lang('listing');?>
</a>
        <a class="btn btn-success btn-sm" href="credit/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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

            <form class="form" method='post' action='credit/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
                  enctype="multipart/form-data">

                <div class="col-lg-12" style="margin-top:20px">
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_full_name'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_full_name'];?>
<?php }?>"
                                       name="cr_full_name"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_product'];?>
<span class="error">*</span></label>
                            <select class="field form-control select addr" name="cr_product">
                                <option value="0"> choose Item to Give</option>
                                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['items_id'];?>
"
                            <?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['credit_data']->value['cr_product']==$_smarty_tpl->tpl_vars['rel']->value['items_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['items_name'];?>
</option>
                                <?php } ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_unit_price'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="number" step="0.001" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_unit_price'];?>
<?php }?>"
                                       name="cr_unit_price"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_quantity'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="number" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_quantity'];?>
<?php }?>"
                                       name="cr_quantity"/>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_total_credit'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_total_credit'];?>
<?php }?>"
                                       name="cr_total_credit"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_phone_number'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_phone_number'];?>
<?php }?>"
                                       name="cr_phone_number"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_address'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_address'];?>
<?php }?>"
                                       name="cr_address"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_given_date'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control datepicker" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_given_date'];?>
<?php }?>"
                                       name="cr_given_date"/>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_customer_gender'];?>
<span class="error">*</span></label>

                            <select class="field form-control select addr" name="cr_customer_gender">
                                <option value="0"></option>
                                <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['metadata']->value['cr_customer_gender']['enum_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
$_smarty_tpl->tpl_vars['e']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['e']->key;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['e']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value['cr_customer_gender'])){?><?php if ($_smarty_tpl->tpl_vars['credit_data']->value==$_smarty_tpl->tpl_vars['metadata']->value['cr_customer_gender']['enum_names'][$_smarty_tpl->tpl_vars['k']->value]){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['metadata']->value['cr_customer_gender']['enum_names'][$_smarty_tpl->tpl_vars['k']->value];?>
</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_return_date'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control datepicker" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_return_date'];?>
<?php }?>"
                                       name="cr_return_date"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_actual_return_date'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control datepicker" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_actual_return_date'];?>
<?php }?>"
                                       name="cr_actual_return_date"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_remark'];?>
<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['credit_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['credit_data']->value['cr_remark'];?>
<?php }?>" name="cr_remark"/>
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