<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="expense_type"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="expense_type/create/"> <span class="fa fa-plus"></span>{lang('new_record')}</a>

            <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 

            <table class="table table-responsive" width="50%">
                <tr class="{cycle values='odd,even'}">
                            <td>{$expense_type_fields.exp_type_id}:</td>
                            <td>{$expense_type_data.exp_type_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expense_type_fields.exp_type_name}:</td>
                            <td>{$expense_type_data.exp_type_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expense_type_fields.exp_type_created_by}:</td>
                            <td>{$expense_type_data.exp_type_created_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expense_type_fields.exp_created_date}:</td>
                            <td>{$expense_type_data.exp_created_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expense_type_fields.exp_type_remark}:</td>
                            <td>{$expense_type_data.exp_type_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expense_type_fields.is_deleted}:</td>
                            <td>{$expense_type_data.is_deleted}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="expense_type/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
