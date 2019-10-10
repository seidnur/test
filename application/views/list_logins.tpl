<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="logins"><span class="fa fa-list"></span> Listing</a>
            <a class="btn btn-sm btn-success" href="logins/create/"> <span class="fa fa-plus"></span> New record</a>
            <h3>List of {$table_name}</h3>
            {if !empty( $logins_data )}
                <form action="logins/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
                        			<th>{$logins_fields.login_id}</th>
			<th>{$logins_fields.Ip_address}</th>
			<th>{$logins_fields.browser}</th>
			<th>{$logins_fields.LoginDate}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $logins_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.login_id}"/></td>
                                				<td>{$row.login_id}</td>
				<td>{$row.Ip_address}</td>
				<td>{$row.browser}</td>
				<td>{$row.LoginDate}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="logins/show/{$row.login_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="logins/edit/{$row.login_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('logins/delete/{$row.login_id}')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-default" type="submit">
                                    Delete selected
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
