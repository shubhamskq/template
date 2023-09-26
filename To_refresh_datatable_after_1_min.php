<script type="text/javascript">
var table;
$(document).ready(function() {
    _fnGetTableData();
});

// function get table data from data base
function _fnGetTableData() {

    <?php
         $from_date = isset($_GET['from_date'])?'&from_date='.$_GET['from_date']:"";
         $to_date = isset($_GET['to_date'])?'&to_date='.$_GET['to_date']:"";
    ?>
    var getcontact_data = "<?php echo  isset($_GET['type'])?'?type='.$_GET['type'].$from_date.$to_date:''?>";
    //datatables
    table = $('#example').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/tempdata/ajax_list')?>" + getcontact_data,
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
    });
    setInterval(function() {
        table.ajax.reload();
            }, 60000);
}
</script>
