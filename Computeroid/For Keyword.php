<?php
$array = [15, 17, 17];
$scores = array_count_values($array);
krsort($scores);  // This will order it by score descending.

echo "<table>\n";
echo "<tr><th>Score</th><th>Frequency</th></tr>\n";
foreach ($scores as $value => $count) {
    echo "<tr><td>" . $value . "</td><td>" . $count . "</td></tr>\n";
}
echo "</table>\n";
