<?php
<script>
// update qunatity  ==================================
function updateSesQnt(p_id, s_p_id, product_id, qnt) {
    $.ajax({
        url: "<?php echo base_url('cart/updateSession'); ?>",
        method: "POST", 
        data: {
            action: 'get_update_session',
            parentId: p_id,
            subParentId: s_p_id,
            productId: product_id,
            qnt: qnt
        },
        success: function(data) {
            if (data == 1) {
                get_cart_data();
            }
        }
    });
}
</script>

// Controller Code
   function updateSession()
    {
  $cart =  isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : array();
  if (!empty($cart) && isset($cart[$_POST['parentId']]) && isset($cart[$_POST['parentId']][$_POST['subParentId']][$_POST['productId']])) {
      $cart[$_POST['parentId']][$_POST['subParentId']][$_POST['productId']]['quantity'] = $_POST['qnt'];
      $_SESSION['cart'] = json_encode($cart);
      echo 1;
  } else {
      echo 0;
  }
        exit;
    } 
?>
