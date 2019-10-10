<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 10:53:48
         compiled from "C:\xampp\htdocs\kass\application\views\form_permission.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130645d60fb1c87fcf8-68045177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ab5e252bced76a4f59653e15de2ff918eacb921' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_permission.tpl',
      1 => 1562047220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130645d60fb1c87fcf8-68045177',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'permission_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d60fb1ca2153',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d60fb1ca2153')) {function content_5d60fb1ca2153($_smarty_tpl) {?><div class="panel panel-default">

    <div class="panel-body">
        <a href="group/create/" class="btn btn-success btn-sm">
            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo lang('new_record');?>

        </a>
        <a href="group/" class="btn btn-warning btn-sm">
            <i class="fa fa-list-ul" aria-hidden="true"></i> <?php echo lang('listing');?>

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
                    <div class="message error">
                        <p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
                    </div>
                </div>
            <?php }?>

            <form class="form-group" method='post'
                  action='permission/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
                  enctype="multipart/form-data">
                <input type="hidden" id="group" name="group" value="<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>">
                <label for="permission">Permissions</label>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th><?php echo lang('Module');?>
</th>
                        <th><?php echo lang('Create');?>
</th>
                        <th><?php echo lang('Update');?>
</th>
                        <th><?php echo lang('View');?>
</th>
                        <th><?php echo lang('Delete');?>
</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> <?php echo lang('Items');?>
</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createItem',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createItem">
                        </td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                   <?php if (in_array('updateItem',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked"
                                    <?php }?>
                                    value="Item">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewItem',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewItem">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteItem',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteItem">
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo lang('categories');?>
</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createCategory',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createCategory">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateCategory',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateCategory">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewCategory',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewCategory">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteCategory',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteCategory">
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo lang('import');?>
</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createImport',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createImport">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateImport',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updaImport">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewImport',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewImport">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteImport',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteImport">
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo lang('credit');?>
</td> 
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createCredit',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createCredit">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateCredit',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateCredit">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewCredit',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewCredit">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteCredit',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteCredit">
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo lang('expenses');?>
</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createExpense',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createExpense">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateExpense',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateExpense">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewExpense',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewExpense">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteExpense',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteExpense">
                        </td>
                    </tr>
                    <tr> 
                        <td><?php echo lang('employee');?>
</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createEmployee',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createEmployee">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateEmployee',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateEmployee">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewEmployee',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewEmployee">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteEmployee',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteEmployee">
                        </td>
                    </tr>
                   
                       <tr>
                        <td><?php echo lang('expense_type');?>
</td> 
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createExpenseType',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createExpenseType">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateExpenseType',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateExpenseType">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewExpenseType',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewExpenseType">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteExpenseType',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteExpenseType">
                        </td>
                    </tr>
                     <tr>
                        <td><?php echo lang('zeka');?>
</td> 
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createZeka',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createZeka">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateZeka',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateZeka">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewZeka',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewZeka">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteZeka',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteZeka">
                        </td>
                    </tr>
                     <tr>
                        <td><?php echo lang('brands');?>
</td>  
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createBrand',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createBrand">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateBrand',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateBrand">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewBrand',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewBrand">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteBrand',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteBrand">
                        </td>
                    </tr>
                      <tr>
                        <td><?php echo lang('sales');?>
</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createSale',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createSale">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateSale',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateSale">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                             <?php if (in_array('viewSale',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewSale">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteSale',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteSale">
                        </td>
                    </tr>
                      <tr>
                        <td><?php echo lang('group');?>
</td> 
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createGroup',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateGroup',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewGroup',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteGroup',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteGroup">
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo lang('usergroup');?>
</td> 
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createUserGroup',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createUserGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateUserGroup',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateUserGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewUserGroup',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewUserGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteUserGroup',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteUserGroup">
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo lang('users');?>
</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createUser',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createUser">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updateUser',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updateUser">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewUser',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewUser">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deleteUser',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deleteUser">
                        </td>
                    </tr>
                    
                    <tr>
                        <td> <?php echo lang('permission');?>
</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('createPermission',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="createPermission">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('updatePermission',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="updatePermission">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('viewPermission',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="viewPermission">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    <?php if (in_array('deletePermission',$_smarty_tpl->tpl_vars['permission_data']->value)){?> checked="checked" <?php }?>
                                   value="deletePermission">
                        </td>
                    </tr>

                      
                    </tbody>
                </table>
                <!-- /.box-body -->
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