
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="tbl_campany"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="tbl_campany/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

            <div class="content">
                    <div class="inner">
						<h3>Details of {$table_name}, record #{$id}</h3>

						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="{cycle values='odd,even'}">
                            <td>{$tbl_campany_fields.company_id}:</td>
                            <td>{$tbl_campany_data.company_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_campany_fields.company_name}:</td>
                            <td>{$tbl_campany_data.company_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_campany_fields.company_address}:</td>
                            <td>{$tbl_campany_data.company_address}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_campany_fields.company_owner}:</td>
                            <td>{$tbl_campany_data.company_owner}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="tbl_campany/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
