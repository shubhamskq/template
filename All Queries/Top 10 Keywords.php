<?php

 // To get Top 20 Keywords
      $sql2 = "SELECT count(keywords) as freqkey,keywords as totalkey FROM `analytics` WHERE keywords != '' GROUP BY keywords";
      $query2 = $this->db->query($sql2);
      $kData = $query2->result();
      rsort($kData);
$no = 0;
$dataArr = array();
foreach ($kData as $value) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $value->totalkey;
            $row[] = $value->freqkey;
            // $row[] = $keyword;
            $dataArr[] = $row;
            if($no == 20){
               break;
            }
}







?>
