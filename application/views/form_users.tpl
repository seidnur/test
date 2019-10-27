    <div class="panel panel-default">
                    <div class="panel-body">
                    <div class="col-md-12 col-xs-12">
          
          

                            <a class="btn btn-sm btn-warning" href="users"> <span class="fa fa-list"></span>  {lang('listing')}</a>
                            <a class="btn btn-success btn-sm" href="users/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
                        <div class="inner">
                            {if $action_mode == 'create'}
                                <h3>{lang('create_record')}</h3>
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

                            <form class="form" method='post' action='users/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">
    <div class="col-lg-12" style="margin-top:20px">
                                <div class="col-lg-6">
        	<div class="form-group">
                <label>{$users_fields.user_name}<span class="error">*</span></label>
        		<div>
        	       	<input class="form-control" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.user_name}{/if}" name="user_name" />
        		</div>
        	</div>
        	<div class="form-group">
                <label>{$users_fields.user_password}<span class="error">*</span></label>
        		<div>
        	       	<input class="form-control"  type="password" maxlength="255" autocomplete="new-password" value="{if isset($users_data)}{$users_data.user_password}{/if}" name="user_password" />
        		</div>
        	</div>
        	<div class="form-group">
                <label >{$users_fields.user_emp_id}<span class="error">*</span></label>
        		<select class="field form-control select addr" name="user_emp_id" >
                    <option value="0"></option>
                    {foreach $related_employee as $rel}
                        <option value="{$rel.employee_id}"{if isset($users_data)}{if $users_data.user_emp_id == $rel.employee_id} selected="selected"{/if}{/if}>{$rel.employee_name}</option>
                    {/foreach}
            	</select>
            </div>
            </div>
            <div class="col-lg-6">
         	<div class="form-group">
                <label>{$users_fields.user_remark}<span class="error">*</span></label>
        		<div>
        	       	<input class="form-control" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.user_remark}{/if}" name="user_remark" />
        		</div>
        	</div>
        	<div class="form-group">
                <label>{$users_fields.user_accout_status}</label>
        		<div>
        	       	<input class="form-control" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.user_accout_status}{/if}" name="user_accout_status" />
        		</div>
        	</div>
        	<div class="form-group">
                <label>{$users_fields.user_email}</label>
        		<div>
        	       	<input class="form-control" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.user_email}{/if}" name="user_email" />
        		</div>
        	</div>
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
