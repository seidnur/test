<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="brands">
                <span class="fa fa-plus"></span> {lang('listing')}
            </a>
            <a class="btn btn-sm btn-success" href="brands/create/">
                <span class="fa fa-plus"></span> {lang('new_record')}
            </a>

            <h3>{if $selected_language=='english'}
                    {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                    {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}
                {/if}
            </h3>

            <table class="table table-responsive" width="50%">
                <tr class="{cycle values='odd,even'}">
                    <td>{$brands_fields.brand_id}:</td>
                    <td>{$brands_data.brand_id}</td>
                </tr>
                <tr class="{cycle values='odd,even'}">
                    <td>{$brands_fields.brand_name}:</td>
                    <td>{$brands_data.brand_name}</td>
                </tr>
                <tr class="{cycle values='odd,even'}">
                    <td>{$brands_fields.brand_description}:</td>
                    <td>{$brands_data.brand_description}</td>
                </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="brands/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
