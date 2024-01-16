<script>
var i = <?= $i ?>;
var tNew = 0;
$('.followupsbtn').click(function(){
    var htmlDiv = `
            <div class="row mb-2 py-2" style="background:#c8d9e3" >
                 <div class="col-sm-3">
                        <label for="name">Certificate Name</label>
                        <input type="text" class="form-control" id="certi_name" name="certificatLabel[`+tNew+`]" placeholder="Example:Enrollment Certificate" value="enrollment certificate">
                </div>
                 <div class="col-sm-3">
                        <label for="name">Comments</label>
                        <input type="file" class="form-control" id="certi_file" name="imgArr_`+tNew+`"  value="" accept="image/png,image/jpeg,image/jpg,application/pdf" >
                    </div>
            </div>      
        
    `;
    $(".followupCon").append(htmlDiv);
    $("button").removeClass('submitBtn');

   // var div1 = document.getElementById("folo_icon");
   // var div2 = document.getElementById("follow");
   //   div1.style.display = "none";
   //   div2.style.display = "block";
    tNew++;
    i++;
    if(i == 5)
    {
     $('.followupsbtn').hide(); 
    }
});

</script>
