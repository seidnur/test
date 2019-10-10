<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="expenses"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="expenses/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

            <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 

            <table class="table table-responsive" width="50%">
                <tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.exp_id}:</td>
                            <td>{$expenses_data.exp_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.exp_reason_id}:</td>
                            <td>{$expenses_data.exp_reason_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.year}:</td>
                            <td>{$expenses_data.year}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.Month}:</td>
                            <td>{$expenses_data.Month}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.amount}:</td>
                            <td>{$expenses_data.amount}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.paid}:</td>
                            <td>{$expenses_data.paid}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.created_by}:</td>
                            <td>{$expenses_data.created_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.created_date}:</td>
                            <td>{$expenses_data.created_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$expenses_fields.remark}:</td>
                            <td>{$expenses_data.remark}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="expenses/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
