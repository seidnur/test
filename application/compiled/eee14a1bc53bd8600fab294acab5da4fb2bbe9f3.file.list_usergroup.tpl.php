<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 14:24:59
         compiled from "C:\xampp\htdocs\kass\application\views\list_usergroup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:295875d385ebd324f85-55426260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eee14a1bc53bd8600fab294acab5da4fb2bbe9f3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\list_usergroup.tpl',
      1 => 1563029814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295875d385ebd324f85-55426260',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d385ebd44f5d',
  'variables' => 
  array (
    'selected_language' => 0,
    'usergroup_data' => 0,
    'usergroup_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d385ebd44f5d')) {function content_5d385ebd44f5d($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="usergroup"><span class="fa fa-list"></span> Listing</a>
            <a class="btn btn-sm btn-success" href="usergroup/create/"> <span class="fa fa-plus"></span> New record</a>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['usergroup_data']->value)){?>
                <form action="usergroup/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
                        			
			<th><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_user_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_created_by'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_remark'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_created_date'];?>
</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergroup_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"/></td>
                                				
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['group_user_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['group_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['group_created_by'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['group_remark'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['group_created_date'];?>
</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="usergroup/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="usergroup/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('usergroup/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-danger" type="submit">
                                    Delete selected
                            </button>
                        </div>
                        <div class="pagination">
                            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                        </div>
                    </div>
                </form>
            <?php }else{ ?>
                No records found.
            <?php }?>

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>