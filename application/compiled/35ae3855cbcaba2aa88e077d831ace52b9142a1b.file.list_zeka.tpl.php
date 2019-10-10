<?php /* Smarty version Smarty-3.1.7, created on 2019-10-10 16:16:58
         compiled from "C:\xampp\htdocs\kass\application\views\list_zeka.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200985d9f3d5ab72d64-06116129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35ae3855cbcaba2aa88e077d831ace52b9142a1b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\list_zeka.tpl',
      1 => 1563030252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200985d9f3d5ab72d64-06116129',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_language' => 0,
    'zeka_data' => 0,
    'zeka_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d9f3d5abe826',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d9f3d5abe826')) {function content_5d9f3d5abe826($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="zeka"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="zeka/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['zeka_data']->value)){?>
                <form action="zeka/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
                        			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['zeka_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['amount'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['Year'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['is_paid'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['percent'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['date_paid'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['date_calculated'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['remark'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['calculated_by'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['zeka_fields']->value['paid_by'];?>
</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['zeka_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="<?php echo $_smarty_tpl->tpl_vars['row']->value['zeka_id'];?>
"/></td>
                                				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['zeka_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['amount'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['Year'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['is_paid'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['percent'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['date_paid'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['date_calculated'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['remark'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['calculated_by'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['paid_by'];?>
</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="zeka/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['zeka_id'];?>
"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="zeka/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['zeka_id'];?>
"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('zeka/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['zeka_id'];?>
')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-default" type="submit">
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