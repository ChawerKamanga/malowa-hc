<?php
    include '../auth/auth.php';

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['date_of_birth'];
    $parent = $_POST['parent'];

    $fields = array($firstname, $lastname, $gender, $dateOfBirth, $parent);

    foreach ($fields as $field) {
        if (fieldEmpty($field)) {
            $fieldEmpty = true;  
        }
    }


    if ($fieldEmpty) {
        header("Location: http://localhost/malowa-hc/under-five-children/edit.html.php?empty=true");
    }

    if (update5('firstname', 'lastname', 'gender', 'date_of_birth', 'parent_id', $firstname, $lastname, $gender, $dateOfBirth, $parent, $id, 'under_five_children')) {
        header("Location: http://localhost/malowa-hc/dashboard/index.html.php?updated=true");
    }else {
        die('Something went wrong');
    }
