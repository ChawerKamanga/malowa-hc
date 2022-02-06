<?php
 
// $password = "GeeksforGeeks";
 
// $hashed_password =
// '$2y$10$MQU3vDgoN10.JxyJ1m9UQOEqFy.Jg3D8tmHdZUAAkcpGFRwkbbLfi';
 
// echo "Original Password is: ", $password;
// echo "\n";
 
// echo "Hashed Password is: ", $hashed_password;
// echo "\n";
 
// if (password_verify($password, $hashed_password)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }

$timezone = date_default_timezone_get();
$date = date('m/d/Y', time());

$date1 = new DateTime('2001-04-08');
$date2 = new DateTime($date);
$interval = $date1->diff($date2);
echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

// shows the total amount of days (not divided into years, months and days like above)
echo "difference " . $interval->days . " days ";
