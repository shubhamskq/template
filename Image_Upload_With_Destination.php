// View Code
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Image upload</title>
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2 class="text-center" style="margin-top: 50px;">CodeIgniter Image Upload</h2>
    <br><br>
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
      <!-- success message to display after uploading image -->
          <?php if ($this->session->flashdata('success')) {?>
              <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $this->session->flashdata('success'); ?>
              </div>
          <?php  } ?> 
          <!-- validation message to display after form is submitted -->
             <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>','</div>');
             ?>    
             <!-- image upload form      -->
             <?php echo form_open_multipart('Image/add_image') ?>
               <div class="form-group">
                 <label>Image Name</label>
                   <input type="text" class="form-control" id="image_name" name="image_name">
                 </div>
               <div class="form-group">
                 <label>Image</label>
                   <input type="file" class="form-control" id="userfile" name="userfile">
                 </div>
               <input type="submit" class="btn btn-primary" value="Upload">
             <?php form_close() ?> 

             <a href="<?php echo site_url('Image/view_images') ?>" class="btn btn-success" style="margin-left: 20px;">View Images</a>  
        </div>
      <div class="col-lg-3"></div>
    </div> 
  </div>
  <!-- jQuery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <!-- Bootstrap JS links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>



<!-- Controller Code  -->


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Image extends CI_Controller {
 public function __construct()
 {
  parent::__construct();
  $this->load->model('Image_model');
 }
 public function index()
 {
  $this->load->view('image_upload');
 }
 // add image from form
 public function add_image()
 {
  // CI form validation
  $this->form_validation->set_rules('image_name', 'Image Name', 'required');
  if ($this->form_validation->run() == FALSE){
   $this->load->view('image_upload');
        }
  else {
   // configurations from upload library
   $config['upload_path'] = './assets/images';
   $config['allowed_types'] = 'gif|jpg|png|jpeg';
   $config['max_size'] = '2048000'; // max size in KB
   $config['max_width'] = '20000'; //max resolution width
   $config['max_height'] = '20000';  //max resolution height
   // load CI libarary called upload
   $this->load->library('upload', $config);
   // body of if clause will be executed when image uploading is failed
   if(!$this->upload->do_upload()){
    $errors = array('error' => $this->upload->display_errors());
    // This image is uploaded by deafult if the selected image in not uploaded
    $image = 'no_image.png';    
   }
   // body of else clause will be executed when image uploading is succeeded
   else{
    $data = array('upload_data' => $this->upload->data());
    $image = $_FILES['userfile']['name'];  //name must be userfile
    
   }
   $this->Image_model->insert_image($image);
   $this->session->set_flashdata('success','Image stored');
   redirect('Image');
  }
 }
 // view images fetched from database
 public function view_images()
 {
  $data['images'] = $this->Image_model->get_images();
  $this->load->view('image_view', $data);
 }
}



// Model Code

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Image_model extends CI_Model {
 public function insert_image($image)
 {
  // assign the data to an array
  $data = array(
   'image_id' => $this->input->post('image_id'),
   'image_name' => $this->input->post('image_name'),
   'image' => $image
  );
  //insert image to the database
  $this->db->insert('image_data', $data);
 }
 //get images from database
 public function get_images()
 {
  $this->db->select('*');
  $this->db->order_by('image_id');
  $query = $this->db->get('image_data');
  return $query->result();
 }
}
