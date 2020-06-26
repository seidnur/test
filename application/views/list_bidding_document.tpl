<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="bidding_document"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="bidding_document/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
            <div class="content">
        <div class="inner">
            <h3>List of {$table_name}</h3>
            {if !empty( $bidding_document_data )}
                <form action="bidding_document/delete" method="post" id="listing_form">
                    <table class="table">
                        <thead>
                        <th width="20"></th>
                        			<th>{$bidding_document_fields.Document_id}</th>
			<th>{$bidding_document_fields.bidding_company_id}</th>
			<th>{$bidding_document_fields.Document_name}</th>
			<th>{$bidding_document_fields.Document_image}</th>
			<th>{$bidding_document_fields.Document_crated_date}</th>
			<th>{$bidding_document_fields.Document_inserted_by}</th>
			<th>{$bidding_document_fields.Document_discription}</th>
			<th>{$bidding_document_fields.biding_end_date}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $bidding_document_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.Document_id}"/></td>
                                				<td>{$row.Document_id}</td>
				<td>{$row.bidding_company_id}</td>
				<td>{$row.Document_name}</td>

                                <td> <img src="./uploads/{$row.Document_image}" width="30" height="30"/></td>

                                <td>{$row.Document_crated_date}</td>
				<td>{$row.Document_inserted_by}</td>
				<td>{$row.Document_discription}</td>
				<td>{$row.biding_end_date}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="bidding_document/show/{$row.Document_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="bidding_document/edit/{$row.Document_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('bidding_document/delete/{$row.Document_id}')"><span class="fa fa-trash-o"></span></a>

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
