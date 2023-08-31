

public function add_form()
    {
    $this->load->model('admin/sub_sub_category_model');
    $this->load->library('email');
     $data['table']  = 'category';
       $data['id']     = '-id'; // Desc when - add
       $data['limit']     = '20'; // Desc when - add
       $data['categoryMenu']           = $this->getCategory($data); 
 
       $form_data = $this->input->post();
       $w['id'] = $form_data['doc_id'];
       $w['field'] = 'descreption,discount,save_price,price,gross_price,gst_price,gst';
       $categoryData =$this->sub_sub_category_model->finddynamic($w);

       $categoryData = json_decode(json_encode($categoryData[0]), true);
       $dbRes['doc_id'] = $form_data['doc_id'];
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');

          if ($this->form_validation->run() === TRUE)
        {  
           $dbRes=$this->Newcertificate_model->addcer();
            $this->load->view('front/thank_you');
        /* PHPMailer object */
        
      $mail = new PHPMailer(true);
 
        try {
            $mail->SMTPDebug = 2;                                      
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.sendgrid.net';                   
            $mail->SMTPAuth   = true;                            
            $mail->Username   = 'ourfund';                
            $mail->Password   = 'admin2017';                       
            $mail->SMTPSecure = 'tls';                        
            $mail->Port       = 587; 
         
            $mail->setFrom($form_data['email'], $form_data['firstname']);          
            $mail->addAddress('shubhamskcr7@gmail.com', 'Shubham');
            $mail->isHTML(true);                               
            $mail->Subject = 'Subject';
            $mail->Body    = 'Testing';
            $mail->AltBody = 'Testing';
        

            $mail->send();
            echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    
}
