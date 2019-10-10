<div class="panel panel-default">
    <div class="panel-body">

        <a class="btn btn-sm btn-warning" href="sales"> <span class="fa fa-list"></span> {lang('listing')}</a>
        <a class="btn btn-success btn-sm" href="sales/create/"> <span class="fa fa-plus"></span> {lang('new_record')}
        </a>

        <div class="inner">
            {if $action_mode == 'create'}
                <h3>{lang('new_record')}</h3>
            {else}
                <h3>{lang('edit_record')}: #{$record_id}</h3>
            {/if}
            {if isset($errors)}
                <div class="flash">
                    <div class="alert alert-danger error">
                        <p>{$errors}</p>
                    </div>
                </div>
            {/if}
            {if isset($success)}
                <div class="flash">
                    <div class="alert alert-success">
                        <p>{$success}</p>
                    </div>
                </div>
            {/if}

            <div class="row">
                <div class="col-lg-12">
                    {if !empty( $import_data )}
                        <table class="table table-responsive table-condensed">
                            <thead>
                            <th class="hidden-xs">{$import_fields.imp_date}</th>
                            <th>{$import_fields.imp_item_id}</th>
                            <th>{$import_fields.imp_item_amount}</th>
                            <th>{$import_fields.imp_available_amount}</th>
                            <th class="hidden-xs ">{$import_fields.imp_sale_itm_unit_price}</th>
                            <th>{$import_fields.imp_min_sale_price}</th>
                            <th>{$import_fields.sell_quantity}</th>
                            <th>{$import_fields.sell_price}</th>
                            <th>{$import_fields.save_sell}</th>
                            </thead>
                            <tbody>
                            {foreach $import_data as $row}
                                <form class="form" method='post'
                                      action='sales/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
                                      enctype="form-data">
                                    <tr class="{cycle values='odd,even'}">
                                        <td class="hidden-xs">{$row.imp_date}</td>
                                        <td class="text-capitalize">
                                            <input type="hidden" name="imp_itm_available"
                                                   value="{$row.imp_available_amount}">
                                            <input type="hidden" name="imp_itm_sold_amount"
                                                   value="{$row.imp_sold_amount}">
                                            <input type="hidden" name="imp_itm_total_imported"
                                                   value="{$row.imp_item_amount}">


                                            <!--price of product when imported-->
                                            <input type="hidden" name="imp_itm_unit_price"
                                                   value="{$row.imp_sale_itm_unit_price}">   <input type="hidden" name="sale_itm_id" value="{$row.sale_itm_id}">
                                            <input type="hidden" name="sale_imp_id" value="{$row.imp_id}">


                                            {$row.imp_item_id}</td>
                                        <td>{$row.imp_item_amount}</td>
                                        <th>{$row.imp_available_amount}</th>
                                        <td class="hidden-xs">{$row.imp_sale_itm_unit_price}</td>
                                        <td>{$row.imp_min_sale_price}</td>
                                        <td>
                                            <input class="input-sm" type="number" name="sell_quantity" min="1"
                                                   max="{$row.imp_available_amount}" required/>
                                        </td>
                                        <td>
                                            <input class="input-sm" type="number"
                                                   name="sell_price" min="{$row.imp_min_sale_price}" required/>
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
                        <div class="actions-bar wat-cf">

                        <div class="pagination">
                            {$pager}
                        </div>
                    </div>
                    {else}
                        {lang('no_stock_found')}
                    {/if}
                </div> <!-- .col-lg-12 -->

            </div>  <!-- .col-lg-12 -->
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->