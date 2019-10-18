<?php /* Smarty version Smarty-3.1.7, created on 2019-10-17 12:02:36
         compiled from "C:\xampp\htdocs\kass\application\views\form_sale_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235475da83c3c754bc8-74713750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21affd22dc1f13941e3a3d602947a578401ffffd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\form_sale_item.tpl',
      1 => 1571298094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235475da83c3c754bc8-74713750',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'related_items' => 0,
    'row' => 0,
    'imports_list' => 0,
    'import_fields' => 0,
    'action_mode' => 0,
    'record_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5da83c3c7cf30',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5da83c3c7cf30')) {function content_5da83c3c7cf30($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\xampp\\htdocs\\kass\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?>

<div class="panel panel-default">
	<div class="panel-body">

		<a class="btn btn-sm btn-warning" href="sales"> <span class="fa fa-list"></span> <?php echo lang('listing');?>
</a>




			<div class="row" style="margin-top: 10px">
				<div class="col-md-4">
					<form class="form" method='post'
						  action='sales/list_availables'
						  enctype="form-data">
						<div class="input-group">
							<select required name="sale_itm_id" id="sale_itm_id" class="form-control">
								<?php if (!empty($_smarty_tpl->tpl_vars['related_items']->value)){?>
									<option value="">choose item</option>
									<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['items_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['items_name'];?>
</option>
									<?php } ?>
								<?php }?>
							</select>
							<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Go!</button>
					  </span>
						</div><!-- /input-group -->
					</form>
				</div>

					<div class="col-lg-12" style="margin-top: 20px">
					<?php if (isset($_smarty_tpl->tpl_vars['imports_list']->value)&&!empty($_smarty_tpl->tpl_vars['imports_list']->value)){?>
						<table class="table table-responsive table-condensed">
							<thead>
							<th class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_date'];?>
</th>
							<th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_item_id'];?>
</th>
							<th><?php echo $_smarty_tpl->tpl_vars['import_fields']->value['imp_available_amount'];?>
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
 $_from = $_smarty_tpl->tpl_vars['imports_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
										<td class="text-capitalize">
											<input type="hidden" name="sale_itm_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['item_id'];?>
">
											<input type="hidden" name="sale_imp_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_id'];?>
">
											<input type="hidden" name="imp_itm_available"
												   value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_available_amount'];?>
">
											<input type="hidden" name="imp_itm_sold_amount"
												   value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_sold_amount'];?>
">
											<input type="hidden" name="imp_itm_total_imported"
												   value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_item_amount'];?>
">
											<!--price of product when imported-->
											<input type="hidden" name="imp_itm_unit_price"
												   value="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_sale_itm_unit_price'];?>
">
											<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_item_id'];?>
</td>
										<th><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_available_amount'];?>
</th>
										
										<td><?php echo $_smarty_tpl->tpl_vars['row']->value['imp_min_sale_price'];?>
</td>
										<td>
											<input class="input-sm"
												   type="number"
												   name="sell_quantity"
												   min="1"
												   max="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_available_amount'];?>
" required/>
										</td>
										<td>
											<input class="input-sm" type="number"
												   name="sell_price"
												   min="<?php echo $_smarty_tpl->tpl_vars['row']->value['imp_min_sale_price'];?>
" required/>
										</td>
										<td>
											<button class="btn btn-sm btn-success"
													type="submit"><?php echo lang('save_sell');?>
</button>
										</td>
									</tr>
								</form>
							<?php } ?>
							</tbody>
						</table>
					<?php }else{ ?>
						<?php echo lang('no_stock_found');?>

					<?php }?>
				</div> <!-- .col-lg-12 -->
			</div>  <!-- .col-lg-12 -->
		</div><!-- .inner -->
	</div><!-- .content -->
<?php }} ?>