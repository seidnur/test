<div class="panel panel-default"
<div class="panel-body">
    <div class="inner">
        <a class="btn btn-warning btn-sm" href="setting"><span class="fa fa-list"></span>{lang('listing')}</a>
        <a class="btn btn-success btn-sm" href="setting/create/"><span class="fa fa-pulse"></span> {lang('new_record')}
        </a>

    </div>
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

            <form class="form" method='post' action='setting/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
                  enctype="multipart/form-data">


                <div class="form-form-group">
                    <label>{$setting_fields.service_charge_value}<span class="error">*</span></label>
                    <div>
                        <input class="form-control" type="text" maxlength="255"
                               value="{if isset($setting_data)}{$setting_data.service_charge_value}{/if}"
                               name="service_charge_value"/>
                    </div>

                </div>

                <div class="form-form-group">
                    <label>{$setting_fields.vat_charge_value}<span class="error">*</span></label>
                    <div>
                        <input class="form-control" type="text" maxlength="255"
                               value="{if isset($setting_data)}{$setting_data.vat_charge_value}{/if}"
                               name="vat_charge_value"/>
                    </div>

                </div>

                <div class="form-form-group">
                    <label>{$setting_fields.currency}<span class="error">*</span></label>
                    <div>
                        <input class="form-control" type="text" maxlength="255"
                               value="{if isset($setting_data)}{$setting_data.currency}{/if}" name="currency"/>
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
