<?php
    session_start();
    session_regenerate_id();
    if (isset($_SESSION['email']))      
    {
        header("Location: http://localhost/malowa-hc/dashboard/index.html.php");
    }