<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="bidders"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="bidders/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

            <div class="content">
                    <div class="inner">
						<h3>Details of {$table_name}, record #{$id}</h3>

						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidder_id}:</td>
                            <td>{$bidders_data.bidder_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_first_name}:</td>
                            <td>{$bidders_data.bidders_first_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_last_name}:</td>
                            <td>{$bidders_data.bidders_last_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_middel_name}:</td>
                            <td>{$bidders_data.bidders_middel_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_gender}:</td>
                            <td>{$bidders_data.bidders_gender}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_address}:</td>
                            <td>{$bidders_data.bidders_address}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_pphone}:</td>
                            <td>{$bidders_data.bidders_pphone}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_emaile}:</td>
                            <td>{$bidders_data.bidders_emaile}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_submit_date}:</td>
                            <td>{$bidders_data.bidders_submit_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_inserted_money}:</td>
                            <td>{$bidders_data.bidders_inserted_money}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.bidders_comment}:</td>
                            <td>{$bidders_data.bidders_comment}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidders_fields.received_bidder_document}:</td>
                 <td> <img src="./uploads/{$bidders_data.received_bidder_document}" width="30" height="30"/></td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="bidders/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
