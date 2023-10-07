<?php
// Javascript Code
// remove product form session
function delSesProduct(p_id, s_p_id, product_id) {
    $.ajax({
        url: "<?php echo base_url('cart/delSessionProduct'); ?>",
        method: "POST",
        data: {
            parentId: p_id,
            subParentId: s_p_id,
            productId: product_id,
        },
        success: function(data) {
            get_cart_data();

        }
    });
}

// Controller Code
//Del Sess Product =============================

    function delSessionProduct()
    {
$cart =  isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : array();

if (!empty($cart) && isset($cart[$_POST['parentId']]) && isset($cart[$_POST['parentId']][$_POST['subParentId']][$_POST['productId']])) {
    $temp = $cart[$_POST['parentId']][$_POST['subParentId']];
    unset($cart[$_POST['parentId']][$_POST['subParentId']][$_POST['productId']]);

    if (count($cart[$_POST['parentId']]) == 1 && count($cart[$_POST['parentId']][$_POST['subParentId']]) == 0) {
        unset($cart[$_POST['parentId']]);
    }

    // $cart[$_POST['parentId']][$_POST['subParentId']][$_POST['productId']];
    $_SESSION['cart'] = json_encode($cart);
    echo 1;
} else {
    echo 0;
}

        exit;
    }


?>
