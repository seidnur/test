<div class="panel panel-default">
    <div class="panel-body">

        <a class="btn btn-sm btn-warning" href="employee"> <span class="fa fa-list"></span> {lang('listing')}</a>
        <a class="btn btn-success btn-sm" href="employee/create/"> <span class="fa fa-plus"></span>{lang('new_record')}</a>

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

            <form class="form" method='post' action='employee/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
            enctype="multipart/form-data">

            <div class="col-lg-12" style="margin-top:20px">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>{$employee_fields.emp_first_name}<span class="error">*</span></label>
                        <div>
                            <input class="form-control" type="text" maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_first_name}{/if}"
                            name="emp_first_name"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>{$employee_fields.emp_middle_name}<span class="error">*</span></label>
                        <div>
                            <input class="form-control" type="text" maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_middle_name}{/if}"
                            name="emp_middle_name"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>{$employee_fields.emp_last_name}<span class="error">*</span></label>
                        <div>
                            <input class="form-control" type="text"  required maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_last_name}{/if}"
                            name="emp_last_name"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>{$employee_fields.emp_gender}<span class="error">*</span></label>
                        <select class="form-control" name="emp_gender" required>
                            <option value="">Choose Gender</option>
                            {foreach $metadata.emp_gender.enum_values as $k => $e}
                            <option value="{$e}" {if isset($employee_data.emp_gender)}{if $employee_data.emp_gender == $metadata.emp_gender.enum_names[$k]} selected="selected"{/if}{/if}>{$metadata.emp_gender.enum_names[$k]}</option>
                            {/foreach}
                        </select>


                    </div>

                    <div class="form-group">
                        <label>{$employee_fields.emp_birth_date}<span class="error">*</span></label>
                        <div>
                            <input class="form-control datepicker bdate" type="text" maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_birth_date}{/if}"
                            name="emp_birth_date"/>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>{$employee_fields.emp_hire_date}<span class="error">*</span></label>
                        <div>
                            <input class="form-control datepicker" type="text" required maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_hire_date}{/if}"
                            name="emp_hire_date"/>
                        </div>

                    </div>


                    <div class="form-group">
                        <label>{$employee_fields.emp_remark}<span class="error">*</span></label>
                        <div>
                            <input class="form-control" type="text" maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_remark}{/if}"
                            name="emp_remark"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>{$employee_fields.emp_salary}</label>
                        <div>
                            <input class="form-control" type="number" maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_salary}{/if}"
                            name="emp_salary"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>{$employee_fields.emp_phone}</label>
                        <div>
                            <input class="form-control" type="text" required maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_phone}{/if}"
                            name="emp_phone"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>{$employee_fields.emp_email}</label>
                        <div>
                            <input class="form-control" type="text" maxlength="255"
                            value="{if isset($employee_data)}{$employee_data.emp_email}{/if}"
                            name="emp_email"/>
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
</div><!-- .pane-body -->
</div><!-- .panel -->
