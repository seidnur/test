<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="group"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="group/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
             <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                               {lang("$table_name")} {lang('listing')}  
                {/if}      </h3>
            {if !empty( $group_data )}
                <form action="group/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
			<th>{$group_fields.group_name}</th>
			<th>{$group_fields.permission}</th>


                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $group_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.id}"/></td>
                                				
				<td>{$row.group_name}</td>
                <td><a href="permission/edit/{$row.id}">view permissions here</a></td>
				

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="group/show/{$row.id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="group/edit/{$row.id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('group/delete/{$row.id}')"><span class="fa fa-trash-o"></span></a>
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
                {lang('no_records_found')}.
            {/if}

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
