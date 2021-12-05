<?php

session_start();
if(isset($_POST["email"])){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bugme';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    }
    catch (Exception $e){
        die($e->getMessage());
    }


    $input_email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $input_password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    

    $query = "SELECT * FROM Users WHERE email = '$input_email'";
    try{
        $statement = $conn->query($query);
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        $db_password = $results["u_password"];

  }
    catch (PDOException $e){
        echo "Error! " . $e->getMessage() . "<br/>";
        die();
    } 

    //if(password_verify($input_password, $db_password)){
    if($input_password== $db_password){

        $_SESSION['privilege'] = $results['privilege'];
        $_SESSION['id'] = $results['id'];
        //header('Location: base.php',TRUE,302);
        echo json_encode( include 'base.php');

    }
    else{
        die("Error: Incorrect username or password");
    }
}
?>