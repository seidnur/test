<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="zeka"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="zeka/create/"> <span class="fa fa-plus"></span>{lang('new_record')}</a>

              <h3>
                {if $selected_language=='english'}
                   {lang('details')} {lang('of')} {lang("$table_name")} {lang('record')} #{$id}
                {elseif $selected_language=='amharic'}
                          {lang('of')}{lang("$table_name")} {lang('record')} #{$id} {lang('details')}  
                {/if}    
                </h3> 

            <table class="table table-responsive" width="50%">
                <tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.zeka_id}:</td>
                            <td>{$zeka_data.zeka_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.amount}:</td>
                            <td>{$zeka_data.amount}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.Year}:</td>
                            <td>{$zeka_data.Year}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.is_paid}:</td>
                            <td>{$zeka_data.is_paid}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.percent}:</td>
                            <td>{$zeka_data.percent}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.date_paid}:</td>
                            <td>{$zeka_data.date_paid}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.date_calculated}:</td>
                            <td>{$zeka_data.date_calculated}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.remark}:</td>
                            <td>{$zeka_data.remark}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.calculated_by}:</td>
                            <td>{$zeka_data.calculated_by}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$zeka_fields.paid_by}:</td>
                            <td>{$zeka_data.paid_by}</td>
                        </tr>
            </table>
            <div class="actions-bar wat-cf">
                <div class="actions">
                    <a class="btn btn-warning" href="zeka/edit/{$id}">
                        <span class="fa fa-edit"></span> Edit record
                    </a>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
