<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 17:33:19
         compiled from "C:\xampp\htdocs\kass\application\views\form_items.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322085d9f4f3f27f691-42053849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68866f56cb1a0323a8a399ce9a98887c4679bae6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_items.tpl',
      1 => 1570713278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322085d9f4f3f27f691-42053849',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'items_fields' => 0,
    'items_data' => 0,
    'related_brands' => 0,
    'rel' => 0,
    'related_categories' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f4f3f2f564',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f4f3f2f564')) {function content_5d9f4f3f2f564($_smarty_tpl) {?><div class="panel panel-default">
                <div class="panel-body">
                  
                        <a class="btn btn-sm btn-warning" href="items"> <span class="fa fa-list"></span>  <?php echo lang('listing');?>
</a>
                        <a class="btn btn-success btn-sm" href="items/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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

                        <form class="form" method='post' action='items/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

              <div class="col-lg-12" style="margin-top:30px">
               <div class="col-lg-6">               
    	<div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['Itm_name'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['items_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['items_data']->value['Itm_name'];?>
<?php }?>" name="Itm_name" />
    		</div>
    		
    	</div>
    

    
    	    
    	    
    	<div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_remark'];?>
</label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['items_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_remark'];?>
<?php }?>" name="itm_remark" />
    		</div>
    		
    	</div>
    	</div>
    	<div class="col-lg-6">

    	<div class="form-group">
            <label ><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['brand_id'];?>
<span class="error">*</span></label>
    		<select class="form-control" name="brand_id" >
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['brands_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['items_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['items_data']->value['brand_id']==$_smarty_tpl->tpl_vars['rel']->value['brands_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['brands_name'];?>
</option>
                <?php } ?>
        	</select>
    		
        </div>
    
    	<div class="form-group">
            <label ><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_cat_id'];?>
<span class="error">*</span></label>
    		<select class="form-control" name="itm_cat_id" required>
                <option value="">choose category</option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['categories_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['items_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['items_data']->value['itm_cat_id']==$_smarty_tpl->tpl_vars['rel']->value['categories_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['categories_name'];?>
</option>
                <?php } ?>
        	</select>
    		
        </div>

    	<!-- <div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['items_fields']->value['itm_available_quantity'];?>
</label>
    		<div>
    	       	<input readonly="readonly" value="0" class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['items_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['items_data']->value['itm_available_quantity'];?>
<?php }?>" name="itm_available_quantity" />
    		</div>
    		
    	</div> -->
    </cdiv>
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