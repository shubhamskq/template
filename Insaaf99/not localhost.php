<?php
if($_SERVER['HTTP_HOST'] != 'localhost'){
        $result2=$this->send_email($toEmail, $subject, $message);
        }

?>
