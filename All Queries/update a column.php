<?php


public function update_order() {
        $data = [
            'customer_name' => 'Joe',
        ];
        $this->db->where('id', 1);
        $this->db->update('orders', $data);
        echo 'order has successfully been updated';
    }

// Or

$update_order_details = $this->db->update('tbl_order_details', $update_details_data, ['order_number' => $parent_order_i]);
?>
