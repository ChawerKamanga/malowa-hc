<?php
    include 'auth.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $fields = array($email, $password);

    $fieldEmpty = false;

    foreach ($fields as $field) {
        if (empty($field)) {
            $fieldEmpty = true;  
        }
    }

    if ($fieldEmpty) {
        header("Location: http://localhost/malowa-hc/index.php?errors=true");
    }
    
    if (validEmail($email) && validPassword($password, $email)) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: http://localhost/malowa-hc/dashboard/index.html.php");
    }else {
        header("Location: http://localhost/malowa-hc/index.php?errors=true");
    }