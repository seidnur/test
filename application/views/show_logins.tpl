<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="logins"><span class="fa fa-list"></span> Listing</a>
            <a class="btn btn-sm btn-success" href="logins/create/"> <span class="fa fa-plus"></span> New record</a>

            <h3>Details of {$table_name}, record #{$id}</h3>

            <table class="table table-responsive" width="50%">
                <thead>
                <th width="20%">Field</th>
                <th>Value</th>
                </thead>
                <tr class="{cycle values='odd,even'}">
                            <td>{$logins_fields.login_id}:</td>
                            <td>{$logins_data.login_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$logins_fields.Ip_address}:</td>
                            <td>{$logins_data.Ip_address}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$logins_fields.browser}:</td>
                            <td>{$logins_data.browser}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$logins_fields.LoginDate}:</td>
                            <td>{$logins_data.LoginDate}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="logins/edit/{$id}">
                        <span class="fa fa-edit"></span> Edit record
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
