<?php
// Model Code

function get_datatables()
        {
            $query=$this->db->get('slider');
            return $query->result();
        }

// Controller Code

 // To Edit Slider
     public function edit()
    {
        $this->isLoggedIn();
     
        $list['list']= $this->slider_model->get_datatables();
        $this->global['pageTitle'] = 'Test : Slider Management';

        $this->loadViews("admin/slider/edit", $this->global, $list , NULL ,'admin');    
        
    } 

// View Form

<div class="form-center_update">
   	<form role="form" id="member_form" action="<?php echo base_url() ?>admin/slider/update"
                        method="post" role="form" enctype="multipart/form-data">
                        <?php foreach($list as $l) { ?>
                        <div class="banner-body">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name"> Banner Image</label>
                                        <input type="file" id="name" name="img" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name"> Title</label>
                                        <input type="text" id="name" name="title" class="form-control"
                                            value="<?= $l->title ?>" required>

                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Short Description</label>
                                        <input type="text" id="name" name="short" class="form-control"
                                            value="<?= $l->short ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Button Label</label>
                                        <input type="text" id="name" name="label" class="form-control"
                                            value="<?= $l->label ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Button URL</label>
                                        <input type="url" id="case_file" name="url" class="form-control"
                                            value="<?= $l->url ?>" required>
                                    </div>
                                </div>
                            </div>
                             <?php } ?>
                            <div class="row">
                             <div class="col-md-4">
                               <div class="form-group">
                               	<button type="submit" id="case_file" name="submit" class="btn btn-primary"
                                            placeholder="Update">Update</button>
                                </div>
                              </div>
                            </div>
                        </div>
            <!-- /.box-body -->
   
            </form>
      </div>



?>
