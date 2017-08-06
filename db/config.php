<?php 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    $servername = "mysql.ayumik.com";
    $username = "ayumik";
    $password = "9br68i4Y08";
    $dbname = "ayumik";

    $conn = mysqli_connect($servername, $username, $password, $dbname);  
    global $conn;
        // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }