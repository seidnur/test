<div class="panel panel-default">
    <div class="panel-body">
            <a class="btn btn-warning btn-sm" href="import"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="import/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

 <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 
            <table class="table table-responsive" width="50%">
                <thead>
                <th width="20%">{lang('field')}</th>
                <th>{lang('value')}</th>
                </thead>
                <tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_id}:</td>
                            <td>{$import_data.imp_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_item_id}:</td>
                            <td>{$import_data.imp_item_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_sold_amount}:</td>
                            <td>{$import_data.imp_sold_amount}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_item_amount}:</td>
                            <td>{$import_data.imp_item_amount}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_available_amount}:</td>
                            <td>{$import_data.imp_available_amount}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_sale_itm_unit_price}:</td>
                            <td>{$import_data.imp_sale_itm_unit_price}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_min_sale_price}:</td>
                            <td>{$import_data.imp_min_sale_price}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_sub_total}:</td>
                            <td>{$import_data.imp_sub_total}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_date}:</td>
                            <td>{$import_data.imp_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_inserted_by}:</td>
                            <td>{$import_data.user_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_remark}:</td>
                            <td>{$import_data.imp_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_Last_updated_by}:</td>
                            <td>{$import_data.user_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_Last_update}:</td>
                            <td>{$import_data.imp_Last_update}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$import_fields.imp_deleted}:</td>
                            <td>{$import_data.imp_deleted}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="import/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
    </div><!-- .body -->
</div><!-- .panel -->
