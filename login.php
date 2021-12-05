<?php

session_start();
if(isset($_POST["email"])){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bugme';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    $input_email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $input_password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    

    $query = "SELECT * FROM Users WHERE email = '$input_email'";
    $results = $conn->query($query);
    $row = $results->fetch_assoc();
    $db_password = $row["u_password"];

    //if(password_verify($input_password, $db_password)){
    if($input_password== $db_password){

        $_SESSION['privilege'] = $row['privilege'];
        $_SESSION['id'] = $row['id'];
        //header('Location: base.php',TRUE,302);
        echo json_encode( include 'base.php');
        $conn->close();

    }
    else{
        $conn->close();
        die("Error: Incorrect username or password");
    }
}
?>