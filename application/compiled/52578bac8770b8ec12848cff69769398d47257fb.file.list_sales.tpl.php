<?php /* Smarty version Smarty-3.1.7, created on 2019-08-23 19:51:33
         compiled from "C:\xampp\htdocs\kass\application\views\list_sales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:695d2da21d9c05f5-68874261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52578bac8770b8ec12848cff69769398d47257fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\list_sales.tpl',
      1 => 1563986966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '695d2da21d9c05f5-68874261',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d2da21da9070',
  'variables' => 
  array (
    'search_form' => 0,
    'selected_language' => 0,
    'errors' => 0,
    'success' => 0,
    'sales_data' => 0,
    'sales_fields' => 0,
    'row' => 0,
    'pager' => 0,
    'this_day' => 0,
    'this_day_sales' => 0,
    'this_week' => 0,
    'this_week_sales' => 0,
    'this_month' => 0,
    'this_month_sales' => 0,
    'this_year' => 0,
    'this_year_sales' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d2da21da9070')) {function content_5d2da21da9070($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="sales"><span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>
            <a class="btn btn-sm btn-success" href="sales/create/"> <span
                        class="fa fa-plus"></span> <?php echo lang('new_record');?>
</a>
             <form action="sales/search" method="post" id="search_form">
                <?php if (isset($_smarty_tpl->tpl_vars['search_form']->value)){?><?php echo $_smarty_tpl->tpl_vars['search_form']->value;?>
<?php }?>
            </form>
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
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>
                <div class="flash">
                    <div class="alert alert-danger error">
                        <p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
                    </div>
                </div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['success']->value)){?>
                <div class="flash">
                    <div class="alert alert-success">
                        <p><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</p>
                    </div>
                </div>
            <?php }?>

            <?php if (!empty($_smarty_tpl->tpl_vars['sales_data']->value)){?>
                <table class="table table-responsive table-condensed">
                    <thead>
                    <th width="20" class=" hidden-xs hidden-sm"></th>

                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['Date_sold'];?>
</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sale_itm_id'];?>
</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sale_item_amount'];?>
</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['sold_price'];?>
</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['profit'];?>
</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['soled_by'];?>
</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['sales_fields']->value['Sale_sub_total'];?>
</th>

                    <th width="80">Actions</th>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sales_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                        <tr class=" <?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td class=" hidden-xs hidden-sm"><input type="checkbox" class="checkbox" name="delete_ids[]"
                                                                    value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sale_id'];?>
"/></td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['Date_sold'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['sale_itm_id'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['sale_item_amount'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['sold_price'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['profit'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['soled_by'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['Sale_sub_total'];?>
</td>

                            <td width="80">
                                <a class="btn btn-xs btn-info" href="sales/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['sale_id'];?>
"><span
                                            class="fa fa-eye"></span></a>
                                <a class="btn btn-xs btn-warning" href="sales/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['sale_id'];?>
"><span
                                            class="fa fa-edit"></span></a>
                                <a class="btn btn-xs btn-danger"
                                   href="javascript:chk('sales/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['sale_id'];?>
')"><span
                                            class="fa fa-trash-o"></span></a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
                <div class="pagination" style="margin: 10px 0 2px 0">
                    <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                </div>
            <?php }else{ ?>
                <?php echo lang('no_records_found');?>

            <?php }?>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green"> <span class="fa fa-calendar"></span>
                    <small>
                        <?php if (isset($_smarty_tpl->tpl_vars['this_day']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_day']->value;?>
<?php }?>

                    </small> </span>

                <div class="info-box-content">
                    <span class="info-box-text">  <?php echo lang('this_day_sells');?>
</span>
                    <span class="info-box-number">

                               <?php if (isset($_smarty_tpl->tpl_vars['this_day_sales']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_day_sales']->value;?>
<?php }?>
                            </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-teal-active"> <span class="fa fa-calendar"></span>
                    <small>
                        <?php if (isset($_smarty_tpl->tpl_vars['this_week']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_week']->value;?>
<?php }?>

                    </small> </span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo lang('this_week_sells');?>
</span>
                    <span class="info-box-number">

                        <?php if (isset($_smarty_tpl->tpl_vars['this_week_sales']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_week_sales']->value;?>
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

                    </small></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo lang('this_month_sells');?>
</span>
                    <span class="info-box-number">
                        <?php if (isset($_smarty_tpl->tpl_vars['this_month_sales']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_month_sales']->value;?>
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
                    <span class="info-box-text"><?php echo lang('this_year_sells');?>
</span>
                    <span class="info-box-number">
                        <?php if (isset($_smarty_tpl->tpl_vars['this_year_sales']->value)){?><?php echo $_smarty_tpl->tpl_vars['this_year_sales']->value;?>
<?php }?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
</div>

<?php }} ?>