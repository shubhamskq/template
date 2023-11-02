<?php
 $clientID = $_SESSION['id'];
      $query= $this->db->query("select id from slot where `client_id` = $clientID AND `MeetingStatus` = '2'");
      $userSlotData=$query->result_array();

?>
