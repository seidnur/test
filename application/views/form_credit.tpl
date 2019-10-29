<div class="panel panel-default">
    <div class="panel-body">
        <a class="btn btn-sm btn-warning" href="credit"> <span class="fa fa-liist"></span> {lang('listing')}</a>
        <a class="btn btn-success btn-sm" href="credit/create/"> <span class="fa fa-plus"></span> {lang('new_record')}
        </a>

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

            <form class="form" method='post' action='credit/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
                  enctype="multipart/form-data">

                <div class="col-lg-12" style="margin-top:20px">
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label>{$credit_fields.cr_full_name}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_full_name}{/if}"
                                       name="cr_full_name"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{$credit_fields.cr_product}<span class="error">*</span></label>
                            <select class="field form-control select addr" name="cr_product">
                                <option value="0"> choose Item to Give</option>
                                {foreach $related_items as $rel}
                                    <option value="{$rel.items_id}"
                                            {if isset($credit_data)}{if $credit_data.cr_product == $rel.items_id} selected="selected"{/if}{/if}>{$rel.items_name}</option>
                                {/foreach}
                            </select>

                        </div>

                        <div class="form-group">
                            <label>{$credit_fields.cr_unit_price}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="number" step="0.001" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_unit_price}{/if}"
                                       name="cr_unit_price"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>{$credit_fields.cr_quantity}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="number" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_quantity}{/if}"
                                       name="cr_quantity"/>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label>{$credit_fields.cr_phone_number}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_phone_number}{/if}"
                                       name="cr_phone_number"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>{$credit_fields.cr_address}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_address}{/if}"
                                       name="cr_address"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>{$credit_fields.cr_given_date}<span class="error">*</span></label>
                            <div>
                                <input class="form-control datepicker" type="text" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_given_date}{/if}"
                                       name="cr_given_date"/>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>{$credit_fields.cr_customer_gender}<span class="error">*</span></label>

                            <select class="field form-control select addr" name="cr_customer_gender">
                                <option value="0"></option>
                                {foreach $metadata.cr_customer_gender.enum_values as $k => $e}
                                    <option value="{$e}"{if isset($credit_data.cr_customer_gender)}{if $credit_data == $metadata.cr_customer_gender.enum_names[$k]} selected="selected"{/if}{/if}>{$metadata.cr_customer_gender.enum_names[$k]}</option>
                                {/foreach}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{$credit_fields.cr_return_date}<span class="error">*</span></label>
                            <div>
                                <input class="form-control datepicker" type="text" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_return_date}{/if}"
                                       name="cr_return_date"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>{$credit_fields.cr_actual_return_date}<span class="error">*</span></label>
                            <div>
                                <input class="form-control datepicker" type="text" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_actual_return_date}{/if}"
                                       name="cr_actual_return_date"/>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>{$credit_fields.cr_remark}<span class="error">*</span></label>
                            <div>
                                <input class="form-control" type="text" maxlength="255"
                                       value="{if isset($credit_data)}{$credit_data.cr_remark}{/if}" name="cr_remark"/>
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
                        <a class="btn btn-default link_button"
                           href="javascript:window.history.back();">{lang('cancel')}</a>
                    </div>
                </div>
            </form>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
