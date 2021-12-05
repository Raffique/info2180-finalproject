<?php

$input_fname = filter_var($_POST["fname"],FILTER_SANITIZE_STRING);
$input_lname = filter_var($_POST["lanme"],FILTER_SANITIZE_STRING);
$input_email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
$input_password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);

$insert = "INSERT INTO Users(firstname, lastname, u_password, email, date_joined, privilege) VALUES(:firstname, :lastname, :u_password, :email, :date_joined, :privilege)";
$insert->bindParam(':firstname', $input_fname);
$insert->bindParam(':lastname', $input_lname);
$insert->bindParam(':u_password',$input_password);
$insert->bindParam(':email', $input_email);
$insert->bindParam(':date_joined', date('Y-m-d H:i:s'));
$insert->bindParam(':privilege', 'regular');

?>