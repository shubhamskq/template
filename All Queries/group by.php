<?php 
  $sql = "SELECT parent_id, count(id) as newChat FROM client_query WHERE parent_id in ($parentId) AND type = 'client' AND seen = '0' GROUP BY parent_id  ";
        $dbData = $this->client_model->rawQuery($sql);
        $newChatArr = array();
        if(!empty($dbData)){
            foreach ($dbData as $v) {
                $newChatArr[$v->parent_id] = $v->newChat;
            }
        }


?>
