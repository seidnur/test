<div class="panel panel-default">

                <div class="inner">
					<a class="btn btn-warning btn-sm" href="company"><span class="fa fa-list"></span>{lang('listing')}</a>
					<a class="btn btn-success btn-sm" href="company/create/"><span class="fa fa-pulse"></span> {lang('new_record')}</a>
				</div>
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

                        <form class="form" method='post' action='company/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label>{$company_fields.company_name}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($company_data)}{$company_data.company_name}{/if}" name="company_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$company_fields.service_charge_value}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($company_data)}{$company_data.service_charge_value}{/if}" name="service_charge_value" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$company_fields.vat_charge_value}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($company_data)}{$company_data.vat_charge_value}{/if}" name="vat_charge_value" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$company_fields.address}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($company_data)}{$company_data.address}{/if}" name="address" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$company_fields.phone}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($company_data)}{$company_data.phone}{/if}" name="phone" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$company_fields.country}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($company_data)}{$company_data.country}{/if}" name="country" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$company_fields.message}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($company_data)}{$company_data.message}{/if}" name="message" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$company_fields.currency}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($company_data)}{$company_data.currency}{/if}" name="currency" />
    		</div>
    		
    	</div>
    

                            <div class="group navform wat-cf">
                                    <button class="button" type="submit">
                                        <img src="iscaffold/backend_skins/images/icons/tick.png" alt="Save"> Save
                                    </button>
                                    <span class="text_button_padding">or</span>
                                    <a class="text_button_padding link_button" href="javascript:window.history.back();">Cancel</a>
                            </div>
                        </form>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
