
<?php
// Get Database List 
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
    var getclient_data = "<?php echo  isset($_GET['type'])?'?type='.$_GET['type'].$from_date.$to_date:''?>";


    //datatables
    table = $('#example').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/client/ajax_list')?>" + getclient_data,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],

    });

}
</script>

?>

// Controller Code 
<?php
 // Member list
    public function ajax_list()
    {   
         error_reporting(0);
   
      $list =$this->Client_model->get_datatables();

      $data = array();

        $no =(isset($_POST['start']))?$_POST['start']:'';

       
        // save data for parent catelgory list
      
        foreach ($list as $currentObj) {

            $new = ($currentObj->seen == 0)?'<span class="badge bg-1 text-danger blink_now" >New</span>':'';
            $temp_date = $currentObj->dt;
            $date_at = date("d-m-Y h:i a", strtotime($temp_date));
            $no++;
            $row = array();
            $row[] ='<input type="checkbox" name="checkbox" class="checkbox" value="'.$currentObj->id.'">';
            $row[] ='<span class="btn-primary  btn12  badge">'.$no.'</span>';
            $first_name=$currentObj->fname;
            $last_name=$currentObj->lname;
            $fullname=$first_name.' '. $last_name;
            $row[] = $fullname;
            $row[]=$currentObj->client_unique_id;
            $row[]=$currentObj->mobile;
            $city = (!empty($currentObj->city))?$currentObj->city:"N/A";
            $row[]= $city;
            $client_id=$currentObj->id;

            $where['client_id']=$client_id;
         
            $row[] = ($currentObj->status==1)?'<span class="btn-success badge">Active</span>':'<span class="btn-danger badge">InActive</span>';
            $row[] = $date_at.$new;
            $row[] = '<a class="btn btn-sm btn-info " style="margin-bottom: 4px 0px;" href="'.base_url().'admin/client/view/'.$currentObj->id.'" title="view"  data_id="'.$currentObj->id.'" ><i class="fa fa-eye"></i></a> &nbsp;&nbsp <a class="btn btn-sm btn-info" style="margin: 4px 0px;" href="'.base_url().'admin/client/edit/'.$currentObj->id.'" title="Edit" ><i class="fa fa-pencil"></i></a> &nbsp;&nbsp; <a class="btn btn-sm btn-danger deletebtn" style="margin-bottom: 4px;" href="javascript:void(0)" title="delete"  data_id="'.$currentObj->id.'" ><i class="fa fa-trash"></i></a>';

       
            $data[] = $row;
         
           
        }
     
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->Client_model->count_all(),
                        "recordsFiltered" => $this->Client_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

    }
?>
