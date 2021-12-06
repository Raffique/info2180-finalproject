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

    $status = $_POST['status'];
    $date = date('Y-m-d H:i:s');
    $issue_id_string = strval($_SESSION['issue-id']);

    $query = "UPDATE Issues SET i_status='$status', updated='$date' WHERE i_id=$issue_id_string";

    if ($conn->query($query) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

?>