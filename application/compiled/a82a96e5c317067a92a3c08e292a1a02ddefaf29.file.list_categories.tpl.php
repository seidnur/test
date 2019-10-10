<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 15:53:37
         compiled from "C:\xampp\htdocs\kass\application\views\list_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18305d9f37e1b87d00-51486643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a82a96e5c317067a92a3c08e292a1a02ddefaf29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\list_categories.tpl',
      1 => 1563085436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18305d9f37e1b87d00-51486643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'categories_data' => 0,
    'categories_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f37e1bcb52',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f37e1bcb52')) {function content_5d9f37e1bcb52($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="categories"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="categories/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>
            
            <h3>
                <?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='english'){?>
                    <?php echo lang('listing');?>
 <?php echo lang('of');?>
 <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>

                <?php }elseif($_smarty_tpl->tpl_vars['selected_language']->value=='amharic'){?>
                    <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
 <?php echo lang('listing');?>
  
                <?php }?>      
                </h3>          
                  <?php if (!empty($_smarty_tpl->tpl_vars['categories_data']->value)){?>
                <form action="categories/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20" class=" hidden-xs hidden-sm"></th>
                        <th title="Name of category"><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_name'];?>
</th>
                        <th title="Description of Category"><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_desc'];?>
</th>
                        <th title="Date of registration"><?php echo $_smarty_tpl->tpl_vars['categories_fields']->value['cat_created_date'];?>
</th>

                        <th title="Manage categories" width="80">Actions</th>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td class=" hidden-xs hidden-sm">
                                <input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
"/></td>
                                <td title="<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
" class="text-capitalize"><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
</td>
                                <td title="<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_desc'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_desc'];?>
</td>
                                <td title="<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_created_date'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_created_date'];?>
</td>

                                <td width="80">
                                    <a title="view details of <?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
" class="btn btn-xs btn-info" href="categories/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
"><span
                                                class="fa fa-eye"></span></a>
                                    <a title="Edit details of <?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
"  class="btn btn-xs btn-warning" href="categories/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
"><span
                                                class="fa fa-edit"></span></a>
                                    <a title="Delete Category: <?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
"  class="btn btn-xs btn-danger"
                                       href="javascript:chk('categories/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
')"><span
                                                class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-danger" type="submit">
                               <?php echo lang('delete_selected');?>

                            </button>
                        </div>
                        <div class="pagination">
                            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                        </div>
                    </div>
                </form>
            <?php }else{ ?>
                <?php echo lang('no_records_found');?>

            <?php }?>

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>