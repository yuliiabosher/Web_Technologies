 <?php

 if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('connect_db.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for iten name 
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Enter the item name' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

  # Check for description
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Enter description' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }
  
   # Check for image
   if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Attach an image' ; }
  else
  { $i = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }
   
  # Check for price
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Set price' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }
    

  
   # On success insert data into products on database
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO products (item_name, item_desc, item_img, item_price) 
	VALUES ('$n','$d', '$i', '$p' )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<p>New record created successfully</p> '; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }
   
  # Or report errors
  else 
  {
    echo '<p>The following error(s) occurred:</p>' ;
    foreach ( $errors as $msg )
    { echo "$msg<br>" ; }
    echo '<p>Please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
	
  }  
}
?>
