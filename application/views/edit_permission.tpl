<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="groups"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="groups/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
          <h3>{lang('listing')} {lang("$table_name")}</h3>
            {if !empty( $groups_data )}
                <form action="groups/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
                        <th>{$groups_fields.name}</th>
                        <th>{$groups_fields.description}</th>
                        <th>{$groups_fields.permission}</th>


                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $groups_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.id}"/></td>
                                <td>{$row.name}</td>
                                <td>{$row.description}</td>
                                <td><a href="permission/edit/{$row.id}">Manage permission</a></td>
                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="groups/show/{$row.id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="groups/edit/{$row.id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('groups/delete/{$row.id}')"><span class="fa fa-trash-o"></span></a>
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
