<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="bidders"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="bidders/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

            <div class="content">
        <div class="inner">
            <h3>List of {$table_name}</h3>
            {if !empty( $bidders_data )}
                <form action="bidders/delete" method="post" id="listing_form">
                    <table class="table">
                        <thead>
                        <th width="20"></th>
                        <th>{$bidders_fields.bidders_first_name}</th>
                        <th>{$bidders_fields.bidders_middel_name}</th>
                        <th>{$bidders_fields.bidders_last_name}</th>

                        <th>{$bidders_fields.bidders_gender}</th>
                        <th>{$bidders_fields.bidders_address}</th>
                        <th>{$bidders_fields.bidders_pphone}</th>
                        <th>{$bidders_fields.bidders_emaile}</th>
                        <th>{$bidders_fields.bidders_submit_date}</th>
                        <th>{$bidders_fields.bidders_inserted_money}</th>

                        <th>{$bidders_fields.received_bidder_document}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $bidders_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.bidder_id}"/></td>
                                <td>{$row.bidders_first_name}</td>
                                <td>{$row.bidders_middel_name}</td>
                                <td>{$row.bidders_last_name}</td>

                                <td>{$row.bidders_gender}</td>
                                <td>{$row.bidders_address}</td>
                                <td>{$row.bidders_pphone}</td>
                                <td>{$row.bidders_emaile}</td>
                                <td>{$row.bidders_submit_date}</td>
                                <td>{$row.bidders_inserted_money}</td>

                                <td> <img src="./uploads/{$row.received_bidder_document}" width="30" height="30"/></td>


                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="bidders/show/{$row.bidder_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="bidders/edit/{$row.bidder_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('bidders/delete/{$row.bidder_id}')"><span class="fa fa-trash-o"></span></a>
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
