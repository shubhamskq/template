<?php
        $payData = $this->db->get_where('z_payment', ['mobile' => $_POST['client_phone']])->row();
        $clientData = $this->db->get_where('clint', ['mobile' => $_POST['client_phone']])->row();
        $casesData = $this->db->get_where('cases', ['client_id' => $clientData->id])->row();
        $case_category= $this->db->get_where('case_category',['id' => $casesData->case_category_id])->row();
        $slotData= $this->db->get_where('slot',['client_id' => $clientData->id])->row();

        $payMode = '';
                if(isset($_POST['commentval']) && !empty($_POST['commentval'])){
                    if (strpos(strtolower($_POST['commentval']), 'qr') !== false) { 
                        $payMode = "QR Code";
                    } else if (strpos(strtolower($_POST['commentval']), 'raz') !== false) { 
                        $payMode = "Razorpay";
                    }
                   
                }

              $this->load->model('mail_model');
              $arg = array(
                'invoiceDate' => date("d/M/Y"),
                'categoryName' => $case_category->name,
                'categoryId' => $casesData->case_category_id,
                'slot_date' => $slotData->slot_date,
                'slot_time' => $slotData->time,
                'amount' => $payData->sub_total,
                'gst' => $payData->gst,
                'totalAmount' => $payData->amount,
                'gatewayTransID' => $payData->order_id,
                'clientId' => $clientData->client_unique_id,
                'client_f_name' => $clientData->fname,
                'client_l_name' => $clientData->lname,
                'mobile' => $clientData->mobile,
                'email' => $clientData->email,
                'payStatus' => $payData->payment_status,
                'client_gst_number' => '',
                'payment_method' => $payMode,
              );
              
              $template = $this->mail_model->invoice_template($arg);


              require APPPATH . "../assets/plugins/php_pdf/vendor/autoload.php";
    $pdfname = rand();
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($template);
    $fileTempName = "utils/invoices/" . $pdfname . $payData->user_id . "invoice.pdf";

    // // Compose email
    $fileName = $fileTempName;
    $mpdf->Output($fileName);

     $data12 = array(
                'pdfname' =>$pdfname
            );
            $sesssion_details = $_SESSION['ClientDetails'];
            $client_phone       = $_POST['client_phone'];
            $result2=$this->db->update('z_payment',$data12,'mobile="'.$client_phone.'"');

    // Sending email
     $toEmail = $clientData->email; // client email
    $subject = "Insaaf99:Payment Success";
    $message = "<div style='background:#ecc9dd; border-radius:8px;padding:7px;'>
                    <b style='font-size: 22px;color: #09418b;'>Our Team will Contact you very soon</b>
                    <br>
                    <b style='font-size:15px; color:#3a3a8a;'>Client Name : </b>
                    <b style='font-size:15px;'>{$payData->name}</b>
                    <br>
                    <b style='font-size:15px;color:#162c97;'>Client Email :</b>
                    <b style='font-size:15px;'>{$clientData->email}</b>
                    <br>
                    <b style='font-size:15px;color:#162c97;'>Client Mobile :</b>
                    <b style='font-size:15px;'>{$payData->mobile}</b>
                    <br>
                    Download Payment Invoice: 
                    <b style='font-size:15px;'><a href='".base_url().$fileName . "'>Download Invoice</a></b>
                </div>";
    
    // $this->send_email($toEmail, $subject, $message);
          if($_SERVER['HTTP_HOST'] != 'localhost'){         
         $this->send_email($toEmail, $subject, $message);
              }

        <?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Mail_model extends Base_model
{
    public $table = "clint";
    var $column_order = array(null, 'admin_type','name','email','phone','date','status'); //set column field database for datatable orderable
    var $column_search = array('admin_type','name','email','phone','date','status'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order

        

        function __construct() {

            parent::__construct();

        }



   
        // invoice
        public function invoice_template($data)
        {
            //$invoiceNumber = isset($data['invoice_num'])?$data['invoice_num']:"";
            $invoiceDate = isset($data['invoice_date'])?$data['invoice_date']:date("M d, Y");
            


            $categoryName = isset($data['categoryName'])?$data['categoryName']:"";
            $categoryId = isset($data['categoryId'])?$data['categoryId']:"";

            $slot_date = isset($data['slot_date'])?$data['slot_date']:"";
            $slot_time = isset($data['slot_time'])?$data['slot_time']:"";

            $payment_method = isset($data['payment_method'])?$data['payment_method']:"";

            // if(!empty($_SESSION)){
            // $invoiceClientId='';
            // $invoiceClientId = $orderData->client_unique_id;
            // }
              
               

            $amount =  isset($data['amount'])?$data['amount']:0;
            $gst =  isset($data['gst'])?$data['gst']:0;
            $totalAmount =  isset($data['totalAmount'])?$data['totalAmount']:0;
            if($amount != 0){
                $totalAmount = intval($amount)+intval($gst);
            }


            
            $invoiceTotalAmountInWord   = ($totalAmount != 0)?ucwords(convert_number_to_words($totalAmount)).' Only':""; 

            // $invoiceRayzorpayPayId      = createOrderIdEncode($orderData->paymentId,"Documentation Payment");//'IND'.$year.$orderData->paymentId;  
            $invoiceRayzorpayPayId =  isset($data['gatewayTransID'])?$data['gatewayTransID']:'';   

            $invoiceClientId = isset($data['clientId'])?$data['clientId']:"";
            $fName                    = isset($data['client_f_name'])?$data['client_f_name']:'';
            $lName               = isset($data['client_l_name'])?$data['client_l_name']:'';
            $mobile               = isset($data['mobile'])?$data['mobile']:'';
            $email               = isset($data['email'])?$data['email']:'';
            $payment_status             = isset($data['payStatus'])?$data['payStatus']:'';
            $gstNumber = isset($data['client_gst_number'])?'
            <tr>
                <td colspan="2" style="text-align: left; color: #ebc16e;"><b>GSTIN :</b> '.$data['client_gst_number'].'</td>
            </tr>
            ':''; 

            $invoiceTemplate = '
            <html>
                <body>
                    <table border="0" align="center"  cellpadding="0" cellspacing="0" style="width:50%; margin: auto;">
                        <tbody>
                            <tr>
                                <td style="padding: 23px 0px; background: white; box-shadow: 0px 0px 3px 0px #bcc3bf;">
                                    <table border="0" align="center"  cellpadding="0" cellspacing="0" style="width:100%; padding: 0px 40px 10px 40px; margin: auto;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 300px;">
                                                    <div class="logo">
                                                        <img src="'.base_url().'/assets/images/law_logo.png" style="width: 150px;margin-left: 20px;" />
                                                    </div>
                                                </td>
                                                <td style="font-family: system-ui; text-align: right; width: 300px;">
                                                    <table>
                                                        <tr>
                                                            <td style="margin-bottom: 15px; font-size: 25px; color: #e9a61a;font-weight: 600; text-align: right;">Insaaf99.com </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="margin-bottom: 10px; line-height: 1.4; font-size: 14px; text-align: right;">
                                                            G-45, First Floor, Udhyog Marg,
                                                            Sector-6
                                                            Opp Hyundai Service Station
                                                            Noida, Uttar Pradesh (201301), India. <br>
                                                            GST:- 09AANFJ5509Q1ZJ
                                                            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="margin-bottom: 10px; text-align: right;">
                                                                <a href="mailto:contact@insaaf99.com" style="font-size: 16px;color: black;font-weight: 400;">contact@insaaf99.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="margin-bottom: 10px; text-align: right;"><strong></strong></td>
                                                        </tr>
                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" style="width: 800px; padding: 0px 40px; margin: auto;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 33%;">
                                                    <p style="height: 1px; background-color: #b3b3b3; color: #b3b3b3; width: 250px;"></p>
                                                </td>
                                                <td style="text-align: center; font-family: system-ui; font-size: 20px; margin-bottom: 15px; padding-bottom: 30px;">
                                                    <p style="margin-top: 17px;">Invoice </p>
                                                </td>
                                                <td style="width: 33%;">
                                                    <p style="height: 1px; background-color: #b3b3b3; color: #000; width: 250px;"></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table border="0" align="center"  cellpadding="0" cellspacing="0" style="width: 800px; padding: 0px 40px; margin: auto;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 360px;">
                                                    <table style="width: 99%;padding:20px; font-family: system-ui; font-size: 15px; height: 120px; border: 2px solid #ebc16e;">
                                                       
                                                        <tr>
                                                            <td style=" color: #000000;">'.strtoupper($fName).' '.strtoupper($lName).'</td>
                                                           
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td colspan="2" style="text-align: left; color: #000000;">'.$mobile.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: "><a href="mailto:'.$email.'" style="left;color:#000;">'.$email.'</a></td>
                                                        </tr>
                                                       '.$gstNumber.'
                                                    </table>
                                                    <!-- end -->
                                                    <!-- new table start -->
                                                </td>

                                                <td style="width: 360px; border: 2px solid #ebc16e; padding: 8px;">
                                                    <table style="width: 99%; font-family: system-ui; font-size: 15px;">
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Order ID:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$invoiceRayzorpayPayId.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Invoice Date:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$invoiceDate.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Client ID:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$invoiceClientId.'</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <!-- end -->
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" align="center"  cellpadding="0" cellspacing="0" style="width: 800px; padding: 0px 40px; margin: auto;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 360px;">
                                                    <table style="width: 99%;padding:20px; font-family: system-ui; font-size: 15px; height: 120px; border: 2px solid #ebc16e;">
                                                       
                                                        <tr>
                                                            <td style=" color: #000000;"><b>Case Details</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Case ID:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$categoryId.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Case Category:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$categoryName.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Meeting Type:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">Video Call</td>
                                                        </tr>
                                                  
                                                    </table>
                                                    <!-- end -->
                                                    <!-- new table start -->
                                                </td>

                                                <td style="width: 360px; border: 2px solid #ebc16e; padding: 8px;">
                                                    <table style="width: 99%; font-family: system-ui; font-size: 15px;">
                                                        <tr>
                                                            <td style=" color: #000000;"><b>Meeting Details</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Meeting Date:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$slot_date.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Meeting Time:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$slot_time.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;">Meeting Duration:</td>
                                                            <td colspan="2" style="text-align: right; float: right;">15 Minuts</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <!-- end -->
                                            </tr>
                                        </tbody>
                                    </table>


                                    <! -- Add GST -->

                                     <table border="0" align="center"  cellpadding="0" cellspacing="0" style="width: 800px; padding: 0px 40px; margin: auto;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 360px;">
                                                    <table style="width: 99%;padding:20px; font-family: system-ui; font-size: 15px; height: 120px; border: 2px solid #ebc16e;">
                                                         <tr>
                                                            <td style=" color: #000000;"><b>Fee Details</b></td>
                                                        </tr>

                                                        <tr>
                                                            <td style=" color: #000000;">Insaaf99 Fee:</td>
                                                           
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td colspan="2" style="text-align: left; color: #000000;">GST(18%):</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: ">Grand Total:</td>
                                                        </tr>
                                                     
                                                    </table>
                                                    <!-- end -->
                                                    <!-- new table start -->
                                                </td>

                                                <td style="width: 360px; border: 1px solid #ebc16e; padding: 8px;">
                                                    <table style="width: 99%; font-family: system-ui; font-size: 15px;">
                                                       <tr>
                                                            <td colspan="2" style="text-align: left;"></td>
                                                            <td colspan="2" style="text-align: right; float: right; color: #000000;"><b>Amount(In INR)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;"></td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$amount.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;"></td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$gst.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: left;"></td>
                                                            <td colspan="2" style="text-align: right; float: right;">'.$totalAmount.'</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <!-- end -->
                                            </tr>
                                        </tbody>
                                    </table>


                                    <!-- GST end -->
                                     
                                    <table border="0" align="center" cellpadding="0" cellspacing="0" style="width:100%; padding: 8px 40px; margin: auto;">
                                        <tbody>
                                            <tr>
                                                <th style="background-color: #ebc16e; font-family: system-ui; font-weight: 500; text-align: center; padding: 10px; color: black;">Payment Date</th>
                                                <th style="background-color: #ebc16e; font-family: system-ui; font-weight: 500; text-align: center; padding: 10px; color: black;">Payment Mode</th>
                                                <th style="background-color: #ebc16e; font-family: system-ui; font-weight: 500; text-align: center; padding: 10px; color: black;">Payment Status</th>
                                                <th style="background-color: #ebc16e; font-family: system-ui; font-weight: 500; text-align: center; padding: 10px; color: black;">Payment Amount (INR)</th>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px; font-family: system-ui; color: #000; border-bottom: 2px solid #ebc16e; border-left: 2px solid #ebc16e; border-right: 2px solid #ebc16e; text-align: center;">'.$invoiceDate.'</td>
                                                <td style="padding: 10px; text-align: right; font-family: system-ui; border-bottom: 2px solid #ebc16e; border-right: 2px solid #ebc16e; text-align: center;">'.strtoupper($payment_method).'</td>
                                                <td style="padding: 10px; text-align: right; font-family: system-ui; border-bottom: 2px solid #ebc16e; border-right: 2px solid #ebc16e; text-align: center;font-weight: 600;background: #ebc16e26;">'.$payment_status.'</td>
                                                <td style="padding: 10px; text-align: right; font-family: system-ui; border-bottom: 2px solid #ebc16e; border-right: 2px solid #ebc16e; text-align: center;font-weight: 500;">'.$totalAmount.''."/-".'</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                      <table border="0" align="center" width="100%" cellpadding="0" cellspacing="0"  style="width: 100%; padding: 0px 40px; margin:auto; padding-top:20px;">
                                         <tbody style="margin-top:20px;">
                                        
                                         
                                        
                                          <tr style="padding-top: 10px;">
                                            <td style="padding-top: 20px; "><span style=" font-family: system-ui;color: #535353;">Amount in Words:</span>&nbsp;
                                                <span style=" font-family: system-ui;color: #000; font-weight: 600; font-size:17px">'.$invoiceTotalAmountInWord.'</span>
                                            </td>
                                          </tr>
                                        </tbody>
                                       </table>

                                    <!-- footer Con -->
                                    <table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" style="padding: 0px 40px; margin-top: 30px;">
                                        <tbody>
                                            <tr>
                                                <td colspan="1" style="text-align: left; font-size: 18px; font-weight: 800; width: 49%;">Important Note</td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <td colspan="1" style="text-align: left; font-family: system-ui;">
                                                    <p style="font-size:14px;text-align: justify font-family: system-ui;">
                                                        For more details related to <a href="https://insaaf99.com/refund-policy">Return & Refund policy</a> you must visit our <a href="https://insaaf99.com">Insaaf99
                                                    </a>website.
                                                    </p>
                                                    <br />
                                                    <a href="mailto:contact@insaaf99.com">contact@insaaf99.com</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--// footer Con -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </body>
            </html>';

           // echo $invoiceTemplate;     
            return $invoiceTemplate;
        }

}


?>
