<div class="panel panel-default">
    <div class="panel-body">
        <div class="inner">
            <a class="btn btn-warning btn-sm" href="sales"><span class="fa fa-list"></span> {lang('listing')}</a>
            <a class="btn btn-sm btn-success" href="sales/create/"> <span
                        class="fa fa-plus"></span> {lang('new_record')}</a>
             <form action="sales/search" method="post" id="search_form">
                {if isset($search_form)}{$search_form}{/if}
            </form>
            <h3>
                {if $selected_language=='english'}
                    {lang('listing')} {lang('of')} {lang("$table_name")}
                {elseif $selected_language=='amharic'}
                    {lang('of')}{lang("$table_name")} {lang('listing')}
                {/if}      </h3>
            {if isset($errors)}
                <div class="flash">
                    <div class="alert alert-danger error">
                        <p>{$errors}</p>
                    </div>
                </div>
            {/if}
            {if isset($success)}
                <div class="flash">
                    <div class="alert alert-success">
                        <p>{$success}</p>
                    </div>
                </div>
            {/if}

            {if !empty( $sales_data )}
                <table class="table table-responsive table-condensed">
                    <thead>
                    <th width="20" class=" hidden-xs hidden-sm"></th>

                    <th class="text-center">{$sales_fields.Date_sold}</th>
                    <th class="text-center">{$sales_fields.sale_itm_id}</th>
                    <th class="text-center">{$sales_fields.sale_item_amount}</th>
                    <th class="text-center">{$sales_fields.sold_price}</th>
                    <th class="text-center">{$sales_fields.profit}</th>
                    <th class="text-center">{$sales_fields.soled_by}</th>
                    <th class="text-center">{$sales_fields.Sale_sub_total}</th>

                    <th width="80">Actions</th>
                    </thead>
                    <tbody>
                    {foreach $sales_data as $row}
                        <tr class=" {cycle values='odd,even'}">
                            <td class=" hidden-xs hidden-sm"><input type="checkbox" class="checkbox" name="delete_ids[]"
                                                                    value="{$row.sale_id}"/></td>
                            <td class="text-center">{$row.Date_sold}</td>
                            <td class="text-center">{$row.sale_itm_id}</td>
                            <td class="text-center">{$row.sale_item_amount}</td>
                            <td class="text-center">{$row.sold_price}</td>
                            <td class="text-center">{$row.profit}</td>
                            <td class="text-center">{$row.soled_by}</td>
                            <td class="text-center">{$row.Sale_sub_total}</td>

                            <td width="80">
                                <a class="btn btn-xs btn-info" href="sales/show/{$row.sale_id}"><span
                                            class="fa fa-eye"></span></a>
                                <a class="btn btn-xs btn-warning" href="sales/edit/{$row.sale_id}"><span
                                            class="fa fa-edit"></span></a>
                                <a class="btn btn-xs btn-danger"
                                   href="javascript:chk('sales/delete/{$row.sale_id}')"><span
                                            class="fa fa-trash-o"></span></a>
                            </td>
                        </tr>
                    {/foreach}

                    </tbody>
                </table>
                <div class="pagination" style="margin: 10px 0 2px 0">
                    {$pager}
                </div>
            {else}
                {lang('no_records_found')}
            {/if}
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green"> <span class="fa fa-calendar"></span>
                    <small>
                        {if isset($this_day)}{$this_day}{/if}

                    </small> </span>

                <div class="info-box-content">
                    <span class="info-box-text">  {lang('this_day_sells')}</span>
                    <span class="info-box-number">

                               {if isset($this_day_sales)}{$this_day_sales}{/if}
                            </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-teal-active"> <span class="fa fa-calendar"></span>
                    <small>
                        {if isset($this_week)}{$this_week}{/if}

                    </small> </span>

                <div class="info-box-content">
                    <span class="info-box-text">{lang('this_week_sells')}</span>
                    <span class="info-box-number">

                        {if isset($this_week_sales)}{$this_week_sales}{/if}

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

                    </small></span>

                <div class="info-box-content">
                    <span class="info-box-text">{lang('this_month_sells')}</span>
                    <span class="info-box-number">
                        {if isset($this_month_sales)}{$this_month_sales}{/if}

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
                    <span class="info-box-text">{lang('this_year_sells')}</span>
                    <span class="info-box-number">
                        {if isset($this_year_sales)}{$this_year_sales}{/if}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
</div>

