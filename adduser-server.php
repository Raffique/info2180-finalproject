<?php

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

$input_fname = filter_var($_POST["fname"],FILTER_SANITIZE_STRING);
$input_lname = filter_var($_POST["lname"],FILTER_SANITIZE_STRING);
$input_email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
$input_password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);


$test = "SELECT email from Users";
$test_emails = $conn->query($test);

if ($test_emails->num_rows > 0) {
    while ($row = $test_emails->fetch_assoc()) {
        if($row['email'] == $input_email){
            die('Email already used!');
        }
    }
}



$date = date('Y-m-d H:i:s');
$insert = "INSERT INTO Users(firstname, lastname, u_password, email, date_joined, privilege) 
values ('$input_fname', '$input_lname', '$input_password', '$input_email', '$date','regular')";
if ($conn->query($insert) === TRUE){
    echo 'Sucessful User Entry!';
    $conn->close();
}
else{
    echo $conn->error;
    $conn->close();
}


?>