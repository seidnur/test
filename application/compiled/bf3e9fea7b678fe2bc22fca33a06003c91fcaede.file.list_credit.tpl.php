<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 15:59:17
         compiled from "C:\xampp\htdocs\kass\application\views\list_credit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171625d9f393563c730-39877177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf3e9fea7b678fe2bc22fca33a06003c91fcaede' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\list_credit.tpl',
      1 => 1562018476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171625d9f393563c730-39877177',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'credit_data' => 0,
    'credit_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f39356e01c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f39356e01c')) {function content_5d9f39356e01c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="credit"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="credit/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>
            <h3>
                <?php if ($_smarty_tpl->tpl_vars['selected_language']->value=='english'){?>
                    <?php echo lang('listing');?>
 <?php echo lang('of');?>
 <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>

                <?php }elseif($_smarty_tpl->tpl_vars['selected_language']->value=='amharic'){?>
                               <?php echo lang('of');?>
<?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
 <?php echo lang('listing');?>
  
                <?php }?>      </h3>
            <?php if (!empty($_smarty_tpl->tpl_vars['credit_data']->value)){?>
                <form action="credit/delete" method="post" id="listing_form">
                    <table class="table table-responsive table-condensed">
                        <thead>
                        <th width="20"></th>
			<th><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_full_name'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_product'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_unit_price'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_quantity'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_total_credit'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_given_date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_return_date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['credit_fields']->value['cr_status'];?>
</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['credit_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cr_id'];?>
"/></td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['cr_full_name'];?>
</td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['cr_product'];?>
</td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['cr_unit_price'];?>
</td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['cr_quantity'];?>
</td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['cr_total_credit'];?>
</td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['cr_given_date'];?>
</td>
				<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['cr_return_date'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cr_status'];?>
</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="credit/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['cr_id'];?>
"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="credit/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['cr_id'];?>
"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('credit/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['cr_id'];?>
')"><span class="fa fa-trash-o"></span></a>
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
    

                  <?php echo lang('no_record_found');?>
.
            <?php }?>

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>