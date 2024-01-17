<?php 
  $rData = $this->lawyer_model->all();
        foreach ($rData as $key => $v) {
            if(!empty($v->enrol_image)){
               $arr = array(); 
               $arr[] = array('label'=>'enrollment certificate', 'img' =>$v->enrol_image);
               $w = array('id' => $v->id,'enrol_image' =>json_encode($arr));
               $this->lawyer_model->save($w);
            }

        }
        //pre($rData);
        exit;


?>
