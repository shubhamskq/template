<?php

$arr = array();
       $subArr = array();
       $subArr[] = 'Month and Year';
       $subArr[] = 'Payment';
       $subArr[] = 'Meetings';
       $arr[] = $subArr;
       // get year using podt method
       if(isset($_POST['year']) && !empty($_POST['year'])){
           $currentYear = intval($_POST['year']);
           $y = $currentYear -1;
       }else{
       $currentYear = intval(date("Y"));
       $y = $currentYear-1;
       }
           // pass year in view
           // create month data in array
           $months = ["1"=>"Jan", "2"=>"Feb", "3"=>"Mar", "4"=>"Apr", "5"=>"May", "6"=>"June", "7"=>"July", "8"=>"Aug", "9"=>"Sept", "10"=>"Oct", "11"=>"Nov", "12"=>"Dec"];
           $year = "";
           //while loop to pass the year and fetch data from database by Year 
           while($y <= $currentYear) {
             $y;
             $currentYear;

             $year  .='-'.$y;
              //for loop to fetch data from database by Month 
               for ($i=1; $i <= count($months) ; $i++) { 
               $sql ='';
               $sql ="SELECT id,payment_date FROM `z_payment` WHERE payment_date BETWEEN '".$y."-0".$i."-01' AND '".$y."-".$i."-31' AND `payment_status`='Success'";
               $pData =  $this->Client_model->rawquery($sql);

               $sql ='';
               $sql ="SELECT id,dt FROM `slot` WHERE dt BETWEEN '".$y."-0".$i."-01' AND '".$y."-".$i."-31' AND `MeetingStatus`!=0";
               $mData =  $this->Client_model->rawquery($sql);

                   // store data in a array after geting data one by one
                   $subArr = array();
                   $subArr[] =$y.'-'.$months[$i];
                   $subArr[] = (empty($pData))?0:count($pData); 
                   $subArr[] = (empty($mData))?0:count($mData); 
                   $arr[] = $subArr;
               }
           $y++;
           }

       $data['jsonData'] = json_encode($arr);
       $data['year']  = $year;
// code to show grph chart end

        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Insaaf99 : payment list';
        $this->loadViews("admin/payment/list", $this->global, $data , NULL  ,'admin');
        
    }

?>
