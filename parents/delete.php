<?php
include_once '../database/crud.php';

if(delete($_POST['id'], 'parents')){
    header("Location: http://localhost/malowa-hc/parents/index.html.php?deleted=true");
}else {
    die('Something went wrong');
}