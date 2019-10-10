<?php /* Smarty version Smarty-3.1.7, created on 2019-08-23 19:55:13
         compiled from "C:\xampp\htdocs\kass\application\views\list_import.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172365d385b691788d9-29474292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8f293315c04e730cb229c7e0b07e57848779c6f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\list_import.tpl',
      1 => 1563975340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172365d385b691788d9-29474292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d385b692f6b0',
  'variables' => 
  array (
    'import_data' => 0,
    'import_fields' => 0,
    'row' => 0,
    'pager' => 0,
    'this_day_imports' => 0,
    'this_day' => 0,
    'this_week' => 0,
    'this_week_imports' => 0,
    'this_month' => 0,
    'this_year_imports' => 0,
    'this_year' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d385b692f6b0')) {function content_5d385b692f6b0($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="import"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="import/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>
            <h3> <?php echo lang(($_smarty_tpl->tpl_vars['table_name']->value));?>
</h3>
            <?php if (!empty($_smarty_tpl->tpl_vars['import_data']->value)){?>
                <form action="import/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20" class="hidden-xs hidden-sm"></th>

            <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_amount'];?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_available_amount'];?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sold_amount'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sale_itm_unit_price'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_min_sale_price'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sub_total'];?>
</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['import_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td class="hidden-xs hidden-sm"><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_id'];?>
"/></td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_date'];?>
</td>
				<td> <?php echo $_smarty_tpl->tpl_vars['row']->value['imp_item_id'];?>
 </td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_item_amount'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_available_amount'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_sold_amount'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_sale_itm_unit_price'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_min_sale_price'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_sub_total'];?>
</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="import/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_id'];?>
"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" title="" href="import/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_id'];?>
"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('import/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_id'];?>
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
                        <div class="pagination" style="margin:20px 0 2px 30px">
                            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                        </div>
                    </div>
                </form>
            <?php }else{ ?>
                <?php echo lang('no_record_found');?>

            <?php }?>
            <div class="inner">
                <hr>
                <div class="col-lg-12">
                    <div class="col-md-3">
                     <strong><?php echo lang('this_day_imports');?>
</strong>
                       <span class="badge"><?php echo $_smarty_tpl->tpl_vars['this_day_imports']->value;?>
</span>
                    </div>
                    <div class="col-md-3">
                        <strong>  <?php echo lang('this_week_imports');?>
</strong>
                    </div>

                    <div class="col-md-3">
                        <strong> <?php echo lang('this_month_imports');?>
</strong>
                    </div>
                    <div class="col-md-3">
                        <strong>   <?php echo lang('this_year_imports');?>
</strong>
                    </div>

                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .panel-body -->
</div><!-- .panel -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <span class="fa fa-calendar"></span>
                    <small>
                        <?php if (isset($_smarty_tpl->tpl_vars['this_day']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_day']->value;?>
<?php }?>
                    </small>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">  <?php echo lang('this_day_imports');?>
</span>
                    <span class="info-box-number">
                        <?php if (isset($_smarty_tpl->tpl_vars['this_day_imports']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_day_imports']->value;?>
<?php }?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-teal-active">
                    <span class="fa fa-calendar"></span> <small>
                                                <?php if (isset($_smarty_tpl->tpl_vars['this_week']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_week']->value;?>
<?php }?>
                    </small> </span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo lang('this_week_imports');?>
</span>
                    <span class="info-box-number">
                        <?php if (isset($_smarty_tpl->tpl_vars['this_week_imports']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_week_imports']->value;?>
<?php }?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-light-blue-active"><span class="fa fa-calendar"></span>
                    <small>
                        <?php if (isset($_smarty_tpl->tpl_vars['this_month']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_month']->value;?>
<?php }?>
                    </small>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo lang('this_month_imports');?>
</span>
                    <span class="info-box-number">
                                <?php if (isset($_smarty_tpl->tpl_vars['this_year_imports']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_year_imports']->value;?>
<?php }?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green-active">
                    <span class="fa fa-calendar"></span> <small>
                         <?php if (isset($_smarty_tpl->tpl_vars['this_year']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_year']->value;?>
<?php }?>
                    </small> </span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo lang('this_year_imports');?>
</span>
                    <span class="info-box-number">
                                <?php if (isset($_smarty_tpl->tpl_vars['this_year_imports']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_year_imports']->value;?>
<?php }?>
                            </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
</div>
<?php }} ?>