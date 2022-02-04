<?php
    include_once '../database/crud.php';

    $id = $_POST['id'];


    if(delete($id, 'visits')){
        header("Location: http://localhost/malowa-hc/visits/index.html.php?deleted=true");
    }else {
        die('Something went wrong');
    }