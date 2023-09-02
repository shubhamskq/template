    public function queryshow() {
       
      $sql = "";
      $sql = $this->db->select('*')

                      ->get("client_query");
        return $sql->result();
          

  }
