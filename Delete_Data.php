<?php
    public function delete()
    {
        $this->isLoggedIn();
        $id = $_POST['id'];
       
        $result = $this->Payment_model->delete($id);
     
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
        /* end code for delete product */
    }

?>
