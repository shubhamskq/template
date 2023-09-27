// View Code
<?php foreach($List as $v) { ?>
                <div class="form-group">
                   <label for="catdesc"><?= $v." description"?></label>
                  <textarea  rows="8" id="about" name ="des[<?= $v?>]" class="form-control" placeholder="Case Category Description"  ></textarea>
              </div>
   <?php } ?>


// Controller Code
<?php 
 $resultSet = array();
        $resultSet[] = $_POST['des'];
        $insertData['catdesc'] = json_encode($resultSet);
?>
