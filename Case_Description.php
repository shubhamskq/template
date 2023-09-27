<p>
                     <?php 
                       if (is_array($citydetails->catdesc) || is_object($citydetails->catdesc))  {
                       foreach($citydetails->catdesc as $cat => $desc) {
                        echo "hello";
                        pre($desc);
                        exit;
                     ?>
                   <?php }} ?
</p>
