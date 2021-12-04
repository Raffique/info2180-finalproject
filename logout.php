<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['usertype']);
session_destroy();
header('Location: index.php',TRUE,302);
}
?>

