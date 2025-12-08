
<?php

session_start();


ini_set('display_errors', 0);  
ini_set('log_errors', 1);      
error_reporting(E_ALL);   



    if (!isset($_SESSION['ID'])){

        header("Location: index.php");
        exit();

    }

?>
