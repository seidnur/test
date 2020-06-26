<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="bidding_document"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="bidding_document/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>


            <div class="content">
                    <div class="inner">
						<h3>Details of {$table_name}, record #{$id}</h3>

						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="{cycle values='odd,even'}">
                            <td>{$bidding_document_fields.Document_id}:</td>
                            <td>{$bidding_document_data.Document_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidding_document_fields.bidding_company_id}:</td>
                            <td>{$bidding_document_data.bidding_company_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidding_document_fields.Document_name}:</td>
                            <td>{$bidding_document_data.Document_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidding_document_fields.Document_image}:</td>

                                <td> <img src="./uploads/{$bidding_document_data.Document_image}" width="30" height="30"/></td>

                            </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidding_document_fields.Document_crated_date}:</td>
                            <td>{$bidding_document_data.Document_crated_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidding_document_fields.Document_inserted_by}:</td>
                            <td>{$bidding_document_data.Document_inserted_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidding_document_fields.Document_discription}:</td>
                            <td>{$bidding_document_data.Document_discription}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$bidding_document_fields.biding_end_date}:</td>
                            <td>{$bidding_document_data.biding_end_date}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="bidding_document/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
