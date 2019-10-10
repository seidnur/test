<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 15:59:11
         compiled from "C:\xampp\htdocs\kass\application\views\show_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160445d9f392fce3043-76757231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ec69157ee04c9d37fdb70c9af5aab8c4b938c8e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\show_categories.tpl',
      1 => 1563053368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160445d9f392fce3043-76757231',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'id' => 0,
    'categories_fields' => 0,
    'categories_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f392fd46eb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f392fd46eb')) {function content_5d9f392fd46eb($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="categories"><span class="fa fa-list"></span> Listing</a>
            <a class="btn btn-sm btn-success" href="categories/create/"> <span class="fa fa-plus"></span> New record</a>

           <h3>
                <?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='english'){?>
                   <?php echo lang('details');?>
 <?php echo lang('of');?>
 <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
 <?php echo lang('record');?>
 #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>

                <?php }elseif($_smarty_tpl->tpl_vars['selected_language']->value=='amharic'){?>
                          <?php echo lang('of');?>
<?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
 <?php echo lang('record');?>
 #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 <?php echo lang('details');?>
  
                <?php }?>    
                </h3> 

            <table class="table table-responsive" width="50%">
               
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_data']->value['cat_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_name'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_data']->value['cat_name'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_desc'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_data']->value['cat_desc'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_created_by'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_data']->value['cat_created_by'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_remark'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_data']->value['cat_remark'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_deleted'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_data']->value['cat_deleted'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_created_date'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['categories_data']->value['cat_created_date'];?>
</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="categories/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <span class="fa fa-edit"></span> Edit record
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>