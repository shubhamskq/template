<?php
// save retrun data ====================================
        $rVal = array();
        foreach ($decryptValues as $key => $v) {
          $temp = explode("=",$v);
          $rVal[$temp[0]] = isset($temp[1])?$temp[1]:'';
        }
        //pre($rVal);
        $order_id =  isset($rVal['order_id'])?decodeOrderId($rVal['order_id']):''; 
        if($order_id == ''){
          echo "error:Something went wrong!!";
          exit;

        }

?>
