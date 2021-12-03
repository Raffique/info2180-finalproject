<?php

session_start();
if(isset($_POST["email"])){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bugme';
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


    $input_email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $input_password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    
    $query = "SELECT * FROM users WHERE email='$input_email'";
    try{
        $statement = $conn->query($query)->fetch();
        $db_password = $statement["Userpassword"];
    }
    catch (PDOException $e){
        echo "Error! " . $e->getMessage() . "<br/>";
        die();
    }

    if(password_verify($input_password, $db_password)){
        $_SESSION['email'] = $input_email;
        if ($input_email == "admin@project2.com"){
            $_SESSION['usertype'] = "admin";
        }
        else{
            $_SESSION['usertype'] = "user";
        }
        header('Location: base.php',TRUE,302);
    }
    else{
        die("Error: Incorrect username or password");
    }
}
?>