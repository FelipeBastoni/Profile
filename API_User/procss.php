
<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO posts (TITULO_P, DESCRICAO, TITULO_T, TEXTO, FOTO) VALUES ('{$_POST['titulo_p']}','{$_POST['descricao']}','{$_POST['titulo_t']}','{$_POST['texto']}','{$_POST['foto']}')";


    $conn->query($sql);
    $conn->close();

    header("location: des.php");
    exit();


}

?>