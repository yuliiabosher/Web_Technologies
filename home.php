<?php

include ('include/session.php');
echo '<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />';
# Open database connection.
require ( 'connect_db.php' );
 echo '<a href="logout.php" class="btn btn-outline-primary">Logout</a>';
 echo '<div class="row">';	
# Retrieve items from 'products' database table.
 $q = "SELECT * FROM products" ;
 $r = mysqli_query( $link, $q ) ;
   if ( mysqli_num_rows( $r ) > 0 )
{
# Display body section.
   while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
{
   echo '
    <div class="col-sm">
      <div class="card" style="width: 18rem;">
        <img src="'. $row['item_img'].'" class="card-img-top" alt="'. $row['item_name'].'">
	 <div class="card-body text-center">
	   <h5 class="card-title">'. $row['item_name'].'</h5>
	   <p class="card-text">'. $row['item_desc'].'</p>
	   <p class="card-text">£ '. $row['item_price'].'</p>
           <a href="added.php?id='.$row['item_id'].'" class="btn btn-outline-primary">Buy Now</a>
	  </div>
         </div>
       </div>  ';
}
# Close database connection.
   mysqli_close( $link) ; 
}
# Or display message.
   else { echo '<p>There are currently no items in the table to display.</p>' ; }
	
?>
