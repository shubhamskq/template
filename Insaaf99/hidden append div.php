var tNew = 0;
$('.followupsbtn').click(function(){
    var htmlDiv = `
            <div class="row mb-2 py-2" style="background:#c8d9e3" >
                 <div class="col-sm-3">
                        <label for="name">Followup Date</label>
                        <input type="text" class="form-control" name="newFolloupArr[`+tNew+`][date]" placeholder="Enter Date" value="">
                </div>
                <div class="col-sm-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="newFolloupArr[`+tNew+`][name]" placeholder="Enter Name" value="">
                </div>
                 <div class="col-sm-6">
                        <label for="name">Comments</label>
                        <input type="text" class="form-control" name="newFolloupArr[`+tNew+`][comment]" placeholder="Enter Query" value="">
                    </div>
            </div>      
        
    `;
    $(".followupCon").append(htmlDiv);
    $("#submitBtn").removeClass("hidden");

   // var div1 = document.getElementById("folo_icon");
   // var div2 = document.getElementById("follow");
   //   div1.style.display = "none";
   //   div2.style.display = "block";
    tNew++;
});

      $folo;
      if(!empty($client->followups)){
      $folo = json_decode($client->followups);
 
       }
        $followup = $form_data['newFolloupArr'];
            foreach($followup as $v)
            {
                $folo[] = array($v['date'] =>array("followupby"=>$v['name'],"comment"=>$v['comment'],"status"=>1));
            }
      
