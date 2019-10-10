<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="usergroup"><span class="fa fa-list"></span> Listing</a>
            <a class="btn btn-sm btn-success" href="usergroup/create/"> <span class="fa fa-plus"></span> New record</a>

            <h3>Details of {$table_name}, record #{$id}</h3>

            <table class="table table-responsive" width="50%">
                <thead>
                <th width="20%">Field</th>
                <th>Value</th>
                </thead>
                <tr class="{cycle values='odd,even'}">
                            <td>{$usergroup_fields.id}:</td>
                            <td>{$usergroup_data.id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$usergroup_fields.group_user_id}:</td>
                            <td>{$usergroup_data.group_user_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$usergroup_fields.group_id}:</td>
                            <td>{$usergroup_data.group_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$usergroup_fields.group_created_by}:</td>
                            <td>{$usergroup_data.group_created_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$usergroup_fields.group_remark}:</td>
                            <td>{$usergroup_data.group_remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$usergroup_fields.group_created_date}:</td>
                            <td>{$usergroup_data.group_created_date}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="usergroup/edit/{$id}">
                        <span class="fa fa-edit"></span> Edit record
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
