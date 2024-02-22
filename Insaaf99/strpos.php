<?php
foreach($caseCategoryData as $v){
            if (strpos($matchvalue, strtolower($v->name)) !== false){
                pre($v->name);
            }
           }


?>
