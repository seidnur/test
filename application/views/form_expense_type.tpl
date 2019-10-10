<div class="panel panel-default">
    <div class="panel-body">

        <a class="btn btn-sm btn-warning" href="expense_type"> <span class="fa fa-list"></span> {lang('listing')}</a>
        <a class="btn btn-success btn-sm" href="expense_type/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>

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

            <form class="form" method='post'
                  action='expense_type/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
                  enctype="multipart/form-data">


                        <div class="form-group">
                            <label>{$expense_type_fields.exp_type_name}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($expense_type_data)}{$expense_type_data.exp_type_name}{/if}"
                                       name="exp_type_name"/>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>{$expense_type_fields.exp_type_remark}<span class="error">*</span></label>
                            <div>
                                <textarea cols="5" rows="5" class="form-control" type="text" maxlength="255"
                                       value="{if isset($expense_type_data)}{$expense_type_data.exp_type_remark}{/if}"
                                          name="exp_type_remark"></textarea>
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
