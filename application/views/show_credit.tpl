<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="credit"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="credit/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

         <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 

            <table class="table table-responsive" width="50%">
               
                <tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_id}:</td>
                            <td>{$credit_data.cr_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_full_name}:</td>
                            <td>{$credit_data.cr_full_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_product}:</td>
                            <td>{$credit_data.cr_product}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_unit_price}:</td>
                            <td>{$credit_data.cr_unit_price}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_quantity}:</td>
                            <td>{$credit_data.cr_quantity}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_total_credit}:</td>
                            <td>{$credit_data.cr_total_credit}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_phone_number}:</td>
                            <td>{$credit_data.cr_phone_number}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_address}:</td>
                            <td>{$credit_data.cr_address}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_given_date}:</td>
                            <td>{$credit_data.cr_given_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_customer_gender}:</td>
                            <td>{$credit_data.cr_customer_gender}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_return_date}:</td>
                            <td>{$credit_data.cr_return_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_actual_return_date}:</td>
                            <td>{$credit_data.cr_actual_return_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_created_by}:</td>
                            <td>{$credit_data.cr_created_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_remark}:</td>
                            <td>{$credit_data.cr_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$credit_fields.cr_status}:</td>
                            <td>{$credit_data.cr_status}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="credit/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
