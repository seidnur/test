<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="categories"><span class="fa fa-list"></span> Listing</a>
            <a class="btn btn-sm btn-success" href="categories/create/"> <span class="fa fa-plus"></span> New record</a>

           <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 

            <table class="table table-responsive" width="50%">
               
                <tr class="{cycle values='odd,even'}">
                            <td>{$categories_fields.cat_id}:</td>
                            <td>{$categories_data.cat_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$categories_fields.cat_name}:</td>
                            <td>{$categories_data.cat_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$categories_fields.cat_desc}:</td>
                            <td>{$categories_data.cat_desc}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$categories_fields.cat_created_by}:</td>
                            <td>{$categories_data.cat_created_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$categories_fields.cat_remark}:</td>
                            <td>{$categories_data.cat_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$categories_fields.cat_deleted}:</td>
                            <td>{$categories_data.cat_deleted}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$categories_fields.cat_created_date}:</td>
                            <td>{$categories_data.cat_created_date}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="categories/edit/{$id}">
                        <span class="fa fa-edit"></span> Edit record
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
