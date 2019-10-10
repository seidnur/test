<div class="panel panel-default">
    <div class="panel-body">
     
        <a class="btn btn-sm btn-warning" href="zeka"> <span class="fa fa-list"></span>  Listing</a>
        <a class="btn btn-success btn-sm" href="zeka/create/"> <span class="fa fa-plus"></span> New record</a>
        
        <div class="inner">
            {if $action_mode == 'create'}
            <h3>Add new record</h3>
            {else}
            <h3>Edit record: #{$record_id}</h3>
            {/if}
            {if isset($errors)}
            <div class="flash">
                <div class="alert alert-danger error">
                    <p>{$errors}</p>
                </div>
            </div>
            {/if}

            <form class="form" method='post' action='zeka/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                
               <div class="form-group">
                <label>{$zeka_fields.amount}<span class="error">*</span></label>
                <div>
                   <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.amount}{/if}" name="amount" />
               </div>
               
           </div>
           
           <div class="form-group">
            <label>{$zeka_fields.Year}<span class="error">*</span></label>
            <div>
               <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.Year}{/if}" name="Year" />
           </div>
           
       </div>
       
       <div class="form-group">
        <label>{$zeka_fields.is_paid}<span class="error">*</span></label>
        <div>
           <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.is_paid}{/if}" name="is_paid" />
       </div>
       
   </div>
   
   <div class="form-group">
    <label>{$zeka_fields.percent}<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.percent}{/if}" name="percent" />
   </div>
   
</div>

<div class="form-group">
    <label>{$zeka_fields.date_paid}<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.date_paid}{/if}" name="date_paid" />
   </div>
   
</div>

<div class="form-group">
    <label>{$zeka_fields.date_calculated}<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.date_calculated}{/if}" name="date_calculated" />
   </div>
   
</div>

<div class="form-group">
    <label>{$zeka_fields.remark}<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.remark}{/if}" name="remark" />
   </div>
   
</div>

<div class="form-group">
    <label>{$zeka_fields.calculated_by}<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.calculated_by}{/if}" name="calculated_by" />
   </div>
   
</div>

<div class="form-group">
    <label>{$zeka_fields.paid_by}<span class="error">*</span></label>
    <div>
       <input class="form-control" type="text" maxlength="255" value="{if isset($zeka_data)}{$zeka_data.paid_by}{/if}" name="paid_by" />
   </div>
   
</div>


<div class="form-group button-actions box-footer">
    <div class="col-md-offset-4 col-md-6">
        <button class="btn btn-success" type="submit">
           Save
       </button>
       <span class="text_button_padding">or</span>
       <a class="btn btn-default link_button" href="javascript:window.history.back();">Cancel</a>
   </div>
</div>
</form>
</div><!-- .inner -->
</div><!-- .content -->
</div><!-- .block -->
