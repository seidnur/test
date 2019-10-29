<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="items"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="items/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
          <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                    {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}
                {/if}    
                </h3>
            <table class="table table-responsive" width="50%">
                  <tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.itm_id}:</td>
                            <td>{$items_data.itm_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.Itm_name}:</td>
                            <td>{$items_data.Itm_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.itm_last_updated}:</td>
                            <td>{$items_data.itm_last_updated}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.itm_last_updated_by}:</td>
                            <td>{$items_data.itm_last_updated_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.itm_remark}:</td>
                            <td>{$items_data.itm_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.brand_id}:</td>
                            <td>{$items_data.brand_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.itm_cat_id}:</td>
                            <td>{$items_data.itm_cat_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.item_created_by}:</td>
                            <td>{$items_data.item_created_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.itm_date_created}:</td>
                            <td>{$items_data.itm_date_created}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$items_fields.itm_available_quantity}:</td>
                            <td>{$items_data.itm_available_quantity}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="items/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
