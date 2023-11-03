<?php
   $sql = "SELECT id,DATE(DateAt) as dt FROM analytics GROUP BY DateAt ";
        $rData = $this->analitics_model->rawQuery($sql);
        $data['filter'] = $rData;
?>
