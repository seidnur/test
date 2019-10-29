<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="company">Listing</a></li>
                        <li><a href="company/create/">New record</a></li>
                    </ul>
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
                            <td>{$company_fields.id}:</td>
                            <td>{$company_data.id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$company_fields.company_name}:</td>
                            <td>{$company_data.company_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$company_fields.service_charge_value}:</td>
                            <td>{$company_data.service_charge_value}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$company_fields.vat_charge_value}:</td>
                            <td>{$company_data.vat_charge_value}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$company_fields.address}:</td>
                            <td>{$company_data.address}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$company_fields.phone}:</td>
                            <td>{$company_data.phone}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$company_fields.country}:</td>
                            <td>{$company_data.country}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$company_fields.message}:</td>
                            <td>{$company_data.message}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$company_fields.currency}:</td>
                            <td>{$company_data.currency}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="company/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
