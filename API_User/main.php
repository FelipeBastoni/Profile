
<?php

// arquivo para consultas 


header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

require 'objmet.php';

session_start();

$_SESSION = [];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * from posts";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()){

        $novidades[] = new Novidade($row['TITULO_P'], $row['DESCRICAO'], $row['TITULO_T'], $row['TEXTO'], $row['FOTO'], $row['EXTRA'], $row['NUMERO'], $row['ID']);    

    }

}else{

    $novidades[] = new Novidade("Novas Novidades em Breve","","","","","","","");    

}




$sql = "SELECT * from lnk_diverso";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $i = 0;

    while($row = $result->fetch_assoc()){

        $lnks[$i] = new Lnks($row['ID'], $row['link'], $row['descr']);    
        $i++;

    }

}else{

    $lnks[] = new Lnks("Novos em Breve","");    

}




$sql = "SELECT * from lnk_playlist";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $i = 0;

    while($row = $result->fetch_assoc()){

        $playlists[$i] = new Lnks($row['ID'], $row['playlist'], $row['descr']);    
        $i++;

    }

}else{

    $lnks[] = new Lnks("0"," ","novos em breve");    

}

$conn->close();




function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




$user = "";
$senha = "";
$eruser = "";
$ersenha = "";


if($_SERVER['REQUEST_METHOD'] == 'POST' ){


    if(empty($_POST['usr'])){

        $eruser = "Usuário inválido";


    }else{

        $user = test_input($_POST['usr']);  

    }

    if(empty($_POST['snh'])){

        $ersenha = "Senha Inválida";


    }else{

        $senha = test_input($_POST['snh']);

    }


    if(empty($eruser) && empty($ersenha)){


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT * from users WHERE NOME = '$user' AND SENHA = '$senha'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()){

                $_SESSION['ID'] = $row['ID'];

                header("location: des.php");
                exit();

            }

        }

        $conn->close();

    }


}


$expnov = shownov($novidades);
$explinksdv = show($lnks);
$explinks = show($playlists);


echo json_encode([
                    "nov" => $expnov,
                    "play" => $explinks,
                    "lnks" => $explinksdv,
                
                ]);


?>