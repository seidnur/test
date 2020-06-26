<div class="panel-body">
    <div class="inner">
        <a class="btn btn-warning btn-sm" href="tbl_campany"><span class="fa fa-list"></span> {lang('listing')}</a>
        <a class="btn btn-sm btn-success" href="tbl_campany/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>


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

                        <form class="form" method='post' action='tbl_campany/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-form-group">
            <label >{$tbl_campany_fields.company_name}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($tbl_campany_data)}{$tbl_campany_data.company_name}{/if}" name="company_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-form-group">
            <label >{$tbl_campany_fields.company_address}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($tbl_campany_data)}{$tbl_campany_data.company_address}{/if}" name="company_address" />
    		</div>
    		
    	</div>
    
    	<div class="form-form-group">
            <label >{$tbl_campany_fields.company_owner}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($tbl_campany_data)}{$tbl_campany_data.company_owner}{/if}" name="company_owner" />
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
