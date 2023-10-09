 <?php

 if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  
	  require ('connect_db.php'); 

  # Initialize an error array.
  $errors = array();


  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }


  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }
  

   if (empty( $_POST[ 'new_email' ] ) )
  { $errors[] = 'Enter your email' ; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'new_email' ] ) ) ; }
   

  if (!empty( $_POST[ 'new_password1' ] ) )
  {
    if ( $_POST[ 'new_password1' ] != $_POST[ 'new_password2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'new_password1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
    
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email = '$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>' ;
  }

     # On success insert data into products on database
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
	VALUES ('$fn','$ln', '$e', SHA2('$p', 256), NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<p>New account created successfully</p> '; }
  
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
