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
    header("Location: http://localhost/malowa-hc/purpose/create.html.php?empty=true");
}

if (save2('purpose', 'purpose_desc', $_POST['purpose'], $_POST['purpose_desc'],'purpose')) {
    header("Location: http://localhost/malowa-hc/purpose/index.html.php?success=true");
}else {
    die('Something went wrong');
}