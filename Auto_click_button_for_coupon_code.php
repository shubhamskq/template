<?php
 // View Code

<input type="text" name="coupon_code" class="form-control" id="disco" placeholder="Coupon code" value="<?= $code ?>" required>
              <div class="input-group-append">
                 <button type="submit" name="apply_coupon" class="btn btn-secondary" id="apply_coupon">Apply Coupon</button>
              </div>

<!-- Javascript Code -->
<script>
  window.addEventListener('load', function () {  
       // var autodis = $(this).closest("#automode").attr("data_auto");
     var autodis = "<?php echo $autoDis ?>"
        // Find the button by its id
       // alert(autodis);
        var button = document.getElementById('apply_coupon');

        // Trigger a click event on the button
        if(autodis == 1){
        button.click();
     }  
      });
  
   </script>
?>
