<!-- A simple HTML form that submits data to the same page using GET -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    Number: <input type="text" name="num"><br>
    <input type="submit" value="Submit">
</form>

<?php
// Get the value submitted via the form, using $_GET
$num = $_GET['num'];

// Perform the mathematical operation
if (isset($num)) {
    echo "Multiplication table of " . $num . ":<br><br>";
    for ($i = 1; $i <= 10; $i++) {
        
        echo $num . " x " . $i . " = " . $num*$i . "<br>";
    }
}   
?>