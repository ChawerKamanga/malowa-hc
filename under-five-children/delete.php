<?php
include_once '../database/crud.php';

$id = $_POST['id'];


if(delete($id, 'under_five_children')){
    header("Location: http://localhost/malowa-hc/dashboard/index.html.php?deleted=true");
}else {
    die('Something went wrong');
}