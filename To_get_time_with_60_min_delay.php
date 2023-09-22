// Only Controller code
<?php
$seachDate =  date("Y-m-d", strtotime($_POST['schedule_date']));
        $today = date("Y-m-d");

        
        $response = '';
        $tempArr = getStaticTime();

        $n = 0;

        // time change 
        $tempDate = array();
        
        // Only for today's meeting 
        if($today == $seachDate){
           foreach ($tempArr as $k => $v) {
                $tempDate2 = date("Y-m-d H:i:s", strtotime(date("Y-m-d ").$v)) ;
                $diff = dateDiffMin($tempDate2, date("Y-m-d H:i:s")) ;

                if($diff > 60){
                    $tempDate[] = $v;
                }
            }
            $tempArr =  $tempDate;
            
           
        }




?>
