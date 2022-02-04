<?php
    include 'auth.php';

    $fields = array($_POST['email'], $_POST['password']);

    $fieldEmpty = false;

    foreach ($fields as $field) {
        if (empty($field)) {
            $fieldEmpty = true;  
        }
    }

    if ($fieldEmpty) {
        header("Location: http://localhost/malowa-hc/index.php?errors=true");
    }
    
    if (validEmail($_POST['email']) && validPassword($_POST['password'], $_POST['email'])) {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        header("Location: http://localhost/malowa-hc/dashboard/index.html.php");
    }else {
        header("Location: http://localhost/malowa-hc/index.php?errors=true");
    }