<?php
    $sql = "SELECT cities.city as city, cities.city_hi as city_hi FROM cities WHERE city IN (SELECT city FROM lawyer WHERE status = 1 AND city != '') GROUP BY city,city_hi";
    $dbData = $CI->lawyer_model->rawQuery($sql);
?>
