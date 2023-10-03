<?php
// Database connection (Update credentials accordingly)

include "connect_db.php";

$sql = "SELECT item_id, item_name, item_desc, item_img, item_price FROM products";
$r = @mysqli_query ( $link, $sql ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 

#$host = 'localhost';
#$username = 'root';
#$password = '';
#$database = 'crud_db';

#$conn = mysqli_connect($host, $username, $password, $database);

#if (!$conn) {
#    die('Database connection error: ' . mysqli_connect_error());
#}

// Retrieve users from the database
#$query = "SELECT * FROM users";
#$result = mysqli_query($conn, $query);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="row">
    	<div class="col-4">
    	</div>
    	<div class="col-4">
    		<h1 class="text-secondary text-center">Product List</h1>
    	</div>
    	<div class="col-4">
    	</div>
    </div>
     <div class="row mt-3 mb-3">
    	<div class="col-3">
    	</div>
    	<div class="col-3">
    		
    	</div>
    	<div class="col-3">
    		
    	</div>
    	<div class="col-3">
    		<a href="modify_product.html" role="button" class="btn btn-primary">Add product</a>
    	</div>
    </div>
    <table class="container">
        <tr class="row">
            <th class="col-3">Item name</th>
            <th class="col-3"> Item description</th>
            <th class="col-3">Attach the product image</th>
             <th class="col-3">Item price</th>
        </tr>
        <?php
        #while ($row = mysqli_fetch_assoc($result)) 
        while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
        
            {
            // Inside the while loop that displays user data
				echo '<tr class="row">';
				echo '<td class="col-3">' . $row['item_name'] . '</td>';
				echo '<td class="col-3">' . $row['item_desc'] . '</td>';
				echo '<td class="col-3"> <img class="img-thumbnail" style="width: 70px; height: 80px" src=' . $row['item_img'] . '></td>';
				echo '<td class="col-3"> £' . $row['item_price'] . '</td>';
				echo '<form action=' . '"' . 'update.php?item_id=' . $row['item_id'] . '"' . 'method="get">';
			        echo '<input type="submit" name="submit" value="Edit">';
			        echo '</form><td>'
				echo '<td class="col-3 mb-3">';
				echo '<form action=' . '"' . 'delete.php?item_id=' . $row['item_id'] . '"' . 'method="post">';
			        echo '<input type="submit" name="submit" value="Delete">';
                                 echo '</form><td>';
				echo '</tr>';
			}
        ?>
    </table>
   
    
</body>
</html>

<?php
// Close the database connection
mysqli_close($link);

exit()
?>
