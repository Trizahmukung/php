<?php
if(isset($_POST['submit'])){
   //Collect numbers from text fields
   $array =[
    intval($_POST['num1']),
    intval($_POST['num2']),
    intval($_POST['num3']),
    intval($_POST['num4']),
    intval($_POST['num5']),
    intval($_POST['num6'])

   ];
   //Calculate sum and average
    $sum=0;
   $count=0;
    foreach($array as $row){
        foreach($row as $element){
            $sum+=$element; //calculate sum
            $count++; //count number of elements
        }
       
    }
    $average=$sum/$count; //calculate average
}
?>
<form method ="post">
    Enter 6 numbers: <br>
    <input type="number" name="num1" required><br>
    <input type="number" name="num2" required><br>
    <input type="number" name="num3" required><br>
    <input type="number" name="num4" required><br>
    <input type="number" name="num5" required><br>
    <input type="number" name="num6" required><br>
  
    <button type="submit" name="submit" value="Submit"></button>
</form>
<?php if(!isset($array)): ?>
    <h3>Array Elements:</h3>
  <table border='1'>
    <tr><th>Column 1</th><th>Column 2</th></tr>
    <?php foreach($array as $row): ?>
        <tr>
        <?php foreach($row as $element): ?>
            <td><?php echo $element; ?></td>
        <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </table>
    <h3>Results:</h3>
    <p>Sum: <?php echo $sum; ?></p>
    <p>Average: <?php echo round($average,2) ?></p>
    <?php endif; ?>
