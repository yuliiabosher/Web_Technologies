<!-- A simple HTML form that submits data to the same page using GET -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    Number 1: <input type="text" name="num1"><br>
    Number 2: <input type="text" name="num2"><br>
    Operator: <input type="text" name="operator"><br>
    <input type="submit" value="Submit">
</form>

<?php
// Get the values submitted via the form, using $_GET
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$operator = $_GET['operator'];

// Perform the mathematical operation
if ((isset($num1)) && (isset($num2)) && (isset($operator))) {
    switch ($operator) {
        case "+":
            $result = $num1 + $num2;
            echo $num1 . $operator . $num2 . "=" . $result;
            break;
        case "-":
            $result = $num1 - $num2;
            echo $num1 . $operator . $num2 . "=" . $result;
            break;
        case "*":
            $result = $num1 * $num2;
            echo $num1 . $operator . $num2 . "=" . $result;
            break;
        case "/":
            $result = $num1 / $num2;
            echo $num1 . $operator . $num2 . "=" . $result;
            break;
        case "**":
            $result = $num1 ** $num2;
            echo $num1 . $operator . $num2 . "=" . $result;
            break;
        default:
            print "Please enter either +,-,*,/ or **";
    }
}
?>