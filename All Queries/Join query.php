<?php

$sql = "SELECT * FROM slot as s JOIN cases as c ON c.id = s.case_id  WHERE meeting_time = '".$slot_date_time."' AND c.payment_status = '1'  ";

?>
