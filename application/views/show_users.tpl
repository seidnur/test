<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="users"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="users/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

             <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 

            <table class="table table-responsive" width="50%">
                <tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.id}:</td>
                            <td>{$users_data.id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.user_name}:</td>
                            <td>{$users_data.user_name}</td>
                       <tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.user_emp_id}:</td>
                            <td>{$users_data.user_emp_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.user_created_date}:</td>
                            <td>{$users_data.user_created_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.user_created_by}:</td>
                            <td>{$users_data.user_created_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.user_remark}:</td>
                            <td>{$users_data.user_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.user_accout_status}:</td>
                            <td>{$users_data.user_accout_status}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.user_email}:</td>
                            <td>{$users_data.user_email}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="users/edit/{$id}">
                        <span class="fa fa-edit"></span>{lang('edit_record')}
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
