<div class="panel panel-default">

    <div class="panel-body">
        <a href="group/create/" class="btn btn-success btn-sm">
            <i class="fa fa-plus" aria-hidden="true"></i> {lang('new_record')}
        </a>
        <a href="group/" class="btn btn-warning btn-sm">
            <i class="fa fa-list-ul" aria-hidden="true"></i> {lang('listing')}
        </a>
        <div class="inner">
              {if $action_mode == 'create'}
                            <h3>{lang('new_record')}</h3>
                        {else}
                            <h3>{lang('edit_record')}: #{$record_id}</h3>
                        {/if}
            {if isset($errors)}
                <div class="flash">
                    <div class="message error">
                        <p>{$errors}</p>
                    </div>
                </div>
            {/if}

            <form class="form-group" method='post'
                  action='permission/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
                  enctype="multipart/form-data">
                <input type="hidden" id="group" name="group" value="{if isset($record_id)}{$record_id}{/if}">
                <label for="permission">Permissions</label>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>{lang('Module')}</th>
                        <th>{lang('Create')}</th>
                        <th>{lang('Update')}</th>
                        <th>{lang('View')}</th>
                        <th>{lang('Delete')}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{lang('employee')}</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    {if 'createEmployee'|in_array:$permission_data } checked="checked" {/if}
                                   value="createEmployee">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'updateEmployee'|in_array:$permission_data } checked="checked" {/if}
                                   value="updateEmployee">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'viewEmployee'|in_array:$permission_data } checked="checked" {/if}
                                   value="viewEmployee">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'deleteEmployee'|in_array:$permission_data } checked="checked" {/if}
                                   value="deleteEmployee">
                        </td>
                    </tr>
                   



                     <tr>
                        <td>{lang('Tbl_campany')}</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    {if 'createBrand'|in_array:$permission_data } checked="checked" {/if}
                                   value="createBrand">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'updateBrand'|in_array:$permission_data } checked="checked" {/if}
                                   value="updateBrand">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'viewBrand'|in_array:$permission_data } checked="checked" {/if}
                                   value="viewBrand">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'deleteBrand'|in_array:$permission_data } checked="checked" {/if}
                                   value="deleteBrand">
                        </td>
                    </tr>

                      <tr>
                        <td>{lang('group')}</td> 
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    {if 'createGroup'|in_array:$permission_data } checked="checked" {/if}
                                   value="createGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'updateGroup'|in_array:$permission_data } checked="checked" {/if}
                                   value="updateGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'viewGroup'|in_array:$permission_data } checked="checked" {/if}
                                   value="viewGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'deleteGroup'|in_array:$permission_data } checked="checked" {/if}
                                   value="deleteGroup">
                        </td>
                    </tr>
                    <tr>
                        <td>{lang('usergroup')}</td> 
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    {if 'createUserGroup'|in_array:$permission_data } checked="checked" {/if}
                                   value="createUserGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'updateUserGroup'|in_array:$permission_data } checked="checked" {/if}
                                   value="updateUserGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'viewUserGroup'|in_array:$permission_data } checked="checked" {/if}
                                   value="viewUserGroup">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'deleteUserGroup'|in_array:$permission_data } checked="checked" {/if}
                                   value="deleteUserGroup">
                        </td>
                    </tr>
                    <tr>
                        <td>{lang('users')}</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    {if 'createUser'|in_array:$permission_data } checked="checked" {/if}
                                   value="createUser">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'updateUser'|in_array:$permission_data } checked="checked" {/if}
                                   value="updateUser">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'viewUser'|in_array:$permission_data } checked="checked" {/if}
                                   value="viewUser">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'deleteUser'|in_array:$permission_data } checked="checked" {/if}
                                   value="deleteUser">
                        </td>
                    </tr>
                    
                    <tr>
                        <td> {lang('permission')}</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    {if 'createPermission'|in_array:$permission_data } checked="checked" {/if}
                                   value="createPermission">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'updatePermission'|in_array:$permission_data } checked="checked" {/if}
                                   value="updatePermission">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'viewPermission'|in_array:$permission_data } checked="checked" {/if}
                                   value="viewPermission">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'deletePermission'|in_array:$permission_data } checked="checked" {/if}
                                   value="deletePermission">
                        </td>
                    </tr>            <tr>
                        <td> {lang('Bidding_document')}</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    {if 'createBidding_document'|in_array:$permission_data } checked="checked" {/if}
                                   value="createBidding_document">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'updateBidding_document'|in_array:$permission_data } checked="checked" {/if}
                                   value="updateBidding_document">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'viewBidding_document'|in_array:$permission_data } checked="checked" {/if}
                                   value="viewBidding_document">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'deleteBidding_document'|in_array:$permission_data } checked="checked" {/if}
                                   value="deleteBidding_document">
                        </td>
                    </tr> <tr>
                        <td> {lang('Bidders')}</td>
                        <td>
                            <input type="checkbox" name="permission[]" id="permission"
                                    {if 'createBidders'|in_array:$permission_data } checked="checked" {/if}
                                   value="createBidders">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'updateBidders'|in_array:$permission_data } checked="checked" {/if}
                                   value="updateBidders">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'viewBidders'|in_array:$permission_data } checked="checked" {/if}
                                   value="viewBidders">
                        </td>
                        <td><input type="checkbox" name="permission[]" id="permission"
                                    {if 'deleteBidders'|in_array:$permission_data } checked="checked" {/if}
                                   value="deleteBidders">
                        </td>
                    </tr>

                      
                    </tbody>
                </table>
                <!-- /.box-body -->
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
