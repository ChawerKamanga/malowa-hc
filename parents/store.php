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
    header("Location: http://localhost/malowa-hc/parents/create.html.php?empty=true");
}

if (save3('firstname', 'lastname',  'gender', $_POST['firstname'], $_POST['lastname'], $_POST['gender'], 'parents')) {
    header("Location: http://localhost/malowa-hc/parents/index.html.php?success=true");
}else {
    die('Something went wrong');
}