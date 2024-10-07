<html>
    <body bgcolor="lightblue">
        <form method="post">
            <fieldset>
                <legend>INCOME TAX CALCULATOR</legend>
            </fieldset>
            <label for="name">Employee Name:</label>
            <input type="text" name="name" id="name" required><br><br>

            <label for="pf_number">PF Number:</label>
            <input type="text" name="pf_number" id="pf_number" required><br><br>

            <label for="marital_status">Marital Status:</label>
            <select id="marital_status" name="marital_status"> 
                <option value="single">Single</option>
                <option value="married">Married</option>
            </select><br><br>

            <label for="gross_income">Gross Income:</label>
            <input type="text" name="gross_income" id="gross_income" required><br><br>
            <button type="submit">Calculate Net Salary</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $pf_number = $_POST['pf_number'];
            $marital_status = $_POST['marital_status'];
            $gross_income = floatval($_POST['gross_income']);

            function calculate_tax($taxable_income) {
                $tax = 0;
                if ($taxable_income > 37000) {
                    $tax += 16 * ($taxable_income - 37000) / 100;
                    $taxable_income = 37000;
                }
                if ($taxable_income > 30000) {
                    $tax += 14 * ($taxable_income - 30000) / 100;
                    $taxable_income = 30000;
                }
                if ($taxable_income > 20000) {
                    $tax += 12 * ($taxable_income - 20000) / 100;
                    $taxable_income = 20000;
                }
                if ($taxable_income > 10000) {
                    $tax += 9 * ($taxable_income - 10000) / 100;
                    $taxable_income = 10000;
                }
                if ($taxable_income > 5000) {
                    $tax += 6 * ($taxable_income - 5000) / 100;
                }
                return $tax;
            }

            function calculate_net_salary($gross_income, $marital_status) {
                $tax_relief = $marital_status === 'single' ? 650 : 1110;
                $taxable_income = $gross_income - $tax_relief;
                $tax = calculate_tax($taxable_income);
                $net_salary = $gross_income - $tax;
                return $net_salary;
            }

            $net_salary = calculate_net_salary($gross_income, $marital_status);

            echo "<h2>Employee Name: $name</h2>";
            echo "<h2>PF Number: $pf_number</h2>";
            echo "<h2>Net Salary: " . number_format($net_salary, 2) . "</h2>";
        }
        ?>
    </body>
</html>