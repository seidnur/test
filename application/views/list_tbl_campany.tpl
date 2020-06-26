
<div class="panel panel-default">
    <div class="panel-body">
    <div class="inner">
        <a class="btn btn-warning btn-sm" href="tbl_campany"><span class="fa fa-list"></span> {lang('listing')}</a>
        <a class="btn btn-sm btn-success" href="tbl_campany/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

        <div class="content">
        <div class="inner">
            <h3>List of {$table_name}</h3>
            {if !empty( $tbl_campany_data )}
                <form action="tbl_campany/delete" method="post" id="listing_form">
                    <table class="table">
                        <thead>
                        <th width="20"></th>
                        			<th>{$tbl_campany_fields.company_id}</th>
			<th>{$tbl_campany_fields.company_name}</th>
			<th>{$tbl_campany_fields.company_address}</th>
			<th>{$tbl_campany_fields.company_owner}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $tbl_campany_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.company_id}"/></td>
                                				<td>{$row.company_id}</td>
				<td>{$row.company_name}</td>
				<td>{$row.company_address}</td>
				<td>{$row.company_owner}</td>


                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="tbl_campany/show/{$row.company_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="tbl_campany/edit/{$row.company_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('tbl_campany/delete/{$row.company_id}')"><span class="fa fa-trash-o"></span></a>
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
