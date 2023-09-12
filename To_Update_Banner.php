<?php 
//Controller Update Function
 public function update()
    {

    	$this->isLoggedIn();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('img','Image','trim');
        $this->form_validation->set_rules('title','Title','trim');
        $this->form_validation->set_rules('short','Short','trim');
        $this->form_validation->set_rules('mobile','Mobile','trim');


         $form_data  = $this->input->post();
          if($this->form_validation->run() == FALSE)
        {
                $this->edit($form_data['id']);
        }
        else
        {
           
            $insertData['id']    = 1;
            $insertData['title'] = $form_data['title'];
            $insertData['short'] = $form_data['short'];
            $insertData['label'] = $form_data['label'];
            $insertData['url']   = $form_data['url'];
       


           if(isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
              
				$f_name         =$_FILES['img']['name'];
                $f_tmp          =$_FILES['img']['tmp_name'];
                $f_size         =$_FILES['img']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="assets/yash/images/".$f_name;
                
                if(!$store)
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
				    
					$insertData['img'] = $store;
                 
                }
                 
            }
         
             $result = $this->slider_model->save($insertData);
              if($result > 0)
            {
         
                $this->session->set_flashdata('success', ' Slider delails  successfully Updated');
                redirect('admin/slider');
            }
            else
            { 
               
                $this->session->set_flashdata('error', ' Slider delails  Updation failed');
            }
            redirect('admin/slider');
        }
    }

//Slider View

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="col-md-12 head">
		<h1>Slider Management</h1>
		</div>
    </section>
    <section class="content">
   <div class="form-center_update">
   	<form role="form" id="member_form" action="<?php echo base_url() ?>admin/slider/update"
                        method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name"> Banner Image</label>
                                        <input type="file" id="name" name="img" class="form-control">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name"> Title</label>
                                        <input type="text" id="name" name="title" class="form-control"
                                            placeholder="Enter Title" >
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Short Description</label>
                                        <input type="text" id="name" name="short" class="form-control"
                                            placeholder="Enter Short Description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Button Label</label>
                                        <input type="text" id="name" name="label" class="form-control"
                                            placeholder="Enter Button Label" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Button URL</label>
                                        <input type="text" id="case_file" name="url" class="form-control"
                                            placeholder="Enter URL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                             <div class="col-md-4">
                               <div class="form-group">
                               	<button type="submit" id="case_file" name="submit" class="btn btn-primary"
                                            placeholder="Update">Update</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
            <!-- /.box-body -->
          
            </form>
   </div>

</section>
</div>
<script src="<?php echo base_url() ?>assets/backend/js/jquery-ui.js"></script>


?>
