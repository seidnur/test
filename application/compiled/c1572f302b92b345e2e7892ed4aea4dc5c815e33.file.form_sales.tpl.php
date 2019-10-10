<?php /* Smarty version Smarty-3.1.7, created on 2019-08-23 19:51:35
         compiled from "C:\xampp\htdocs\kass\application\views\form_sales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:298975d2da2f4a5a986-18185978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1572f302b92b345e2e7892ed4aea4dc5c815e33' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_sales.tpl',
      1 => 1563272756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '298975d2da2f4a5a986-18185978',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d2da2f4b7c0b',
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'success' => 0,
    'import_data' => 0,
    'import_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d2da2f4b7c0b')) {function content_5d2da2f4b7c0b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
                <div class="panel-body">
                   
                        <a class="btn btn-sm btn-warning" href="sales"> <span class="fa fa-list"></span>  <?php echo lang('listing');?>
</a>
                        <a class="btn btn-success btn-sm" href="sales/create/"> <span class="fa fa-plus"></span> <?php echo lang('new_record');?>
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

                        <div class="row" >
                        <div class="col-lg-12">
                           <?php if (!empty($_smarty_tpl->tpl_vars['import_data']->value)){?>
                        <table class="table table-responsive table-condensed" >
                        <thead>
                                <th class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_date'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_id'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_amount'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_available_amount'];?>
</th>
                                <th class="hidden-xs "><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_sale_itm_unit_price'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_min_sale_price'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['sell_quantity'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['sell_price'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['save_sell'];?>
</th>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['import_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                         <form class="form" method='post' 
                         action='sales/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
                          enctype="form-data">
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_date'];?>
</td>
                                <td  class="text-capitalize"> 
                                 <input type="hidden" name="sale_itm_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sale_itm_id'];?>
">
                                <input type="hidden" name="sale_imp_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_id'];?>
">
                                <input type="hidden" name="imp_itm_available" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_available_amount'];?>
">
                                <input type="hidden" name="imp_itm_sold_amount" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_sold_amount'];?>
">
                                <input type="hidden" name="imp_itm_total_imported" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_item_amount'];?>
">


                           <!--price of product when imported-->                                
                            <input type="hidden" name="imp_itm_unit_price" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_sale_itm_unit_price'];?>
">

                                <?php echo $_smarty_tpl->tpl_vars['row']->value['imp_item_id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_item_amount'];?>
</td>
                                <th><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_available_amount'];?>
</th>
                                <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_sale_itm_unit_price'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_min_sale_price'];?>
</td>
                                <td>
                                <input class="input-sm" type="number" name="sell_quantity" min="1"  max="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_available_amount'];?>
" required/>
                                 </td>
                                 <td>
                                    <input class="input-sm" type="number"
                                     name="sell_price"  min="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_min_sale_price'];?>
"  required  />
                                 </td>
                                 <td>
                                    <button class="btn btn-sm btn-success" type="submit"><?php echo lang('save_sell');?>
</button>
                                 </td>
                            </tr>
                            </form>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                
                        <div class="pagination">
                            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                        </div>
                    </div>
                    <?php }else{ ?>
                    <?php echo lang('no_stock_found');?>

                 <?php }?>
                </div> <!-- .col-lg-12 -->


                        <!-- <div class="col-lg-12">

                                <form class="form" method='post' action='sales/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">
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
                        </div> --> <!-- .col-lg-6 -->
                        
                        </div>  <!-- .col-lg-12 -->
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block --><?php }} ?>