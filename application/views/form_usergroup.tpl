<div class="panel panel-default">
                <div class="panel-body">
                   
                        <a class="btn btn-sm btn-warning" href="usergroup"> <span class="fa fa-list"></span>  {lang('listing')}</a>
                        <a class="btn btn-success btn-sm" href="usergroup/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
                   
                    <div class="inner">
                        {if $action_mode == 'create'}
                            <h3>{lang('new_record')}</h3>
                        {else}
                            <h3>{lang('edit_record')}: #{$record_id}</h3>
                        {/if}
                        {if isset($errors)}
                            <div class="flash">
                                <div class="alert alert-danger error">
                                    <p>{$errors}</p>
                                </div>
                            </div>
                        {/if}

                        <form class="form" method='post' action='usergroup/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label >{$usergroup_fields.group_user_id}<span class="error">*</span></label>
    		<select class="field form-control select addr" name="group_user_id" >
                <option value="0"></option>
                {foreach $related_users as $rel}
                    <option value="{$rel.users_id}"{if isset($usergroup_data)}{if $usergroup_data.group_user_id == $rel.users_id} selected="selected"{/if}{/if}>{$rel.users_name}</option>
                {/foreach}
        	</select>
    		
        </div>
    
    	<div class="form-group">
            <label >{$usergroup_fields.group_id}<span class="error">*</span></label>
    		<select class=" form-control" name="group_id" >
                <option value="">{lang('choose_user')}</option>
                {foreach $related_group as $rel}
                    <option value="{$rel.group_id}"{if isset($usergroup_data)}{if $usergroup_data.group_id == $rel.group_id} selected="selected"{/if}{/if}>{$rel.group_name}</option>
                {/foreach}
        	</select>
    		
        </div>

    	<div class="form-group">
            <label>{$usergroup_fields.group_remark}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($usergroup_data)}{$usergroup_data.group_remark}{/if}" name="group_remark" />
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
                </div><!-- .content -->
            </div><!-- .block -->
