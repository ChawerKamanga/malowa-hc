<?php
    $servername = "127.0.0.1";
    $username = "chawer";
    $password = "H3llo@Database";
    $dbname = "malowa_health_center";
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    