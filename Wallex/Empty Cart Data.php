<?php

  $sql = "DELETE FROM `tbl_cart` WHERE user_id ='".$get_order->user_id."'  ";
                    $this->order_model->rawQuery($sql);
                    setcookie('cart', json_encode(array()), time() + (86400 * 30), "/"); 


?>
