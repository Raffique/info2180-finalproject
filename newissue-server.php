<?php
session_start();
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

$input_title = filter_var($_POST["title"],FILTER_SANITIZE_STRING);
$input_desc = filter_var($_POST["desc"],FILTER_SANITIZE_STRING);
$input_assigned = filter_var($_POST["assgn"],FILTER_SANITIZE_EMAIL);
$input_type = filter_var($_POST["type"],FILTER_SANITIZE_STRING);
$input_priority = filter_var($_POST["priority"],FILTER_SANITIZE_STRING);



$user_id = $_SESSION['id'];
$date = date('Y-m-d H:i:s');
$insert = "INSERT INTO Issues(title, i_description, i_type, i_priority, i_status, assigned_to, created_by, created) 
values ('$input_title', '$input_desc', '$input_type', '$input_priority', 'OPEN', $input_assigned, $user_id, '$date')";
if ($conn->query($insert) === TRUE){
    echo 'Sucessful User Entry!';
    $conn->close();
}
else{
    echo $conn->error;
    $conn->close();
}

?>