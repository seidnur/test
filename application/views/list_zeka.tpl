<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="zeka"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="zeka/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
              <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                               {lang('of')}{lang("$table_name")} {lang('listing')}  
                {/if}      </h3>
            {if !empty( $zeka_data )}
                <form action="zeka/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
                        			<th>{$zeka_fields.zeka_id}</th>
			<th>{$zeka_fields.amount}</th>
			<th>{$zeka_fields.Year}</th>
			<th>{$zeka_fields.is_paid}</th>
			<th>{$zeka_fields.percent}</th>
			<th>{$zeka_fields.date_paid}</th>
			<th>{$zeka_fields.date_calculated}</th>
			<th>{$zeka_fields.remark}</th>
			<th>{$zeka_fields.calculated_by}</th>
			<th>{$zeka_fields.paid_by}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $zeka_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.zeka_id}"/></td>
                                				<td>{$row.zeka_id}</td>
				<td>{$row.amount}</td>
				<td>{$row.Year}</td>
				<td>{$row.is_paid}</td>
				<td>{$row.percent}</td>
				<td>{$row.date_paid}</td>
				<td>{$row.date_calculated}</td>
				<td>{$row.remark}</td>
				<td>{$row.calculated_by}</td>
				<td>{$row.paid_by}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="zeka/show/{$row.zeka_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="zeka/edit/{$row.zeka_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('zeka/delete/{$row.zeka_id}')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-default" type="submit">
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
