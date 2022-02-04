<?php
include '../auth/auth.php';
include_once '../database/crud.php';


$fields = array($_POST['child_id'], $_POST['vaccine_id'], $_POST['date_of_visit']);

$fieldEmpty = false; 

foreach ($fields as $field) {
    if (empty($field)) {
        $fieldEmpty = true;  
    }
}

$child = get1($_POST['child_id'], 'under_five_chidren');
$vaccine = get1($_POST['vaccine_id'], 'vaccines');

if ($fieldEmpty) {
    header("Location: http://localhost/malowa-hc/visits/create.html.php?empty=true");
}

if(saveiis('child_id', 'vaccine_id', 'date_of_visit', $_POST['child_id'], $_POST['vaccine_id'], $_POST['date_of_visit'], 
 'visits')){
    header("Location: http://localhost/malowa-hc/visits/index.html.php?success=true");
}else {
    die('Something went wrong');
}