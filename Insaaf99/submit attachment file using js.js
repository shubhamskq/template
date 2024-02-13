$('.sub_req').click(function() {
    // Create a FormData object to send both form data and file
    var formData = new FormData();
    var arr = $('#member_form').serializeArray();
    
    // Serialize form data and append it to the FormData object
    $.each(arr, function(i, field){
        formData.append(field.name, field.value);
    });
    console.log(formData);
    // Append the file to FormData
    var files = $('#ata')[0].files; // Get the file objects

// Iterate through each file and append it to the FormData object
    for (var i = 0; i < files.length; i++) {
        formData.append('attachfile[]', files[i]);
    }

    var url = '<?php echo base_url('client/documentation/sub_req') ?>';
    
    $.ajax({
        url : url,
        type : "POST",
        data : formData,
        processData: false,  // Important! Don't process the files
        contentType: false,  // Important! Set content type to false
        success : function(res){
            if(res == 1){
                alertify.alert("Thank you for submitting the form. Our team will contact you soon!");
                setTimeout(function() {
                    location.reload();
                }, 4300);
            }
            else {
                alertify.alert("Something went wrong. Please try again!");
            }
        }
    });
});
