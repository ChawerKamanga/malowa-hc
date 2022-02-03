<?php
    include '../auth/auth.php';

    
    $fields = array($_POST['firstname'], $_POST['lastname'], $_POST['gender']);

    $fieldEmpty = false;

    foreach ($fields as $field) {
        if (empty($field)) {
            $fieldEmpty = true;  
        }
    }

    if ($fieldEmpty) {
        header("Location: http://localhost/malowa-hc/parents/edit.html.php?empty=true");
    }

    if (update3('firstname', 'lastname',  'gender', $_POST['firstname'], $_POST['lastname'], $_POST['gender'],$_POST['id'] ,'parents')) {
        header("Location: http://localhost/malowa-hc/parents/index.html.php?updated=true");
    }else {
        die('Something went wrong');
    }
