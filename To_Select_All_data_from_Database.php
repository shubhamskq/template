<?php
//Model Code
public function queryshow() {
       
      $sql = "";
      $sql = $this->db->select('*')

                      ->get("client_query");
        return $sql->result();
          

  }

//Controller Code
 $this->load->model('Client_query_model');
   
        $result['data']=$this->Client_query_model->queryshow();
        $this->load->view('admin/list',$result);



?>
