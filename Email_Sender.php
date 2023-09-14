<?php
//Controller Code
 public function index()
    {
          
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Insaaf99 : Emails Sender';
        $this->loadViews("admin/sendmail/list", $this->global, NULL , NULL ,'admin');
        
    }
    
    // Add New 

    public function getMail()
    {
    	$this->isLoggedIn();
    	$sql = "SELECT email, fname, lname FROM clint WHERE email != '' GROUP BY email ";
        $data['list'] = $this->Client_model->rawQuery($sql);

        $this->global['pageTitle'] = 'Insaaf99 : Email Sender';
        $this->loadViews("admin/sendmail/list", $this->global, $data , NULL ,'admin'); 
    } 
    
    
     // Mail Send 

    public function mailer() {


            /* code for send mail clint */
            $toEmail  = $_POST['checkbox']; //Admin email  
            $subject = $_POST['subject'];
            $heading = "Mail From Admin";
            $content = $_POST['msg'];
         
            $message = get_email_temp($heading, $content);
           
            // $this->send_email($toEmail, $subject, $message);

    }

// View Form Code

<div class="send_mail">
                    <form role="form" id="member_form" method="post" action="<?php echo base_url() ?>admin/sendmail/mailer"  role="form" enctype="multipart/form-data">
                     <table class="dataTable3">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <!--name-->                             
                                    <div class="form-group">
                                        <label for="name">Subject</label>
                                        <input type="text" id="subject" name ="subject" class="form-control" required="required"  placeholder="Enter Subject" >
                                    </div> 
                                        
                                    <!-- About  -->
                                    <div class="form-group">
                                         <label for="about">Message</label>
                                        <textarea  rows="8" id="msg" name ="msg" class="form-control" placeholder="Message" ></textarea>
                                    </div>
                                     <div class="box-footer">
                                     <button type="submit" class="btn btn-primary sendmail" value="Submit">Send Mail</button>
                                     <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    
                              
                              
                                 </div> 
                                 <div class="col-md-4 mail_form">
                                    <h2>Select Email to Send Message</h2>
                                   <div class="messages_area">
                                    <input type="checkbox" name="select-all" id="select-all"  style="padding-right: 10px;" />&nbsp; Select All<br>
                                    <?php foreach($list as $l)  { ?>
                                 <input type="checkbox" name="checkbox" id="checkbox" value="<?=$l->email ?>" />&nbsp; <?=$l->email ?><br>
                               <?php   }
                                  ?>
                            
                                

                                    <!-- select all boxes -->
                                  </div>
                                </table>
                              </form>
                           </div>


<!-- To Select All Inputs -->
  <script>
  $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 
</script>

?>
