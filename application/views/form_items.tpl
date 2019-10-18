<div class="panel panel-default">
                <div class="panel-body">
                  
                        <a class="btn btn-sm btn-warning" href="items"> <span class="fa fa-list"></span>  {lang('listing')}</a>
                        <a class="btn btn-success btn-sm" href="items/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
                   
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
               
                        <form class="form" method='post' action='items/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

              <div class="col-lg-12" style="margin-top:30px">
               <div class="col-lg-6">               
    	<div class="form-group">
            <label>{$items_fields.Itm_name}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($items_data)}{$items_data.Itm_name}{/if}" name="Itm_name" />
    		</div>
    		
    	</div>
    

    
    	    
    	    
    	<div class="form-group">
            <label>{$items_fields.itm_remark}</label>
                  {$success}
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($items_data)}{$items_data.itm_remark}{/if}" name="itm_remark" />
    		</div>
    		
    	</div>
    	</div>
    	<div class="col-lg-6">

    	<div class="form-group">
            <label >{$items_fields.brand_id}<span class="error">*</span></label>
    		<select class="form-control" name="brand_id" >
                {foreach $related_brands as $rel}
                    <option value="{$rel.brands_id}"{if isset($items_data)}{if $items_data.brand_id == $rel.brands_id} selected="selected"{/if}{/if}>{$rel.brands_name}</option>
                {/foreach}
        	</select>
    		
        </div>
    
    	<div class="form-group">
            <label >{$items_fields.itm_cat_id}<span class="error">*</span></label>
    		<select class="form-control" name="itm_cat_id" required>
                <option value="">choose category</option>
                {foreach $related_categories as $rel}
                    <option value="{$rel.categories_id}"{if isset($items_data)}{if $items_data.itm_cat_id == $rel.categories_id} selected="selected"{/if}{/if}>{$rel.categories_name}</option>
                {/foreach}
        	</select>
    		
        </div>

    	<!-- <div class="form-group">
            <label>{$items_fields.itm_available_quantity}</label>
    		<div>
    	       	<input readonly="readonly" value="0" class="form-control" type="text" maxlength="255" value="{if isset($items_data)}{$items_data.itm_available_quantity}{/if}" name="itm_available_quantity" />
    		</div>
    		
    	</div> -->
    </cdiv>
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
