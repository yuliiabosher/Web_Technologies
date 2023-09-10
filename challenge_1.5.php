<?php
$climate = array("July-Aug"=>array("High"=>"19 ℃", "Low"=>"11 ℃"), "Jan-Feb"=>array("High"=>"7 ℃", "Low"=>"1 ℃"));
echo "Average Temperature in Edinburgh<br><br>";
echo "Month     "; echo '   '; echo '   High   ';           echo "      Low";
echo '<br>';
echo '<br>July-Aug   '; echo $climate["July-Aug"]["High"];    echo '   '; echo  $climate["Jan-Feb"]["High"];
echo '<br>';
echo '<br>Jan-Feb       ';	echo '   '; echo                $climate["July-Aug"]["Low"]; echo '   ';     echo $climate["Jan-Feb"]["Low"];
?>