<?php
   // Count all
        public function count_all()
        {
            $this->db->from($this->table);
            $this->joinQuery();
            $this->action_condition();
            return $this->db->count_all_results();
        }
?>
