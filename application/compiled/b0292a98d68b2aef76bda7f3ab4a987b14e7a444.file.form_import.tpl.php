<?php /* Smarty version Smarty-3.1.7, created on 2019-10-17 11:08:27
         compiled from "C:\xampp\htdocs\kass\application\views\form_import.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81675da82f8b40bd68-36989975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0292a98d68b2aef76bda7f3ab4a987b14e7a444' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_import.tpl',
      1 => 1563179298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81675da82f8b40bd68-36989975',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'import_fields' => 0,
    'related_items' => 0,
    'rel' => 0,
    'import_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5da82f8b4926e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5da82f8b4926e')) {function content_5da82f8b4926e($_smarty_tpl) {?>   <div class="panel panel-default">
                   <div class="panel-body">
                      
                           <a class="btn btn-sm btn-warning" href="import"> 
                           <span class="fa fa-list"></span>  <?php echo lang('listing');?>
</a>
                           <a class="btn btn-success btn-sm" href="import/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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
                                   <div class="alert alert-danger">
                                       <p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
                                   </div>
                               </div>
                           <?php }?>
                           <form class="form" method='post' action='import/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">
                               
       	<div class="form-group">
               <label><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_id'];?>
<span class="error">*</span> </label>
       		<select class="form-control"  required="required"  name="imp_item_id" >
                   <option value=""><?php echo lang('choose_item');?>
</option>
                   <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                       <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['items_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['import_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['import_data']->value['imp_item_id']==$_smarty_tpl->tpl_vars['rel']->value['items_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['items_name'];?>
</option>
                   <?php } ?>
           	</select>
       		
           </div>
       
       	<!-- <div class="form-group">
               <label><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sold_amount'];?>
<span class="error">*</span></label>
       		<div>
       	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['import_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_sold_amount'];?>
<?php }?>" name="imp_sold_amount" />
       		</div>
       		
       	</div> -->
       
       	<div class="form-group">
               <label><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_amount'];?>
<span class="error">*</span></label>
       		<div>
       	       	<input class="form-control" required="required" type="number" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['import_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_item_amount'];?>
<?php }?>" name="imp_item_amount" />
       		</div>
       		
       	</div>
       
         <div class="form-group">
               <label><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sale_itm_unit_price'];?>
<span class="error">*</span></label>
       		<div>
       	       	<input class="form-control" type="number" step="0.001" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['import_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_sale_itm_unit_price'];?>
<?php }?>" name="imp_sale_itm_unit_price" />
       		</div>
       		
       	</div> 
      
       
       	<div class="form-group">
               <label><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_min_sale_price'];?>
</label>
       		<div>
       	       	<input class="form-control" required="required" type="number" step="0.001" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['import_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_min_sale_price'];?>
<?php }?>" name="imp_min_sale_price" />
       		</div>
       		
       	</div>
       
       	<div class="form-group">
               <label><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sub_total'];?>
<span class="error">*</span></label>
       		<div>
       	       	<input readonly="readonly" class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['import_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_sub_total'];?>
<?php }?>" name="imp_sub_total" />
       		</div>
       		
       	</div>
       
       	<div class="form-group">
               <label><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_date'];?>
<span class="error">*</span></label>
       		<div>
       	       	<input class="datepicker form-control" required="required" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['import_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_date'];?>
<?php }?>" name="imp_date" />
       		</div>
       		
       	</div>
       
          	<div class="form-group">
           <label><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_remark'];?>
<span class="error">*</span></label>
       		<div>
       	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['import_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['import_data']->value['imp_remark'];?>
<?php }?>" name="imp_remark" />
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