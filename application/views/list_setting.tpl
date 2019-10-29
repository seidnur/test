    <div class="panel panel-default"
    <div class="panel-body">

        <div class="inner">
            <a class="btn btn-warning btn-sm" href="setting"><span class="fa fa-list"></span>{lang('listing')}</a>
            <a class="btn btn-success btn-sm" href="setting/create/"><span class="fa fa-pulse"></span> {lang('new_record')}</a>

        </div>
    <div class="content">
        <div class="inner">
            <h3>List of {$table_name}</h3>
            {if !empty( $setting_data )}
                <form action="setting/delete" method="post" id="listing_form">
                    <table class="table">
                        <thead>
                        <th width="20"></th>
                        <th>{$setting_fields.st_id}</th>
			<th>{$setting_fields.service_charge_value}</th>
			<th>{$setting_fields.vat_charge_value}</th>
			<th>{$setting_fields.currency}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $setting_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.st_id}"/></td>
                                				<td>{$row.st_id}</td>
				<td>{$row.service_charge_value}</td>
				<td>{$row.vat_charge_value}</td>
				<td>{$row.currency}</td>

                                <td width="80">
                                    <a class="btn btn-info btn-xs" href="setting/show/{$row.st_id}" ><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-warning btn-xs" href="setting/edit/{$row.st_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-danger btn-xs" href="javascript:chk('setting/delete/{$row.id}')"><span class="fa fa-trash" </a>
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
                No records found.
            {/if}

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
