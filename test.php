<?php
 
$password = "GeeksforGeeks";
 
$hashed_password =
'$2y$10$MQU3vDgoN10.JxyJ1m9UQOEqFy.Jg3D8tmHdZUAAkcpGFRwkbbLfi';
 
echo "Original Password is: ", $password;
echo "\n";
 
echo "Hashed Password is: ", $hashed_password;
echo "\n";
 
if (password_verify($password, $hashed_password)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
