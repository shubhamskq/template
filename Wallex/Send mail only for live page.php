<?php
 if($_SERVER['HTTP_HOST'] != 'localhost') {
                $this->send_email($toEmail, $subject, $message);
                }

?>
