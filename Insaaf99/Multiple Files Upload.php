<?php
$certArr = !empty($getData->enrol_image)?json_decode($getData->enrol_image,true):array();
            if(isset($_POST['certificatLabel']) && !empty($_POST['certificatLabel'])){
                foreach ($_POST['certificatLabel'] as $i => $label) {
                    if(isset($_FILES['imgArr_'.$i]['name']) && $_FILES['imgArr_'.$i]['name'] != '') {
                        $f_name         =$_FILES['imgArr_'.$i]['name'];
                        $f_tmp          =$_FILES['imgArr_'.$i]['tmp_name'];
                        $f_size         =$_FILES['imgArr_'.$i]['size'];
                        $f_extension    = explode('.',$f_name);
                        $f_extension    =strtolower(end($f_extension));
                        $f_newfile      =uniqid().'.'.$f_extension;
                        $store          ="uploads/lawyer/".$f_newfile;
                     
                        if(!move_uploaded_file($f_tmp,$store))
                        {
                            $this->session->set_flashdata('error', 'Image Upload Failed .');
                        }
                        else
                        {
                           //$fileName = $store;
                           $certArr[] =  array('label'=>$label, 'img' =>$f_newfile);
                        }
                    }// image if close
                }
            }




?>
