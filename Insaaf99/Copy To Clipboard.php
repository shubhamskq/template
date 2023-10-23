<?php
// Controller Code
$row[]=$urlParts['path'].' <button type="button" class="btn btn-slug" data-slug="'.$currentObj->current_slug.'" ><i class="bi bi-box-arrow-up-right"></i></button>
<button type="button" class="btn btn-sm copy_to" style="margin-left:5px;" data-slug="'.$currentObj->current_slug.'"><i class="bi bi-clipboard"></i></button>';
?>

<!-- Javascript Code -->
<script>
$(document).ready(function() {
jQuery(document).on("click", ".copy_to", function() {
   
   navigator.clipboard.writeText( $(this).attr('data-slug') )
    alert("Text copied to clipboard: ");
});
});
</script>
