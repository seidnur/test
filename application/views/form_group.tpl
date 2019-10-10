<div class="panel panel-default">
                <div class="panel-body">
                  
                        <a class="btn btn-sm btn-warning" href="group"> <span class="fa fa-list"></span>  {lang('listing')}</a>
                        <a class="btn btn-success btn-sm" href="group/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
                    
                    <div class="inner">
                        {if $action_mode == 'create'}
                            <h3>{lang('new_record')}</h3>
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

        <form class="form" method='post' action='group/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label>{$group_fields.group_name}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($group_data)}{$group_data.group_name}{/if}" name="group_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$group_fields.permission}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($group_data)}{$group_data.permission}{/if}" name="permission" />
    		</div>
    		
    	</div>
    

                            <div class="form-group button-actions box-footer">
                                <div class="col-md-offset-4 col-md-6">
                                    <button class="btn btn-success" type="submit">
                                         {lang('save')}
                                    </button>
                                    <span class="text_button_padding">{lang('or')}</span>
                                    <a class="btn btn-default link_button" href="javascript:window.history.back();">{lang('cancel')}</a>
                            </div>
                            </div>
                        </form>
                    </div><!-- .inner -->
                </div><!-- .panel-body -->
            </div><!-- .panel -->
