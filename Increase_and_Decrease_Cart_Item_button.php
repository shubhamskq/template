<?php
// View Code
<button class="minus qntBtn" id="incrBtn" ThisproductId=` +
        parentKey + `
                data-productId=` + subParentKey + "_" + parentKey + ` data=` + i +
        `  dataid=` + v['id'] + `
                data_price=` + v['regular_price'] + `
                data-selectedWeight=` + v['weight_id'] + `
                data-metaltype=` + v['metaltype'] +
        ` data-btnType="decr">-</button>     <input type="number" style="width: 20%; height: 10%" value=` +
        v['quantity'] + ` class="for-w-ed quntInput" id=` +
        "quantity" + i + ` />
                <button class="minus qntBtn" ThisproductId=` + parentKey + `
                data-productId=` + subParentKey + "_" + parentKey + ` data=` + i +
        `  dataid=` + v['id'] + `
                data_price=` + v['regular_price'] + `
                data-selectedWeight=` + v['weight_id'] + `
                data-metaltype=` + v['metaltype'] + ` data-btnType="incr">+</button> 
<script>
// increase - dec ==================================
// Jquery Function
jQuery(document).on("click", ".qntBtn", function() {
    var type = $(this).attr("data-btntype");
    var productId = $(this).attr("data-productid");
    var dataId = $(this).attr("dataid");
    var qnt = $(this).closest('p').find(".quntInput").val();

    // array details 
    var parentId = $(this).closest(".sideCartCon").attr("data-parentId");
    var subParentId = $(this).closest(".sideCartCon").attr("data-subParentId");
    var _productId = $(this).closest(".sideCartCon").attr("data-productId");



    if (type == 'incr') {
        qnt = parseInt(qnt) + 1;
        $(this).closest('p').find(".quntInput").val(qnt);
    } else {
        if (qnt > 1) {
            qnt = parseInt(qnt) - 1;
            $(this).closest('p').find(".quntInput").val(qnt);
        } else {
            return false;
        }
    }
    updateSesQnt(parentId, subParentId, _productId, qnt);
});
</script>
?>
