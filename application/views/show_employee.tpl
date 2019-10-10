<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="employee"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="employee/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

         
         <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 

            <table class="table table-responsive" width="50%">
                <tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_user_id}:</td>
                            <td>{$employee_data.emp_user_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_first_name}:</td>
                            <td>{$employee_data.emp_first_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_middle_name}:</td>
                            <td>{$employee_data.emp_middle_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_last_name}:</td>
                            <td>{$employee_data.emp_last_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_gender}:</td>
                            <td>{$employee_data.emp_gender}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_birth_date}:</td>
                            <td>{$employee_data.emp_birth_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_hire_date}:</td>
                            <td>{$employee_data.emp_hire_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_created_by}:</td>
                            <td>{$employee_data.emp_created_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_date_created}:</td>
                            <td>{$employee_data.emp_date_created}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_remark}:</td>
                            <td>{$employee_data.emp_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_salary}:</td>
                            <td>{$employee_data.emp_salary}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_phone}:</td>
                            <td>{$employee_data.emp_phone}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$employee_fields.emp_email}:</td>
                            <td>{$employee_data.emp_email}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="employee/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
