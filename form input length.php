<script>

$("#form1").submit(function() {
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var about = $("#about").val();
        var image = $("#lawyerFile").val();

        var lang = 0;
        $(".languageCon").each(function(){
            if ($(this).is(':checked')){
                lang++;
            }
        });

        if(lang == 0){
            alert("Language Required !!");
            return false;
        }


</script>
