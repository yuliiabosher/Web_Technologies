<?php
$results = array("Aarron"=>array("Physics"=>"74%",
"English"=>"69%", "Maths"=>"70%"),
"Jamie"=>array("Physics"=>"64%",
"English"=>"79%", "Maths"=>"69%"),
"Harry"=>array("Physics"=>"55%", "English"=>"52%",
"Maths"=>"57%"));
echo "Aarron's Physics results are ";
echo $results['Aarron']['Physics'];
echo "<br>Jamie's English results are ";
echo $results['Jamie']['English'];
echo "<br>Harry's Maths results are ";
echo $results['Harry']['Maths'];
?>