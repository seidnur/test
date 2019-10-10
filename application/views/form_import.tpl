   <div class="panel panel-default">
                   <div class="panel-body">
                      
                           <a class="btn btn-sm btn-warning" href="import"> 
                           <span class="fa fa-list"></span>  {lang('listing')}</a>
                           <a class="btn btn-success btn-sm" href="import/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
                     
                       <div class="inner">
                           {if $action_mode == 'create'}
                               <h3>{lang('new_record')}</h3>
                           {else}
                               <h3>{lang('edit_record')}: #{$record_id}</h3>
                           {/if}
                           {if isset($errors)}
                               <div class="flash">
                                   <div class="alert alert-danger">
                                       <p>{$errors}</p>
                                   </div>
                               </div>
                           {/if}
                           <form class="form" method='post' action='import/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">
                               
       	<div class="form-group">
               <label>{$import_fields.imp_item_id}<span class="error">*</span> </label>
       		<select class="form-control"  required="required"  name="imp_item_id" >
                   <option value="">{lang('choose_item')}</option>
                   {foreach $related_items as $rel}
                       <option value="{$rel.items_id}"{if isset($import_data)}{if $import_data.imp_item_id == $rel.items_id} selected="selected"{/if}{/if}>{$rel.items_name}</option>
                   {/foreach}
           	</select>
       		
           </div>
       
       	<!-- <div class="form-group">
               <label>{$import_fields.imp_sold_amount}<span class="error">*</span></label>
       		<div>
       	       	<input class="form-control" type="text" maxlength="255" value="{if isset($import_data)}{$import_data.imp_sold_amount}{/if}" name="imp_sold_amount" />
       		</div>
       		
       	</div> -->
       
       	<div class="form-group">
               <label>{$import_fields.imp_item_amount}<span class="error">*</span></label>
       		<div>
       	       	<input class="form-control" required="required" type="number" maxlength="255" value="{if isset($import_data)}{$import_data.imp_item_amount}{/if}" name="imp_item_amount" />
       		</div>
       		
       	</div>
       
         <div class="form-group">
               <label>{$import_fields.imp_sale_itm_unit_price}<span class="error">*</span></label>
       		<div>
       	       	<input class="form-control" type="number" step="0.001" maxlength="255" value="{if isset($import_data)}{$import_data.imp_sale_itm_unit_price}{/if}" name="imp_sale_itm_unit_price" />
       		</div>
       		
       	</div> 
      
       
       	<div class="form-group">
               <label>{$import_fields.imp_min_sale_price}</label>
       		<div>
       	       	<input class="form-control" required="required" type="number" step="0.001" maxlength="255" value="{if isset($import_data)}{$import_data.imp_min_sale_price}{/if}" name="imp_min_sale_price" />
       		</div>
       		
       	</div>
       
       	<div class="form-group">
               <label>{$import_fields.imp_sub_total}<span class="error">*</span></label>
       		<div>
       	       	<input readonly="readonly" class="form-control" type="text" maxlength="255" value="{if isset($import_data)}{$import_data.imp_sub_total}{/if}" name="imp_sub_total" />
       		</div>
       		
       	</div>
       
       	<div class="form-group">
               <label>{$import_fields.imp_date}<span class="error">*</span></label>
       		<div>
       	       	<input class="datepicker form-control" required="required" type="text" maxlength="255" value="{if isset($import_data)}{$import_data.imp_date}{/if}" name="imp_date" />
       		</div>
       		
       	</div>
       
          	<div class="form-group">
           <label>{$import_fields.imp_remark}<span class="error">*</span></label>
       		<div>
       	       	<input class="form-control" type="text" maxlength="255" value="{if isset($import_data)}{$import_data.imp_remark}{/if}" name="imp_remark" />
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
                   </div><!-- .panel-body -->
               </div><!-- .panel -->
