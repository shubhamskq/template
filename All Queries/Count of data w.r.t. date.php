<?php

  // To get count of Campaign Leads today
        $sql = "SELECT count(camp_id) as total FROM `analytics` WHERE (`DateAt`  BETWEEN '".$dateFrom."' AND '".$dateTo."')";
          $query = $this->db->query($sql);
        $rData = $query->result(); 
       
        $data['today_campaign'] = $rData[0]->total;

        // To get count of Campaign Leads yesterday
        $sql0 = "SELECT count(camp_id) as total FROM `analytics` WHERE (`DateAt`  BETWEEN '".$From."' AND '".$To."')";
        $query0 = $this->db->query($sql0);
        $yData = $query->result(); 
       // pre($yData);
        $data['yesterday_campaign'] = $yData[0]->total; 

        // To get Total Leads
         $sql1 = "SELECT count(camp_id) as total FROM `analytics` WHERE camp_id != '' ";
        $query1 = $this->db->query($sql1);
        $tData = $query1->result();
        // pre($tData);
        // exit;
        $data['total_leads'] = $tData[0]->total;






?>
