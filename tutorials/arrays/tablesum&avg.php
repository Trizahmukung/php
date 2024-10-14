<?php
$array=[
    [56,65],
    [76,90],
    [64,75]

];
//Calculate sum and average
$sum=0;
$average=0;
foreach($array as $row){
    foreach($row as $element){
        $sum+=$element; //calculate sum
        $count++; //count number of elements
    }
}
$average=$sum/$count; //calculate average

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
//Display sum and average
echo "Sum of Array Elements: $sum <br>";
echo "Average of Array Elements: $average <br>";

?>
