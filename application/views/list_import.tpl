<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="import"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="import/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
            <h3> {lang("$table_name")}</h3>
            {if !empty( $import_data )}
                <form action="import/delete" method="post" id="listing_form">
                    <table class="table table-responsive">
                        <thead>
                        <th width="20" class="hidden-xs hidden-sm"></th>

            <th>{$import_fields.imp_date}</th>
			<th>{$import_fields.imp_item_id}</th>
			<th>{$import_fields.imp_item_amount}</th>
            <th>{$import_fields.imp_available_amount}</th>
            <th>{$import_fields.imp_sold_amount}</th>
			<th>{$import_fields.imp_sale_itm_unit_price}</th>
			<th>{$import_fields.imp_min_sale_price}</th>
			<th>{$import_fields.imp_sub_total}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                        {foreach $import_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td class="hidden-xs hidden-sm"><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.imp_id}"/></td>
                <td>{$row.imp_date}</td>
				<td> {$row.imp_item_id} </td>
				<td>{$row.imp_item_amount}</td>
                <td>{$row.imp_available_amount}</td>
                <td>{$row.imp_sold_amount}</td>
				<td>{$row.imp_sale_itm_unit_price}</td>
				<td>{$row.imp_min_sale_price}</td>
				<td>{$row.imp_sub_total}</td>

                                <td width="80">
                                    <a class="btn btn-xs btn-info"  href="import/show/{$row.imp_id}"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-warning" title="" href="import/edit/{$row.imp_id}"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-xs btn-danger"  href="javascript:chk('import/delete/{$row.imp_id}')"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-sm btn-danger" type="submit">
                                    {lang('delete_selected')}
                            </button>
                        </div>
                        <div class="pagination" style="margin:20px 0 2px 30px">
                            {$pager}
                        </div>
                    </div>
                </form>
            {else}
                {lang('no_record_found')}
            {/if}
            <div class="inner">
                <hr>
                <div class="col-lg-12">
                    <div class="col-md-3">
                     <strong>{lang('this_day_imports')}</strong>
                       <span class="badge">{$this_day_imports}</span>
                    </div>
                    <div class="col-md-3">
                        <strong>  {lang('this_week_imports')}</strong>
                    </div>

                    <div class="col-md-3">
                        <strong> {lang('this_month_imports')}</strong>
                    </div>
                    <div class="col-md-3">
                        <strong>   {lang('this_year_imports')}</strong>
                    </div>

                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- .panel-body -->
</div><!-- .panel -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <span class="fa fa-calendar"></span>
                    <small>
                        {if isset($this_day)}{$this_day}{/if}
                    </small>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">  {lang('this_day_imports')}</span>
                    <span class="info-box-number">
                        {if isset($this_day_imports)}{$this_day_imports}{/if}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-teal-active">
                    <span class="fa fa-calendar"></span> <small>
                                                {if isset($this_week)}{$this_week}{/if}
                    </small> </span>

                <div class="info-box-content">
                    <span class="info-box-text">{lang('this_week_imports')}</span>
                    <span class="info-box-number">
                        {if isset($this_week_imports)}{$this_week_imports}{/if}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-light-blue-active"><span class="fa fa-calendar"></span>
                    <small>
                        {if isset($this_month)}{$this_month}{/if}
                    </small>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">{lang('this_month_imports')}</span>
                    <span class="info-box-number">
                                {if isset($this_year_imports)}{$this_year_imports}{/if}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green-active">
                    <span class="fa fa-calendar"></span> <small>
                         {if isset($this_year)}{$this_year}{/if}
                    </small> </span>

                <div class="info-box-content">
                    <span class="info-box-text">{lang('this_year_imports')}</span>
                    <span class="info-box-number">
                                {if isset($this_year_imports)}{$this_year_imports}{/if}
                            </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
</div>
