<?php
$array=[56,65,76,90,64];

// Display array elements
echo "Array Elements: <br>";
foreach($array as $element){
    echo $element. "<br>";
}

//Calculate sum
$sum=array_sum($array);

//Calculate average
$average=$sum/count($array);

//Display sum and average
echo "Sum of Array Elements: $sum <br>";
echo "Average of Array Elements: $average <br>";
?>