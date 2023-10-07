<?php
// View Code
  <div class="col-4">
    <div class="itemRemoveCon"><i class="bi bi-trash"></i></div>
    <img src="` + base_url + img + `" alt="" style="height: 100%; width: 100%">
</div>
<script>
  jQuery(document).on("click", ".itemRemoveCon", function() {
    // array detials 
    var parentId = $(this).closest(".sideCartCon").attr("data-parentId");
    var subParentId = $(this).closest(".sideCartCon").attr("data-subParentId");
    var _productId = $(this).closest(".sideCartCon").attr("data-productId");

    delSesProduct(parentId, subParentId, _productId);
    get_cart_data();
});
</script>

?>
