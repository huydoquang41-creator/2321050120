<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $post = 3306;
    $database = "quanliphim";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_errno){
        die("Connect failed: " . $conn->connect_errno);
    }
    // echo "Connected successfully";
?>