<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 10:53:38
         compiled from "C:\xampp\htdocs\kass\application\views\form_brands.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7625d60fb12abb332-75546013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06e43015a79e40cc7eba1efa4305bb47adabfa23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_brands.tpl',
      1 => 1563027998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7625d60fb12abb332-75546013',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'brands_fields' => 0,
    'brands_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d60fb12b5b0d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d60fb12b5b0d')) {function content_5d60fb12b5b0d($_smarty_tpl) {?><div class="panel panel-default">
                <div class="panel-body">
                  
                        <a class="btn btn-sm btn-warning" href="brands">
                         <span class="fa fa-list"></span>  <?php echo lang('listing');?>
</a>
                        <a class="btn btn-success btn-sm" href="brands/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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

                        <form class="form" method='post' action='brands/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['brands_fields']->value['brand_name'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['brands_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['brands_data']->value['brand_name'];?>
<?php }?>" name="brand_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['brands_fields']->value['brand_description'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['brands_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['brands_data']->value['brand_description'];?>
<?php }?>" name="brand_description" />
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