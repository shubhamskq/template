$('.fetchpay').click(function() {
    $('#exampleModal1').modal('show');
    var id = $('#fetchorderid').val();
    var url = '<?php echo base_url() ?>admin/payment/fetchpayment';

    $.ajax({
        type : 'POST',
        url : url,
        data : {
            id : id
        },
        success: function(res){
            var r = JSON.parse(res);
            // var s = JSON.stringify(r);
            var s;
            // document.getElementById("modalContent").innerText = s;
            var modalBody = document.getElementById('modal_body');
           for (var key in r) {
            var paragraph = document.createElement('p');
            paragraph.textContent =  (r[key] !== '' ? JSON.stringify(r[key]) : 'null');
            modalBody.appendChild(paragraph);
        }

            $('#exampleModal1').modal('hide');
            $('#myModal').modal('show');
            
        }
    });
});
