<div class="panel panel-default"
<div class="panel-body">

                <div class="inner">
                    <a class="btn btn-warning btn-sm" href="company"><span class="fa fa-list"></span>{lang('listing')}</a>
                        <a class="btn btn-success btn-sm" href="company/create/"><span class="fa fa-pulse"></span> {lang('new_record')}</a>

                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $company_data )}
                        <form action="company/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$company_fields.id}</th>
			<th>{$company_fields.company_name}</th>
			<th>{$company_fields.service_charge_value}</th>
			<th>{$company_fields.vat_charge_value}</th>
			<th>{$company_fields.address}</th>
			<th>{$company_fields.phone}</th>
			<th>{$company_fields.country}</th>
			<th>{$company_fields.message}</th>
			<th>{$company_fields.currency}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $company_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.id}" /></td>
                                            				<td>{$row.id}</td>
				<td>{$row.company_name}</td>
				<td>{$row.service_charge_value}</td>
				<td>{$row.vat_charge_value}</td>
				<td>{$row.address}</td>
				<td>{$row.phone}</td>
				<td>{$row.country}</td>
				<td>{$row.message}</td>
				<td>{$row.currency}</td>

                                            <td width="80">
                                                <a href="company/show/{$row.id}"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="company/edit/{$row.id}"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('company/delete/{$row.id}')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
                                            </td>
                            		    </tr>
                                	{/foreach}
                            	</tbody>
                            </table>
                            <div class="actions-bar wat-cf">
                                <div class="actions">
                                    <button class="button" type="submit">
                                        <img src="iscaffold/backend_skins/images/icons/cross.png" alt="Delete"> Delete selected
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

