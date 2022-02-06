<?php
    include '../auth/auth.php';

    
    $fields = array($_POST['purpose'], $_POST['purpose_desc']);

    $fieldEmpty = false;

    foreach ($fields as $field) {
        if (empty($field)) {
            $fieldEmpty = true;  
        }
    }

    if ($fieldEmpty) {
        header("Location: http://localhost/malowa-hc/purpose/edit.html.php?empty=true");
    }

    if (update2ssi('purpose', 'purpose_desc', $_POST['purpose'], $_POST['purpose_desc'], $_POST['id'] ,'purpose')) {
        header("Location: http://localhost/malowa-hc/purpose/index.html.php?updated=true");
    }else {
        die('Something went wrong');
    }
