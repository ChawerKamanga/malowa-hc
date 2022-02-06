<?php
    include_once '../database/crud.php';

    if(delete($_POST['id'], 'visits')){
        header("Location: http://localhost/malowa-hc/visits/index.html.php?deleted=true");
    }else {
        die('Something went wrong');
    }