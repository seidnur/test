<div class="panel panel-default">
    <div class="panel-body">
            <a class="btn btn-warning btn-sm" href="group"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="group/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

            <h3>Details of {$table_name}, record #{$id}</h3>

            <table class="table table-responsive" width="50%">
                <thead>
                <th width="20%">{lang('field')}</th>
                <th>{lang('value')}</th>
                </thead>
                <tr class="{cycle values='odd,even'}">
                            <td>{$group_fields.id}:</td>
                            <td>{$group_data.id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$group_fields.group_name}:</td>
                            <td>{$group_data.group_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$group_fields.permission}:</td>
                            <td>{$group_data.permission}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="group/edit/{$id}">
                        <span class="fa fa-edit"></span> {lang('edit_record')}
                    </a>
                </div>
            </div>
    </div><!-- .body -->
</div><!-- .panel -->
