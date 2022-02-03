<?php

    session_start();
    session_regenerate_id();
    if (isset($_SESSION['email']))      
    {
        header("Location: http://localhost/malowa-hc/dashboard/index.html.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malowa Health Center</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if (isset($_GET['errors'])) {
            echo '<p class="text-red">Wrong credentials</p>';
        }
    ?>
    <form action="http://localhost/malowa-hc/auth/login.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required> <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required> <br> 

        <a href="http://localhost/malowa-hc/register/index.html.php">register</a> <br>

        <input type="submit" value="Login">

    </form>
</body>
</html>