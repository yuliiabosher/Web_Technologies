<!-- A simple HTML form that submits data to the same page using POST -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Age: <input type="text" name="age"><br>
    <input type="submit" value="Submit">
</form>

<?php
// Get the value submitted via the form, using $_POST
$age = $_POST['age'];

// Display the message
if (isset($age)) {
    if ($age<13) {
        echo "You are a child.";
    }
    elseif ($age<=17) {
        echo "You are a teenager.";
    }
    elseif ($age<=64) {
        echo "You are an adult.";
    }
    else {
        echo "You are a senior citizen.";
    }
}
?>
