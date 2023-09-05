<?php

  <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url= "<?php echo base_url()?>query/deleteAll" disabled="disabled">Delete Selected</button>
<input type="checkbox" class="sub_chk" name="checkbox" data-id="<?php echo $row->id; ?>">


<!-- Delete Script-->
<script type="text/javascript">  
    $(document).ready(function () {  
        

      $(".delete_all").attr('disabled', 'disabled');
    jQuery(document).on("click", ".sub_chk", function() {
        var da = $("input:checkbox[name=checkbox]:checked");
        if (da.length != "") {
            jQuery(".delete_all").removeAttr("disabled");
        } else {
            $(".delete_all").attr('disabled', 'disabled');
        }
       });


        $('#master').on('click', function(e) {  
         if($(this).is(':checked',true))    
         {  
            $(".sub_chk").prop('checked', true);    
         } else {    
            $(".sub_chk").prop('checked',false);    
         }    
        });  
   
        $('.delete_all').on('click', function(e) {  
   
            var allVals = [];    
            $(".sub_chk:checked").each(function() {    
                allVals.push($(this).attr('data-id'));  
            });    
   
            if(allVals.length <=0)    
            {    
                alert("Please select row.");    
            }  else {    
   
                var check = confirm("Are you sure you want to delete this row?");    
                if(check == true){    
   
                    var join_selected_values = allVals.join(",");   
   
                    $.ajax({  
                        url:  "<?php echo base_url()?>query/deleteAll",  
                        type: 'POST',  
                        data: 'ids='+join_selected_values,  
                        success: function (data) {  
                          console.log(data);  
                          $(".sub_chk:checked").each(function() {    
                              $(this).parents("tr").remove();  
                          });  
                          alert("Item Deleted successfully.");  
                        },  
                        error: function (data) {  
                            alert(data.responseText);  
                        }  
                    });  
   
                  $.each(allVals, function( index, value ) {  
                      $('table tr').filter("[data-row-id='" + value + "']").remove();  
                  });  
                }    
            }    
        });  
    });  
</script>

?>
