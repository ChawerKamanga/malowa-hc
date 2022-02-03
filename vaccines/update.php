<?php
    include '../auth/auth.php';

    
    $fields = array($_POST['vaccinename'], $_POST['is_special']);

    $fieldEmpty = false;

    foreach ($fields as $field) {
        if (empty($field)) {
            $fieldEmpty = true;  
        }
    }

    if ($fieldEmpty) {
        header("Location: http://localhost/malowa-hc/vaccines/edit.html.php?empty=true");
    }

    if (update2('vaccine_name', 'is_special', $_POST['vaccinename'], $_POST['is_special'],$_POST['id'] ,'vaccines')) {
        header("Location: http://localhost/malowa-hc/vaccines/index.html.php?updated=true");
    }else {
        die('Something went wrong');
    }
