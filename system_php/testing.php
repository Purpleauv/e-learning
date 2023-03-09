<?php
$length = 10;
$randomString = 'A'; // Set the first character as capital "E"
for ($i = 1; $i < $length; $i++) {
    $randomString .= rand(0,9); // Generate random number
}
echo $randomString;
?>