<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="categories"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="categories/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
            
            <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                    {lang("$table_name")} {lang('listing')}  
                {/if}      
                </h3>          
                  {if !empty( $categories_data )}
                <form action="categories/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20" class=" hidden-xs hidden-sm"></th>
                        <th title="Name of category">{$categories_fields.cat_name}</th>
                        <th title="Description of Category">{$categories_fields.cat_desc}</th>
                        <th title="Date of registration">{$categories_fields.cat_created_date}</th>

                        <th title="Manage categories" width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $categories_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td class=" hidden-xs hidden-sm">
                                <input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.cat_id}"/></td>
                                <td title="{$row.cat_name}" class="text-capitalize">{$row.cat_name}</td>
                                <td title="{$row.cat_desc}">{$row.cat_desc}</td>
                                <td title="{$row.cat_created_date}">{$row.cat_created_date}</td>

                                <td width="80">
                                    <a title="view details of {$row.cat_name}" class="btn btn-xs btn-info" href="categories/show/{$row.cat_id}"><span
                                                class="fa fa-eye"></span></a>
                                    <a title="Edit details of {$row.cat_name}"  class="btn btn-xs btn-warning" href="categories/edit/{$row.cat_id}"><span
                                                class="fa fa-edit"></span></a>
                                    <a title="Delete Category: {$row.cat_name}"  class="btn btn-xs btn-danger"
                                       href="javascript:chk('categories/delete/{$row.cat_id}')"><span
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
