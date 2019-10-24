

<div class="panel panel-default">
	<div class="panel-body">

		<a class="btn btn-sm btn-warning" href="sales"> <span class="fa fa-list"></span> {lang('listing')}</a>




			<div class="row" style="margin-top: 10px">
				<div class="col-md-4">
					<form class="form" method='post'
						  action='sales/list_availables'
						  enctype="form-data">
						<div class="input-group">
							<select required name="sale_itm_id" id="sale_itm_id" class="form-control">
								{if !empty( $related_items )}
									<option value="">choose item</option>
									{foreach $related_items as $row}
										<option value="{$row.items_id}">{$row.items_name}</option>
									{/foreach}
								{/if}
							</select>
							<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Go!</button>
					  </span>
						</div><!-- /input-group -->
					</form>
				</div>

					<div class="col-lg-12" style="margin-top: 20px">
					{if isset($imports_list) && !empty( $imports_list )}
						<table class="table table-responsive table-condensed">
							<thead>
							<th class="hidden-xs">{$import_fields.imp_date}</th>
							<th>{$import_fields.imp_item_id}</th>
							<th>{$import_fields.imp_available_amount}</th>

							<th>{$import_fields.imp_min_sale_price}</th>
							<th>{$import_fields.sell_quantity}</th>
							<th>{$import_fields.sell_price}</th>
							<th>{$import_fields.save_sell}</th>
							</thead>
							<tbody>
							{foreach $imports_list as $row}
								<form class="form" method='post'
									  action='sales/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
									  enctype="form-data">
									<tr class="{cycle values='odd,even'}">
										<td class="hidden-xs">{$row.imp_date}</td>
										<td class="text-capitalize">
											<input type="hidden" name="sale_itm_id" value="{$row.item_id}">
											<input type="hidden" name="sale_imp_id" value="{$row.imp_id}">
											<input type="hidden" name="imp_itm_available"
												   value="{$row.imp_available_amount}">
											<input type="hidden" name="imp_itm_sold_amount"
												   value="{$row.imp_sold_amount}">
											<input type="hidden" name="imp_itm_total_imported"
												   value="{$row.imp_item_amount}">
											<!--price of product when imported-->
											<input type="hidden" name="imp_itm_unit_price"
												   value="{$row.imp_sale_itm_unit_price}">
											{$row.imp_item_id}</td>
										<th>{$row.imp_available_amount}</th>
										{*<td class="hidden-xs">{$row.imp_sale_itm_unit_price}</td>*}
										<td>{$row.imp_min_sale_price}</td>
										<td>
											<input class="input-sm"
												   type="number"
												   name="sell_quantity"
												   min="1"
												   max="{$row.imp_available_amount}" required/>
										</td>
										<td>
											<input class="input-sm" type="number"
												   name="sell_price"
												   min="{$row.imp_min_sale_price}" required/>
										</td>
										<td>
											<button class="btn btn-sm btn-success"
													type="submit">{lang('save_sell')}</button>
										</td>
									</tr>
								</form>
							{/foreach}
							</tbody>
						</table>
					{else}
						{lang('no_stock_found')}
					{/if}
				</div> <!-- .col-lg-12 -->
			</div>  <!-- .col-lg-12 -->
		</div><!-- .inner -->
	</div><!-- .content -->
