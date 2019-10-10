<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="sales"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="sales/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>


            <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 

            <table class="table table-responsive" width="50%">
            
                <tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.sale_itm_id}:</td>
                            <td>{$sales_data.sale_itm_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.sale_item_amount}:</td>
                            <td>{$sales_data.sale_item_amount}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.Date_sold}:</td>
                            <td>{$sales_data.Date_sold}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.soled_by}:</td>
                            <td>{$sales_data.soled_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.sale_remark}:</td>
                            <td>{$sales_data.sale_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.sold_price}:</td>
                            <td>{$sales_data.sold_price}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.sale_payment_option}:</td>
                            <td>{$sales_data.sale_payment_option}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.sale_buyer_info}:</td>
                            <td>{$sales_data.sale_buyer_info}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.Sale_sub_total}:</td>
                            <td>{$sales_data.Sale_sub_total}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$sales_fields.sale_id}:</td>
                            <td>{$sales_data.sale_id}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="sales/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
