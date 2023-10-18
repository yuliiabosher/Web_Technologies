<?php

include ('include/session.php');
echo '<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/ddade31aae.js" crossorigin="anonymous"></script>';
# Open database connection.
require ( 'connect_db.php' );
 
 $logout = '<a href="logout.php" class="btn btn-outline-primary"> Logout</a>';
 $cart = '<a href="cart.php" class="btn btn-outline-danger ml-2"><i class="fas fa-shopping-cart"></i> Cart	</a>';
 echo "<div class='container mb-1 '><div class='row'><div class='col mb-1'>".$logout.$cart."</div></div>";
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
    <div class="col">
      <div class="card h-75">
        <img src="'. $row['item_img'].'" class="h-75 card-img-top" alt="'. $row['item_name'].'">
	 <div class="card-body text-center">
	   <h5 class="card-title">'. $row['item_name'].'</h5>
	   <p class="card-text">'. $row['item_desc'].'</p>
	   <p class="card-text">£ '. $row['item_price'].'</p>
           <a href="added.php?id='.$row['item_id'].'">Buy Now</a>
	  </div>
         </div>
       </div>  ';
}
# Close database connection.
   mysqli_close( $link) ; 
}
# Or display message.
   else { echo '<p>There are currently no items in the table to display.</p>' ; }
echo "</div>";	
?>
