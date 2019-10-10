<div class="panel panel-default">
                <div class="panel-body">
                  
                        <a class="btn btn-sm btn-warning" href="brands">
                         <span class="fa fa-list"></span>  {lang('listing')}</a>
                        <a class="btn btn-success btn-sm" href="brands/create/"> <span class="fa fa-plus"></span> {lang('new_record')}</a>
                 
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

                        <form class="form" method='post' action='brands/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label>{$brands_fields.brand_name}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($brands_data)}{$brands_data.brand_name}{/if}" name="brand_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label>{$brands_fields.brand_description}<span class="error">*</span></label>
    		<div>
    	       	<input class="form-control" type="text" maxlength="255" value="{if isset($brands_data)}{$brands_data.brand_description}{/if}" name="brand_description" />
    		</div>
    		
    	</div>
                          <div class="form-group">
            <label>{$brands_fields.brand_cat_id}</label>
            <select class="form-control" name="brand_cat_id" >
                <option value="0"></option>
                {foreach $related_categories as $rel}
                    <option value="{$rel.categories_id}"{if isset($brands_data)}{if $brands_data.brand_cat_id == $rel.categories_id} selected="selected"{/if}{/if}>{$rel.categories_name}</option>
                {/foreach}
            </select>
            
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
