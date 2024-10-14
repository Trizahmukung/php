<?php
$array=[
    [56,65],
    [76,90],
    [64,75]

];
//Display array elements in a table
echo "<table border='1'>";
echo "<tr><th>Column 1</th><th>Column 2</th></tr>";
foreach($array as $row){
    echo "<tr>";
    foreach($row as $element){
        echo "<td>".$element."</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
