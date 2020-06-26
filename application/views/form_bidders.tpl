<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="bidders"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="bidders/create/"> <span
                        class="fa fa-plus"></span> {lang('new_record')}</a>

            <div class="content">
                <div class="inner">
                    {if $action_mode == 'create'}
                        <h3>Add new record</h3>
                    {else}
                        <h3>Edit record: #{$record_id}</h3>
                    {/if}
                    {if isset($errors)}
                        <div class="flash">
                            <div class="message error">
                                <p>{$errors}</p>
                            </div>
                        </div>
                    {/if}

                    <form class="form" method='post'
                          action='bidders/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
                          enctype="multipart/form-data">


                        <div class="form-form-group">
                            <label>{$bidders_fields.bidders_first_name}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($bidders_data)}{$bidders_data.bidders_first_name}{/if}"
                                       name="bidders_first_name"/>
                            </div>

                        </div>

                        <div class="form-form-group">
                            <label>{$bidders_fields.bidders_middel_name}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($bidders_data)}{$bidders_data.bidders_middel_name}{/if}"
                                       name="bidders_middel_name"/>
                            </div>

                        </div>
                        <div class="form-form-group">
                            <label>{$bidders_fields.bidders_last_name}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($bidders_data)}{$bidders_data.bidders_last_name}{/if}"
                                       name="bidders_last_name"/>
                            </div>

                        </div>


                        <div class="form-group">
                            <label>{$bidders_fields.bidders_gender}<span class="error">*</span></label>
                            <div class="block">
        	<span class="left">
        		<select class="field form-control select addr" name="bidders_gender">
                    <option value="0"></option>
                    {foreach $metadata.bidders_gender.enum_values as $k => $e}
                        <option value="{$e}"{if isset($bidders_data.bidders_gender)}
							{if $bidders_data == $metadata.bidders_gender.enum_names[$k]}
								selected="selected"{/if}{/if}>{$metadata.bidders_gender.enum_names[$k]}</option>
                    {/foreach}
            	</select>
            </span>
                            </div>

                        </div>

                        <div class="form-form-group">
                            <label>{$bidders_fields.bidders_address}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($bidders_data)}{$bidders_data.bidders_address}{/if}"
                                       name="bidders_address"/>
                            </div>

                        </div>

                        <div class="form-form-group">
                            <label>{$bidders_fields.bidders_pphone}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($bidders_data)}{$bidders_data.bidders_pphone}{/if}"
                                       name="bidders_pphone"/>
                            </div>

                        </div>

                        <div class="form-form-group">
                            <label>{$bidders_fields.bidders_emaile}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($bidders_data)}{$bidders_data.bidders_emaile}{/if}"
                                       name="bidders_emaile"/>
                            </div>

                        </div>

                        <div class="form-form-group">
                            <label>{$bidders_fields.bidders_submit_date}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($bidders_data)}{$bidders_data.bidders_submit_date}{/if}"
                                       name="bidders_submit_date"
                                       id="submit_date"/>
                            </div>

                        </div>

                        <div class="form-form-group">
                            <label>{$bidders_fields.bidders_inserted_money}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($bidders_data)}{$bidders_data.bidders_inserted_money}{/if}"
                                       name="bidders_inserted_money"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>{$bidders_fields.bidders_comment}<span class="error">*</span></label>
                            <div>
                                <textarea rows="3" cols="50" class="form-control"
                                          name="bidders_comment">{if isset($bidders_data)}{$bidders_data.bidders_comment}{/if}</textarea>
                            </div>

                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>{$bidders_fields.received_bidder_document}<span class="error">*</span></legend>
                                <input type="hidden"
                                       value="{if isset($bidders_data)}{$bidders_data.received_bidder_document}{/if}"
                                       name="received_bidder_document-original-name"/>
                                {if isset($bidders_data.received_bidder_document)}
                                    {if !$bidders_data.received_bidder_document}
                                        <p>No file uploaded</p>
                                    {else}
                                        <p>File uploaded: <a
                                                    href="uploads/{$bidders_data.received_bidder_document}">{$bidders_data.received_bidder_document}</a>
                                        </p>
                                    {/if}
                                {/if}
                                <input class="field file" type="file" name="received_bidder_document"/>

                            </fieldset>
                        </div>


                        <div class="group navform wat-cf">
                            <button class="button" type="submit">
                                <img src="iscaffold/backend_skins/images/icons/tick.png" alt="Save"> Save
                            </button>
                            <span class="text_button_padding">or</span>
                            <a class="text_button_padding link_button"
                               href="javascript:window.history.back();">Cancel</a>
                        </div>
                    </form>
                </div><!-- .inner -->
            </div><!-- .content -->
        </div><!-- .block -->
