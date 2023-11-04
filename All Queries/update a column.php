<?php


public function update_order() {
        $data = [
            'customer_name' => 'Joe',
        ];
        $this->db->where('id', 1);
        $this->db->update('orders', $data);
        echo 'order has successfully been updated';
    }


?>
