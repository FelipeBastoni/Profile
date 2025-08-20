
<?php

ini_set('display_errors', 0);  
ini_set('log_errors', 1);      
error_reporting(E_ALL);   

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");
    exit();

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO posts (TITULO_P, DESCRICAO, TITULO_T, TEXTO) VALUES ('{$_POST['titulo_p']}','{$_POST['descricao']}','{$_POST['titulo_t']}','{$_POST['texto']}')";



    $conn->query($sql);
    $conn->close();



}



?>



<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AltT</title>

    <link rel="stylesheet" href="destyle.css">
    <script src="jvsc.js"></script>

</head>


<body>


<div class="topo">


    <div class="itnslg">

    
        <div class="logodes">

            <span></span>
            <span></span>
            <span></span>
                

        </div>

    </div>



    <div class="itns" onclick="window.location.href='index.php'">
    
        <p>Voltar à Landing Page</p>


    </div>



    <div class="itns" onclick="modal()">

        <p>Entre em Contato</p>


    </div>





</div>




    <div class="contato" id="md" onclick="modal()">

        <div class="boxcntatc" onclick="event.stopPropagation()">

            <div class="fech" onclick="modal()">
                <p>X</p>
            </div>

            <br>

            <div class="txtcontato">

                <h2>Contacte-nos</h2>
    
                <br>
                <br>
                <br>
                <p>E-mail:</p>
                <br>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=felipebertaobastoni@gmail.com" target="_blank">felipebertaobastoni@gmail.com</a>
             
                <br>
                <br>
                <br>
                <p>Whatsapp:</p>
                <br>
                <a href="https://wa.me/5519991898099" target="_blank" rel="noopener noreferrer">(19) 99189-8099</a>

                <br>
                <br>
                <br>
                <p>Linkedin:</p>
                <br>
                <a href="https://www.linkedin.com/in/felipe-bert%C3%A3o-bastoni" target="_blank">Felipe Bertão Bastoni</a>
                <br>


            </div>


        </div>


    </div>
    


<div class="tela"> 

    <h2>Personalize a Landing Page</h2>

    <div class="con">



        <div class="alternov">


            <h3>Adicione Novidades:</h3>

            <br>
            <br>

            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>

                <p>Coloque o título do seletor:</p>
                <br>
                <input name='titulo_p'>

                <br>
                <br>

                <p>Coloque a descrição do seletor:</p>
                <br>
                <input name='descricao'>

                <br>
                <br>

                <p>Coloque o título da exibição:</p>
                <br>
                <input name='titulo_t'>

                <br>
                <br>

                <p>Coloque a descrição da exibição:</p>
                <br>
                <input name='texto'>

                <br>
                <br>

                <p>Coloque a imagem da exibição:</p>
                <br>

                <br>
                <br>        
                <br>        
                <br>
                <br>        

                <input type="submit">

            </form>



        </div>



        <div class="alterllinks">

            <h3>Ainda Falta implementar td</h3>


        </div>



        <div class="alteralgo">

            <h3>Ainda falta FAZER TUDO KKKKKKKK</h3>


        </div>


    </div>


</div>