
<!-- add new user modal -------------------------- -->
<div class="modal" tabindex="-1" id="addNewAddressModal">

 <div class="modal-dialog" id="res_modal" style="z-index:999">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <p class="text-danger para_modal">You are not registred</p>
            </div>
                <div class="modal-body">
                    <!-- body data-->
                     <div class="row mb-6">
                        <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form7dc">First Name<span>*</span></label>
                                <input type="text" id="res_first" class="form-control" name="res_first"
                                    placeholder="Enter Firstname" required />
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form7Exa">Last Name<span>*</span></label>
                                <input type="text" class="form-control" id="res_last" name="res_last" placeholder="Enter Lastname"  required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form7">Email <span>*</span></label>
                                <input type="text" id="res_email" class="form-control" name="email"
                                    placeholder="Enter email" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">Mobile<span>*</span></label>
                                <input type="text" class="form-control ship_form OnlyNumberInput" id="phoner" name="mobile_ver" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">Password <span>*</span></label>
                                <input type="password" id="res_pas" class="form-control" name="passwords"
                                    placeholder="Enter password" autocomplete="new-password" required />
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">Confirm Password <span>*</span></label>
                                <input type="password" id="con_pasc" class="form-control" name="passwordc"
                                    placeholder="Confirm password" autocomplete="new-password" required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-8 ">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" id="for_res" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div><!-- row-->

                    <!--// body data-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>




    <div class="modal-dialog" id="first_modal" style="z-index:999">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please Login</h5>

            </div>
                <div class="modal-body">
                    <!-- body data-->
                    <div class="row mb-8">
                        <div class="col-md-7 mb-3">
                            <div class="form-outline">
                                <label class="form-label" for="form7">Email <span>*</span></label>
                                <input type="text" id="log_email" class="form-control" name="email"
                                    placeholder="Enter email" required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-md-7 mb-3">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">Password <span>*</span></label>
                                <input type="password" id="log_pas" class="form-control" name="password"
                                    placeholder="Enter password" required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="row">
                            <div class="col-md-6">
                            <button type="button" class="btn btn-danger" id="for_pass">Forgot Password</button>
                            </div>
                            <div class="col-md-4 log_sub">
                                <button type="submit" id="for_log" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div><!-- row-->

                    <!--// body data-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>





     <div class="modal-dialog" id="for_got" style="z-index:999; display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please Verify Your Mobile Number</h5>

            </div>
                <div class="modal-body">
                    <!-- body data-->
                    <div class="row mb-8">
                        <div class="col-md-7 mb-3">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">Mobile Number <span>*</span></label>
                                <input type="text" class="form-control ship_form OnlyNumberInput" id="phones"
                                            name="mobile_ver" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="row">
                            <div class="col-md-4 ">
                                <button type="submit" id="get_otp" class="btn btn-primary">Get OTP</button>
                            </div>
                        </div>
                    </div><!-- row-->

                    <!--// body data-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>




     <div class="modal-dialog" id="otp_modal" style="z-index:999; display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verify</h5>

            </div>
                <div class="modal-body">
                    <!-- body data-->
                    <div class="row mb-8">
                        <div class="col-md-7 mb-3">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">OTP</label>
                            <input type="text" class="form-control ship_form" id="otp"
                                            name="otp" placeholder="Enter OTP"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="row">
                            <div class="col-md-4 ">
                                <button type="submit" id="otp_verify" class="btn btn-primary">Verify OTP</button>
                            </div>
                        </div>
                    </div><!-- row-->

                    <!--// body data-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>



 


     <div class="modal-dialog" id="pas_modal" style="z-index:999; display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
            </div>
                <div class="modal-body">
                    <!-- body data-->
                    <div class="row mb-8">
                        <div class="col-md-7 mb-3">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">New Password</label>
                                <input type="password" class="form-control ship_form" id="new_pas"
                                            name="paasw" placeholder="Enter Password"  required>
                            </div>
                        </div>
                          <div class="col-md-7 mb-3">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">Confirm New Password</label>
                                <input type="password" class="form-control ship_form" id="new_pasc"
                                            name="paaswc" placeholder="Confirm Password"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="row">
                            <div class="col-md-4 ">
                                <button type="submit" id="sub_pas" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div><!-- row-->

                    <!--// body data-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>

<script>

  // Submit form
$('#proc_add').click(function(event) {
    event.preventDefault(); // Prevent the default form submission

    var form_data = $('#check_form').serialize();

    $.ajax({
        type: "POST",
        data: form_data,
        url: '<?php echo base_url('login/check_phone') ?>',
        success: function(response) {
            if (response == 1) {
                // alert('register');
            // $('#proc_add').prop('disabled', true);
            $("#addNewAddressModal").modal('show');
             $('#first_modal').css('display', 'none');
            } 
            else if(response == 2){
                 // alert(response);
             // $('#proc_add').prop('disabled', true);
            $("#addNewAddressModal").modal('show');
              $('#res_modal').css('display', 'none');
            }
            else {
                // alert(response);
                $('#check_form')[0].submit();
            }
        },
        error: function (xhr, status, error) {
            console.error(status + ": " + error);
            // Handle error here
        }

    });
});

// Forgot Password
$('#for_pass').click(function() {
  $('#for_got').css('display', 'block'); 
  $('#first_modal').css('display', 'none');
  
});


// Registration model

 $('#for_res').click(function() {
       
      var email = $('#res_email').val();
      var phone = $('#phoner').val();
      var pass = $('#res_pas').val();
      var conpass = $('#con_pasc').val();
      var first = $('#res_first').val();
      var last = $('#res_last').val();
      var address = $('#Address').val();
      var apartm = $('#Addressc').val();
      var state = $('#state').val();
      var city = $('#city').val();
      var pincode = $('#pincode').val();
      var button = document.getElementById('proc_add');
      if(pass != conpass)
      {
        alert('Passwords Mismathed!!');
        return false;
      }
      // alert(email);
      $.ajax({
        type: "POST",
        url: '<?php echo base_url('login/regis_check') ?>',
        data: {
          email : email,
          phone : phone,
          pass : pass,
          first : first,
          last : last,
          address : address,
          apartm : apartm,
          state : state,
          city : city,
          pincode : pincode
        },
        success: function (response) {
            if(response == 1){
            alert('Registered Successfully');
            // $('#proc_add').prop('disabled', false);
            $('.modal').modal('hide');
            button.click();  

      //   $('#for_got').css('display', 'none'); 
      // $('#otp_modal').css('display', 'block');         
            }
        }
      })
      
      
    });


//login code
$('#for_log').click(function() { 
  var email = $('#log_email').val();
  var pass = $('#log_pas').val();
  var button = document.getElementById('proc_add');
  $.ajax({
    type: "POST",
    url: "<?php echo base_url('login/loginfirst'); ?>",
    data: {
        email: email,
        pass: pass   
    },
    success: function (response) {
        if (response == 1) {
          $('.modal').modal('hide');  
          // $('#proc_add').prop('disabled', false);
          button.click();
        }
        else 
        {
            alert('wrong credentials');
            return false;
        }
    }
  });
});


// get otp
    $('#get_otp').click(function() {
       
      var mob = $('#phones').val();
      $.ajax({
        type: "POST",
        url: '<?php echo base_url('login/get_otp') ?>',
        data: {
          mob : mob
        },
        success: function (response) {
            if(response == 1){
        $('#for_got').css('display', 'none'); 
      $('#otp_modal').css('display', 'block');         
            }
        }
      })
      
      
    });



// verify otp
$('#otp_verify').click(function() {
   
  var otp = $('#otp').val();
  $.ajax({
    type: "POST",
    url: '<?php echo base_url('login/verify_otp') ?>',
    data: {
        otp: otp    
    },
    success: function (response) {
        if(response == 1){
  $('#pas_modal').css('display', 'block'); 
  $('#otp_modal').css('display', 'none');          
        }
    }
  })
  
  
});


// submit new password
$('#sub_pas').click(function() { 
  var pass = $('#new_pas').val();
  var passc = $('#new_pasc').val();
  $.ajax({
    type: "POST",
    url: "<?php echo base_url('login/confirm_pas'); ?>",
    data: {
        pass: pass,
        passc: passc   
    },
    success: function (response) {
        if (response == 1) {
            alert('Password Updated Successfully');
            $('#pas_modal').css('display', 'none'); 
            $('#first_modal').css('display', 'block');          
        }
        else 
        {
            alert('Passwords Mismathed');
            return false;
        }
    }
  });
});
</script>







  
</div>





