<?php

// Auto pincode check
$(document).ready(function() {
$("#pincode").on("input",function() {
        auto_pin();
 });
  function auto_pin() {
    var pinc = document.getElementById("pincode");   
    var button = document.getElementById('country_code'); 
        if (pinc.value.length === 6) {
            button.click();
        }
}

});




?>
