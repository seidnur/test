<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="bidding_document"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="bidding_document/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
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

                        <form class="form" method='post' action='bidding_document/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label >{$bidding_document_fields.bidding_company_id}<span class="error">*</span></label>
    		<select class="field form-control select addr" name="bidding_company_id" >
                <option value="0"></option>
                {foreach $related_tbl_campany as $rel}
                    <option value="{$rel.tbl_campany_id}"{if isset($bidding_document_data)}{if $bidding_document_data.bidding_company_id == $rel.tbl_campany_id} selected="selected"{/if}{/if}>{$rel.tbl_campany_name}</option>
                {/foreach}
        	</select>
    		
        </div>
    
    	<div class="form-form-group">
            <label >{$bidding_document_fields.Document_name}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($bidding_document_data)}{$bidding_document_data.Document_name}{/if}" name="Document_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
        	<fieldset>
                <legend>{$bidding_document_fields.Document_image}<span class="error">*</span></legend>
                <input type="hidden" value="{if isset($bidding_document_data)}{$bidding_document_data.Document_image}{/if}" name="Document_image-original-name" />
                {if isset($bidding_document_data.Document_image)}
                    {if !$bidding_document_data.Document_image}
                        <p>No file uploaded</p>
                    {else}
                        <p>File uploaded: <a href="uploads/{$bidding_document_data.Document_image}">{$bidding_document_data.Document_image}</a></p>
                    {/if}
                {/if}
                <input class="field file" type="file" name="Document_image" />
        		
        	</fieldset>
    	</div>
    
    	<div class="form-form-group">
            <label >{$bidding_document_fields.Document_crated_date}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" id="edate" maxlength="255" value="{if isset($bidding_document_data)}{$bidding_document_data.Document_crated_date}{/if}" name="Document_crated_date" />
    		</div>
    		
    	</div>
    
    	<div class="form-form-group">
            <label >{$bidding_document_fields.Document_inserted_by}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($user)}{$user}{/if}" name="Document_inserted_by" />
    		</div>
    		
    	</div>

    	<div class="form-form-group">
            <label >{$bidding_document_fields.Document_discription}<span class="error">*</span></label>
    		<div>

    	       	<input class="form-control" type="" id="Document_discription" maxlength="255" value="{if isset($bidding_document_data)}{$bidding_document_data.Document_discription}{/if}" name="Document_discription" />
    		</div>

    	</div>
    
    	<div class="form-form-group">
            <label >{$bidding_document_fields.biding_end_date}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text"id="cdate" maxlength="255" value="{if isset($bidding_document_data)}{$bidding_document_data.biding_end_date}{/if}" name="biding_end_date" />
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

        <script type="text/javascript">
            $(document).ready(function() {
               $("#Document_discription").wysihtml5();
            });
        </script>