<?php /* Smarty version Smarty-3.1.7, created on 2019-08-24 14:30:52
         compiled from "C:\xampp\htdocs\kass\application\views\show_usergroup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7735d612dfc0cef05-54162848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8da4fe2afb73c7263ee217d211a59601d9a0a9c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\show_usergroup.tpl',
      1 => 1561016592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7735d612dfc0cef05-54162848',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_name' => 0,
    'id' => 0,
    'usergroup_fields' => 0,
    'usergroup_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d612dfc200c7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d612dfc200c7')) {function content_5d612dfc200c7($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="usergroup"><span class="fa fa-list"></span> Listing</a>
            <a class="btn btn-sm btn-success" href="usergroup/create/"> <span class="fa fa-plus"></span> New record</a>

            <h3>Details of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
, record #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</h3>

            <table class="table table-responsive" width="50%">
                <thead>
                <th width="20%">Field</th>
                <th>Value</th>
                </thead>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_data']->value['id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_user_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_data']->value['group_user_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_data']->value['group_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_created_by'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_data']->value['group_created_by'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_remark'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_data']->value['group_remark'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_fields']->value['group_created_date'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup_data']->value['group_created_date'];?>
</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="usergroup/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <span class="fa fa-edit"></span> Edit record
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
<?php }} ?>