<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="employee"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="employee/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
        <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                               {lang('of')}{lang("$table_name")} {lang('listing')}  
                {/if}      </h3>
            {if !empty( $employee_data )}
                <form action="employee/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
			<th>{$employee_fields.emp_full_name}</th>
			<th>{$employee_fields.emp_gender}</th>
			<th>{$employee_fields.emp_birth_date}</th>
			<th>{$employee_fields.emp_hire_date}</th>
			<th>{$employee_fields.emp_salary}</th>
			<th>{$employee_fields.emp_phone}</th>
			<th>{$employee_fields.emp_email}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $employee_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.emp_user_id}"/></td>
				<td class="text-capitalize">{$row.emp_first_name} {$row.emp_middle_name}  {$row.emp_last_name}</td>
				<td>{$row.emp_gender}</td>
				<td>{$row.emp_birth_date}</td>
				<td>{$row.emp_hire_date}</td>
				<td>{$row.emp_salary}</td>
				<td>{$row.emp_phone}</td>
				<td>{$row.emp_email}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="employee/show/{$row.emp_user_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="employee/edit/{$row.emp_user_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('employee/delete/{$row.emp_user_id}')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-danger" type="submit">
                                   {lang('delete_selected')}
                            </button>
                        </div>
                        <div class="pagination">
                            {$pager}
                        </div>
                    </div>
                </form>
            {else}
                {lang('no_records_found')}
            {/if}

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
