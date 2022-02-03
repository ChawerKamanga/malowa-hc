<?php
include_once '../database/crud.php';

if(delete($_POST['id'], 'vaccines')){
    header("Location: http://localhost/malowa-hc/vaccines/index.html.php?deleted=true");
}else {
    die('Something went wrong');
}