<?php

// Controller Code
$row[]=$urlParts['path'].' <button type="button" class="btn btn-slug" data-slug="'.$currentObj->current_slug.'" ><i class="bi bi-box-arrow-up-right"></i>
</button><button type="button" class="btn btn-sm copy_to" style="margin-left:5px;" data-slug="'.$currentObj->current_slug.'"><i class="bi bi-clipboard"></i></button>';

// View Code
<div class="modal fade" id="slugModal" role="dialog">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Web URL</h4>
        </div>
        <div class="modal-body">
          <textarea id="modalSlug_url" style="height: 200px; width: 550px;" ></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>
?>

<!-- Javascript Code  -->
<script>
// open slug modal =================================
$(document).ready(function() {
    jQuery(document).on("click", ".btn-slug", function() {
    var slug = $(this).attr('data-slug');
    $("#modalSlug_url").html(slug);
    $("#slugModal").modal('show');
});
});
  
</script>

