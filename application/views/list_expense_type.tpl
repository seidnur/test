<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="expense_type"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="expense_type/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
             <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                              {lang("$table_name")} {lang('listing')}  
                {/if}      </h3>
            {if !empty( $expense_type_data )}
                <form action="expense_type/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20"></th>
                        <th>{$expense_type_fields.exp_type_name}</th>
                        <th>{$expense_type_fields.exp_created_date}</th>
                        <th>{$expense_type_fields.exp_type_remark}</th>
                        <th>{$expense_type_fields.is_deleted}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $expense_type_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.exp_type_id}"/></td>
                                <td>{$row.exp_type_name}</td>
                                <td>{$row.exp_created_date}</td>
                                <td>{$row.exp_type_remark}</td>
                                <td>{$row.is_deleted}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info" href="expense_type/show/{$row.exp_type_id}"><span
                                                class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="expense_type/edit/{$row.exp_type_id}"><span
                                                class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"
                                       href="javascript:chk('expense_type/delete/{$row.exp_type_id}')"><span
                                                class="fa fa-trash-o"></span></a>
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
                {lang('no_records_found')}
            {/if}

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
