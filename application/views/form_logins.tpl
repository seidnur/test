<div class="panel panel-default">
                <div class="panel-body">
                    <ul class="wat-cf">
                        <a class="btn btn-sm btn-warning" href="logins"> <span class="fa fa-liist"></span>  Listing</a>
                        <a class="btn btn-success btn-sm" href="logins/create/"> <span class="fa fa-plus"></span> New record</a>
                    </ul>
                    <div class="inner">
                        {if $action_mode == 'create'}
                            <h3>Add new record</h3>
                        {else}
                            <h3>Edit record: #{$record_id}</h3>
                        {/if}
                        {if isset($errors)}
                            <div class="flash">
                                <div class="alert alert-danger error">
                                    <p>{$errors}</p>
                                </div>
                            </div>
                        {/if}

                        <form class="form" method='post' action='logins/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label>{$logins_fields.Ip_address}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($logins_data)}{$logins_data.Ip_address}{/if}" name="Ip_address" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$logins_fields.browser}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($logins_data)}{$logins_data.browser}{/if}" name="browser" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$logins_fields.LoginDate}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($logins_data)}{$logins_data.LoginDate}{/if}" name="LoginDate" />
    		</div>
    		
    	</div>
    

                            <div class="form-group button-actions box-footer">
                                <div class="col-md-offset-4 col-md-6">
                                    <button class="btn btn-success" type="submit">
                                         Save
                                    </button>
                                    <span class="text_button_padding">or</span>
                                    <a class="btn btn-default link_button" href="javascript:window.history.back();">Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
