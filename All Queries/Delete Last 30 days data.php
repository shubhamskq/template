<?php
  // delete last 30 days data
  $date_threshold = date('Y-m-d H:i:s', strtotime('-60 days'));
  $sql = "DELETE FROM analytics WHERE DateAt < '$date_threshold'";
  $this->analitics_model->rawQuery($sql);
?>
