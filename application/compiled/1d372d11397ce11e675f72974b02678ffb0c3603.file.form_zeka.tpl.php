<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 16:17:03
         compiled from "C:\xampp\htdocs\kass\application\views\form_zeka.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147395d9f3d5f6bd233-75105978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d372d11397ce11e675f72974b02678ffb0c3603' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_zeka.tpl',
      1 => 1562149820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147395d9f3d5f6bd233-75105978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'zeka_fields' => 0,
    'zeka_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f3d5f79b2e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f3d5f79b2e')) {function content_5d9f3d5f79b2e($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-body">
     
        <a class="btn btn-sm btn-warning" href="zeka"> <span class="fa fa-list"></span>  Listing</a>
        <a class="btn btn-success btn-sm" href="zeka/create/"> <span class="fa fa-plus"></span> New record</a>
        
        <div class="inner">
            <?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>
            <h3>Add new record</h3>
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

            <form class="form" method='post' action='zeka/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                
               <div class="form-group">
                <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['amount'];?>
<span class="error">*</span></label>
                <div>
                   <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['amount'];?>
<?php }?>" name="amount" />
               </div>
               
           </div>
           
           <div class="form-group">
            <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['Year'];?>
<span class="error">*</span></label>
            <div>
               <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['Year'];?>
<?php }?>" name="Year" />
           </div>
           
       </div>
       
       <div class="form-group">
        <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['is_paid'];?>
<span class="error">*</span></label>
        <div>
           <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['is_paid'];?>
<?php }?>" name="is_paid" />
       </div>
       
   </div>
   
   <div class="form-group">
    <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['percent'];?>
<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['percent'];?>
<?php }?>" name="percent" />
   </div>
   
</div>

<div class="form-group">
    <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['date_paid'];?>
<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['date_paid'];?>
<?php }?>" name="date_paid" />
   </div>
   
</div>

<div class="form-group">
    <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['date_calculated'];?>
<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['date_calculated'];?>
<?php }?>" name="date_calculated" />
   </div>
   
</div>

<div class="form-group">
    <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['remark'];?>
<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['remark'];?>
<?php }?>" name="remark" />
   </div>
   
</div>

<div class="form-group">
    <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['calculated_by'];?>
<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['calculated_by'];?>
<?php }?>" name="calculated_by" />
   </div>
   
</div>

<div class="form-group">
    <label><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['paid_by'];?>
<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['zeka_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['zeka_data']->value['paid_by'];?>
<?php }?>" name="paid_by" />
   </div>
   
</div>


<div class="form-group button-actions box-footer">
    <div class="col-md-offset-4 col-md-6">
        <button class="btn btn-success" type="submit">
           Save
       </button>
       <span class="text_button_padding">or</span>
       <a class="btn btn-default link_button" href="javascript:window.history.back();">Cancel</a>
   </div>
</div>
</form>
</div><!-- .inner -->
</div><!-- .content -->
</div><!-- .block -->
<?php }} ?>