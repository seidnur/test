 <div class="panel">                    
  <div class="panel-body">       
   <h3 class="page-title">List of {$table_name}</h3>
   <div id="sale_itemsGrid"></div></div></div>
   {literal}
   <script>
    $(function() {
      $("#sale_itemsGrid").jsGrid({
        width: "100%",
        filtering: true,
        editing: false,
        inserting: false,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 6,
        pageButtonCount: 5,
        insertedRowLocation: "top",
        deleteConfirm: "Do you really want to delete ?",
        rowClick: function (args) {
                //alert(args.item.act_id);
                var client = args.item; //for update
                console.log(args.item)
                var selectedRow = $("#sale_itemsGrid").find('table tr.jsgrid-selected-row tr.highlight');
                showDetailsDialog("Edit", client, selectedRow);
              },
              onItemUpdated: function (args) {
                var selectedRow = args.row;
                selectedRow.addClass("Highlight");
                setTimeout(function () {
                  selectedRow.removeClass('Highlight')
                }, 7000);
              },
              controller: {
                loadData: function() {                        
                  var d = $.Deferred();
                  $.ajax({
                    url: "sales/listGrid",
                    dataType: "json"
                  }).done(function(response) {
                    d.resolve(response.value);
                    console.log(response);
                  });
                  return d.promise();
                },
                updateItem: function(item) {
                  item['parentId']=$("#master_id").val();
                  item['foreignField']=$("#foreign_field_id").val();
                  var d = $.Deferred();
                  $.ajax({
                   type: "POST",
                   url: "sales/updateGrid",
                   data: item,
                   dataType: "json"
                 }).done(function(response) {
                   if(response.statusCode==200){
                    d.resolve(response.value);
                  }else{
                    d.reject().promise();
                  }
                  displayMessage(response.statusCode, response.type, response.errorMsg);
                });
                 return d.promise();
               },       
               deleteItem: function(item) {
                 var d = $.Deferred();
                 $.ajax({
                   type: "POST",
                   url: "sales/deleteGrid",
                   data: item,
                   dataType: "json"
                 }).done(function(response) {
                  if(response.statusCode==200){
                    d.resolve(response.value);
                  }else{
                    d.reject().promise();
                  }
                  displayMessage(response.statusCode, response.type, response.errorMsg);
                });
                 return d.promise();
               },
               insertItem: function(item) {                        
                 var d = $.Deferred();
                 item['parentId']=$("#master_id").val();
                 item['foreignField']=$("#foreign_field_id").val();
                 $.ajax({
                   type: "POST",
                   url: "sales/insertGrid",
                   data: item,
                   dataType: "json"
                 }).done(function(response) {
                  if(response.statusCode==200){
                    d.resolve(response.value);
                  }else{
                    d.reject().promise();
                  }
                  displayMessage(response.statusCode, response.type, response.errorMsg);
                });
                 return d.promise();
               }
             },                
             fields: [
             { name: 'lng_name', type: 'text', title: 'Lng Name', validate: 'required'  },
{ name: 'lng_deleted', type: 'text', title: 'Lng Deleted', validate: 'required'  },
{ name: 'lng_created_by', type: 'text', title: 'Lng Created By', validate: 'required'  },
{ name: 'lng_created_date', type: 'text', title: 'Lng Created Date', validate: 'required'  },
{ name: 'lng_remark', type: 'text', title: 'Lng Remark', validate: 'required'  },
          {
                type: 'control',
                headerTemplate: function () {
                  return $('<button>').attr('type', 'button').attr('class', 'btn btn-primary btn-sm').text('Add')
                  .on('click', function () {
                    showDetailsDialog('add', {}, '');
                  });
                }
              }

             ]
           });
      //START DIALOG CREATION
      var showDetailsDialog = function (dialogType, client, closestTr) {
        $('#modalBody').html('');
        $('body').off('click', '.hrm_langauge_action');
            //toggle modal
            $('#modal-default').modal('toggle');
            $.ajax({
              url: "hrm_langauge/getForm",
              data:{id:client.act_id},
              dataType: "json",
              type: "post"
            }).done(function (response) {
                //get response and append to modal body
                console.log(response);
                $('#modalBody').html(response.form);
              });
            $('body').on('click', '.hrm_langauge_action', function () {
                // var client=args.item; //for update
                // ADD TEXT ONLY VALIADATOR
                $.validator.addMethod('lettersonly', function (value, element) {
                  return this.optional(element) || /^[a-zA-Z\s\'\`]*$/.test(value);
                }, 'Please enter Letters only. numbers and special characters cannot be used in names'
                );
                // ADD TEXT ONLY VALIADATOR
                //START VALIDATION
                var formValidated = $("#hrm_langauge_form").validate({
                  /*rules: {
                    act_name: {
                      required: true,
                      minlength: 4,
                      maxlength: 20,
                      lettersonly: true
                    },
                    act_remark: {
                      required: true,
                      minlength: 10,
                      maxlength: 100,
                      lettersonly: true
                    }
                  }*/
                }).form();
                //END FORM VALIDATION
                if (formValidated == false) {
                      //MODAL STAYS ON UNTIL CLOSED OR SUBMITTED WITH VALID DATA
                    } else {
                      $.extend(client, {
                        //act_name: $("#act_name").val(),
                        //act_remark: $("#act_remark").val(),
                      });
                      $("#sale_itemsGrid").jsGrid(dialogType == "Edit" ? "updateItem" : "insertItem", client);
                    }
                  });
          };
        //END DIALOG CREATION
      });
    </script>
    {/literal}