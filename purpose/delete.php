<?php
include_once '../database/crud.php';

if(delete($_POST['id'], 'purpose')){
    header("Location: http://localhost/malowa-hc/purpose/index.html.php?deleted=true");
}else {
    die('Something went wrong');
}