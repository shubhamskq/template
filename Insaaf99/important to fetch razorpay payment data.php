<?php
 $PaymentData= $this->Payment_model->find($_POST['id']);

        $keyId     = $this->config->item('razPaykey_id');
        $keySecret = $this->config->item('razSecret');
        $api = new Api($keyId, $keySecret);

        $paymentdetails = $api->order->fetch($PaymentData->order_id)->payments();
        $id = $paymentdetails["items"][0]["id"];




?>
