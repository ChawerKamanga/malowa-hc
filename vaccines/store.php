<?php
include '../auth/auth.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$dateOfBirth = $_POST['date_of_birth'];
$parentId = $_POST['parent'];

$fields = array($firstname, $lastname, $gender, $dateOfBirth, $parentId);

$fieldEmpty = false; 

foreach ($fields as $field) {
    if (empty($field)) {
        $fieldEmpty = true;  
    }
}

if ($fieldEmpty) {
    header("Location: http://localhost/malowa-hc/under-five-children/create.html.php?empty=true");
}

if(save5('firstname', 'lastname', 'gender', 'date_of_birth', 'parent_id',
 $firstname, $lastname, $gender, $dateOfBirth, $parentId, 
 'under_five_children')){
    header("Location: http://localhost/malowa-hc/dashboard/index.html.php?success=true");
}else {
    die('Something went wrong');
}