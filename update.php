<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
<!-- Bootstrap CSS -->
<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

 

 

    <title>CRUD</title>
<style>
      body {
        font-family: "Changa";
        font-size: 22px;
      }
</style>
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

$link = mysqli_connect('localhost','root','','shop_db'); 
if (!$link) { 
# Otherwise fail gracefully and explain the error. 
	die('Could not connect to MySQL: ' . mysqli_error()); 
} 
echo 'Connected to the database successfully!';  

 

 

  
  # Initialize an error array.
  $errors = array();

 

# Check for a item name.
  if ( empty( $_POST[ 'item_id' ] ) )
  { $errors[] = 'Update item ID.' ; }
  else
  { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'item_id' ] ) ) ; }

  # Check for a item name.
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Update item name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

 

  # Check for a item description.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Update item description.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }

 

# Check for a item image.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Update image address.' ; }
  else
  { $i = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }

  # Check for a item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Update item price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }
if ( empty( $errors ) ) 
  {

 

   # Update the record in the database

 

 

    $sql = "UPDATE products SET item_id = '$id', item_name = '$n', item_desc = '$d', item_img = '$i', item_price = '$p' WHERE item_id='$id'";
    $r = mysqli_query ( $link, $sql ) ;
    if ($r) { 
    	echo '<p>New record updated successfully</p> '; }
    else {
            echo "Error updating user: " . mysqli_error($link);
        }
     $sql ="UPDATE products SET item_id='$id',item_name='$n', item_desc='$d', item_img='$i', item_price='$p'  WHERE item_id='$id'";
     $r = mysqli_query ( $link, $sql );
     if ($r)
    {
	# returns to read page when updated
       header("Location: read.php");
    } else {
	# Fail and report error
        echo "Error updating record: " . $link->error;
    }

    # Close database connection.

	mysqli_close($link); 
    exit();
  }
  # Or report errors.
  else 
  {  
    echo ' 
<script type ="text/JavaScript">
	alert("' ;
    foreach ( $errors as $msg )
    { echo "$msg " ; }
    echo 'Please try again.")</script>';
    # Close database connection.
    mysqli_close( $link );
  } 

}
 


?>

 

<div class="container">
<div class="row text-center mb-3 mt-3">
<div class="col-sm col-md col-lg col-xl">
<h3 class="mt-3">UPDATE A RECORD</h3>
</div>
</div>
<div class="row mb-3">
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="item_id">Item ID</label>
<input
                type="text"
                class="form-control"
                id="item_id"
                name="item_id"
                value="<?php echo $product['item_id']; ?>"
              />
</div>
<div class="form-group">
<label for="item_name">Item name</label>
<input
                type="text"
                class="form-control"
                id="item_name"
                name="item_name"
                value="<?php echo $product['item_name']; ?>"
              />
</div>
<div class="form-group">
<label for="item_desc">Item description</label>
<textarea
                class="form-control"
                id="item_desc"
                name="item_desc"
                rows="3"
                value="<?php echo $product['item_desc']; ?>"
></textarea>
</div>
<div class="form-group">
<label for="item_img">Attach the product image</label>
<input
                type="text"
                class="form-control"
                id="item_img"
                name="item_img"
                value="<?php echo $product['item_img']; ?>"
              />
</div>
<div class="form-group">
<label for="item_price">Item price</label>
<input
                type="text"
                class="form-control"
                id="item_price"
                name="item_price"
                value="<?php echo $product['item_price']; ?>"
              />
</div>
<br />
<button type="submit" class="btn btn-primary btn-block">UPDATE</button>
</form>
</div>
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"></div>
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"></div>
</div>
<div class="row mb-3">
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"></div>
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"></div>
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"></div>
</div>
<div class="row mb-3">
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"></div>
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"></div>
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"></div>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
></script>
<script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
></script>
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
></script>
</body>
</html>

