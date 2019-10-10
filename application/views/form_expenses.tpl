<div class="panel panel-default">
    <div class="panel-body">

        <a class="btn btn-sm btn-warning" href="expenses"> <span class="fa fa-list"></span> {lang('listing')}</a>
        <a class="btn btn-success btn-sm" href="expenses/create/"> <span class="fa fa-plus"></span>{lang('new_record')}</a>

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

            <form class="form" method='post' action='expenses/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
                  enctype="multipart/form-data">

                <div class="col-lg-12" style="margin-top:20px">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{$expenses_fields.exp_reason_id}<span class="error">*</span></label>
                            <select class="field form-control select addr" name="exp_reason_id">
                                <option value="0">choose expense type</option>
                                {foreach $related_expense_type as $rel}
                                    <option value="{$rel.expense_type_id}"{if isset($expenses_data)}{if $expenses_data.exp_reason_id == $rel.expense_type_id} selected="selected"{/if}{/if}>{$rel.expense_type_name}</option>
                                {/foreach}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{$expenses_fields.year}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($expenses_data)}{$expenses_data.year}{/if}" name="year"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{$expenses_fields.Month}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($expenses_data)}{$expenses_data.Month}{/if}" name="Month"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{$expenses_fields.amount}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($expenses_data)}{$expenses_data.amount}{/if}" name="amount"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{$expenses_fields.paid}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($expenses_data)}{$expenses_data.paid}{/if}" name="paid"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{$expenses_fields.remark}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($expenses_data)}{$expenses_data.remark}{/if}" name="remark"/>
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
