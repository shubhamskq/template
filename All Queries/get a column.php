<?php

$get_order = $this->db->get_where('tbl_order', ['order_id' => $order_id])->row();
?>
