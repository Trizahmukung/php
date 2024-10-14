<?php
if(isset($_POST['submit'])){
   //Collect numbers from text fields
   $array =[
    intval($_POST['num1']),
    intval($_POST['num2']),
    intval($_POST['num3']),
    intval($_POST['num4']),
    intval($_POST['num5'])

   ];
   //Calculate sum and average
    $sum=array_sum($array);
    $average=$sum/count($array); 
}else {
$array=[];
$sum=0;
$average=0;

}
?>
<form method ="post">
    Enter 5 numbers: <br>
    <input type="number" name="num1" required><br>
    <input type="number" name="num2" required><br>
    <input type="number" name="num3" required><br>
    <input type="number" name="num4" required><br>
    <input type="number" name="num5" required><br>
    <button type="submit" name="submit" value="Submit"></button>
</form>
<?php
if(!empty($array)) {
?>
    <h3>Entered Values:</h3>
    <p><?php echo implode(",", $array); ?></p>
    <h3>Results:</h3>
    <p>Sum: <?php echo $sum; ?></p>
    <p>Average: <?php echo $average; ?></p>
<?php
}
?>
