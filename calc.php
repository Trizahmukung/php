<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .calculator {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator input[type="text"], .calculator select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.2em;
        }
        .calculator input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #28a745;
            color: white;
            font-size: 1.2em;
            border-radius: 5px;
            cursor: pointer;
        }
        .calculator input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>PHP Calculator</h2>
    <form method="POST" action="">
        <input type="text" name="num1" placeholder="Enter first number" required>
        <input type="text" name="num2" placeholder="Enter second number ">
        <select name="operation" required>
            <option value="add">Addition </option>
            <option value="subtract">Subtraction </option>
            <option value="multiply">Multiplication </option>
            <option value="divide">Division </option>
            <option value="power">Exponentiation </option>
            <option value="sqrt">Square Root </option>
            <option value="percent">Percentage </option>
            <option value="log">Logarithm </option>
        </select>
        <input type="submit" name="calculate" value="Calculate">
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
        $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : null;
        $operation = $_POST['operation'];
        $result = '';

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = 'Cannot divide by zero';
                }
                break;
            case 'power':
                $result = pow($num1, $num2);
                break;
            case 'sqrt':
                $result = sqrt($num1);
                break;
            case 'percent':
                $result = $num1 * ($num2 / 100);
                break;
            case 'log':
                if ($num1 > 0) {
                    $result = log($num1);
                } else {
                    $result = 'Logarithm undefined for non-positive numbers';
                }
                break;
            default:
                $result = 'Invalid operation';
                break;
        }

        echo "<h3>Result: $result</h3>";
    }
    ?>
        
</div>

</body>
</html>
