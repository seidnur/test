<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="usergroup"><span class="fa fa-list"></span> Listing</a>
            <a class="btn btn-sm btn-success" href="usergroup/create/"> <span class="fa fa-plus"></span> New record</a>
             <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                               {lang('of')}{lang("$table_name")} {lang('listing')}  
                {/if}      </h3>
            {if !empty( $usergroup_data )}
                <form action="usergroup/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
                        			
			<th>{$usergroup_fields.group_user_id}</th>
			<th>{$usergroup_fields.group_id}</th>
			<th>{$usergroup_fields.group_created_by}</th>
			<th>{$usergroup_fields.group_remark}</th>
			<th>{$usergroup_fields.group_created_date}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $usergroup_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.id}"/></td>
                                				
				<td>{$row.group_user_id}</td>
				<td>{$row.group_id}</td>
				<td>{$row.group_user_id}</td>
				<td>{$row.group_remark}</td>
				<td>{$row.group_created_date}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="usergroup/show/{$row.id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="usergroup/edit/{$row.id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('usergroup/delete/{$row.id}')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-danger" type="submit">
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
