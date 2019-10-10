<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="credit"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="credit/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
            <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                               {lang('of')}{lang("$table_name")} {lang('listing')}  
                {/if}      </h3>
            {if !empty( $credit_data )}
                <form action="credit/delete" method="post" id="listing_form">
                    <table class="table table-responsive table-condensed">
                        <thead>
                        <th width="20"></th>
			<th>{$credit_fields.cr_full_name}</th>
			<th>{$credit_fields.cr_product}</th>
			<th>{$credit_fields.cr_unit_price}</th>
			<th>{$credit_fields.cr_quantity}</th>
			<th>{$credit_fields.cr_total_credit}</th>
			<th>{$credit_fields.cr_given_date}</th>
			<th>{$credit_fields.cr_return_date}</th>
			<th>{$credit_fields.cr_status}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $credit_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.cr_id}"/></td>
				<td class="text-center">{$row.cr_full_name}</td>
				<td class="text-center">{$row.cr_product}</td>
				<td class="text-center">{$row.cr_unit_price}</td>
				<td class="text-center">{$row.cr_quantity}</td>
				<td class="text-center">{$row.cr_total_credit}</td>
				<td class="text-center">{$row.cr_given_date}</td>
				<td class="text-center">{$row.cr_return_date}</td>
				<td>{$row.cr_status}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="credit/show/{$row.cr_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="credit/edit/{$row.cr_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('credit/delete/{$row.cr_id}')"><span class="fa fa-trash-o"></span></a>
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
