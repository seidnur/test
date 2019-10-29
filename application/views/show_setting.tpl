<div class="panel panel-default"
<div class="panel-body">

    <div class="inner">
        <a class="btn btn-warning btn-sm" href="setting"><span class="fa fa-list"></span>{lang('listing')}</a>
        <a class="btn btn-success btn-sm" href="setting/create/"><span class="fa fa-pulse"></span> {lang('new_record')}</a>

    </div>

                <div class="content">
                    <div class="inner">
						<h3>Details of {$table_name}, record #{$id}</h3>

						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="{cycle values='odd,even'}">
                            <td>{$setting_fields.st_id}:</td>
                            <td>{$setting_data.st_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$setting_fields.service_charge_value}:</td>
                            <td>{$setting_data.service_charge_value}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$setting_fields.vat_charge_value}:</td>
                            <td>{$setting_data.vat_charge_value}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$setting_fields.currency}:</td>
                            <td>{$setting_data.currency}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="setting/edit/{$st_id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
