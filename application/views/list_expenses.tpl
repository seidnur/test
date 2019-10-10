<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="expenses"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="expenses/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
            <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                               {lang('of')}{lang("$table_name")} {lang('listing')}  
                {/if}      </h3>
            {if !empty( $expenses_data )}
                <form action="expenses/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
			<th>{$expenses_fields.exp_reason_id}</th>
			<th>{$expenses_fields.year}</th>
			<th>{$expenses_fields.Month}</th>
			<th>{$expenses_fields.amount}</th>
			<th>{$expenses_fields.paid}</th>
			<th>{$expenses_fields.created_by}</th>
			<th>{$expenses_fields.created_date}</th>
			<th>{$expenses_fields.remark}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $expenses_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.exp_id}"/></td>
				<td>{$row.exp_reason_id}</td>
				<td>{$row.year}</td>
				<td>{$row.Month}</td>
				<td>{$row.amount}</td>
				<td>{$row.paid}</td>
				<td>{$row.created_by}</td>
				<td>{$row.created_date}</td>
				<td>{$row.remark}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="expenses/show/{$row.exp_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="expenses/edit/{$row.exp_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('expenses/delete/{$row.exp_id}')"><span class="fa fa-trash-o"></span></a>
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
               {lang('no_record_found')}.
            {/if}

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
