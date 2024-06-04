<?php
 // Update Profile Image
  public function image_change(){
   
    if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){

                $f_name         =$_FILES['file']['name'];
                $f_tmp          =$_FILES['file']['tmp_name'];
                $f_size         =$_FILES['file']['size'];
                $f_extension    = explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      ='employee_'.uniqid().'.'.$f_extension;
                $store          ="uploads/employee/".$f_newfile;
             
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                    redirect('emp/profile');
                }
                $profile = $this->employee_model->find($_POST['id']);
                    if(!empty($profile->image)){
                        $pathdir = getcwd();
                        $dir = $pathdir."/uploads/employee/".$profile->image;
                        $r =  unlink($dir);
                    }

                $insertData = array();
                $insertData['id'] = $_POST['id'];
                $insertData['image'] = $f_newfile;
                $res = $this->employee_model->save($insertData);
                if($res > 0){
                    redirect('emp/profile');
                }

        }
  } 

?>
