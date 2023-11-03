<?php

// footer

    <div id="myDiv" style="text-align: center; width: 110%; height: 150%; display: none; z-index: 999; top: 100 %; left: 50%; transform: translate(-50%, -50%); position: absolute; background: rgba(0,0,0,.5);">
             <img style="margin-top: 750px; width: 50px;" src="<?php echo base_url('assets/images/loader.gif')?>">
             <p style="font-size: 18px; color: white; margin-right: 10px;">Please Wait</p>
    </div>

?>

<!-- On Click Button  -->
<script>
    $(document).ready(function() {
    $("#showButton").on("click", function() {
        $("#myDiv").show();
        setTimeout(function() {
            $("#myDiv").hide();
        }, 15000);
    });
});
</script>





