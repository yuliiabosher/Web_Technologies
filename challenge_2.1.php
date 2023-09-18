<?php
function replaceVowelsWithX($str) {

$vowels = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');

return str_replace($vowels,"X",$str);

}

$st = 'Hello World!';

$output = replaceVowelsWithX('Hello World!');

echo $output

?>