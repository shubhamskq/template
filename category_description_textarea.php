<?php  
             $desc = $edit_data->catdesc; 
             $myArray = json_decode($desc,true);
           
          ?>
   <hr style="width:100%;text-align:left;margin-top:30px; margin-left: 0px; color: black;">
            <?php foreach($List as $v) { ?>
                              <div class="form-group">
                                 <label for="catdesc"><?= $v." description"?></label>
                                <textarea  rows="8" id="about" name ="des[<?= $v?>]" class="form-control" placeholder="Case Category Description"  ><?php echo isset($myArray[$v])?$myArray[$v]:'' ?></textarea>
                            </div>
                 <?php } ?>
