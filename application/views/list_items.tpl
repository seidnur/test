<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="items"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="items/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
            <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                  {lang('of')}{lang("$table_name")} {lang('listing')}  
                {/if}      
                </h3> 
            {if !empty( $items_data )}
                <form action="items/delete" method="post" id="listing_form">
                    <table class="table table-responsive" id="item_listing_form">
                        <thead>
                        <th width="20" class=" hidden-xs hidden-sm"> <!-- <input id="checkboxControl" type="checkbox"/> --></th>
                        <th>{$items_fields.Itm_name}</th>
                        <th>{$items_fields.itm_minimum_price}</th>
                        <th>{$items_fields.itm_cat_id}</th>
                        <th>{$items_fields.itm_remark}</th>


                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $items_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td class=" hidden-xs hidden-sm"> <input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.itm_id}"/></td>
                                <td>{$row.Itm_name}</td>
                                <td>{$row.itm_minimum_price}</td>
                                <td>{$row.itm_cat_id}</td>
                                <td>{$row.itm_remark}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info" href="items/show/{$row.itm_id}"><span
                                                class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" href="items/edit/{$row.itm_id}"><span
                                                class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"
                                       href="javascript:chk('items/delete/{$row.itm_id}')"><span
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
                {lang('no_record_found')}.
            {/if}

        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
