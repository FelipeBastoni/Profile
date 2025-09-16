
<?php

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





?>





<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AltT</title>

    <link rel="stylesheet" href="pers.css">
    <script src="jvsc.js"></script>

</head>


<body>


<div class="topo">


    <div class="itnslg" id="lg1" onclick="anim(), alternarPainel()">

    
        <div class="logo" id="lg">

            <span></span>
            <span></span>
            <span></span>

        </div>

    </div>



    <div class="itns" onclick="fff()">
    
        <p>Perfil no Github</p>

    </div>



    <div class="itns" onclick="modal()">

        <p>Entre em Contato</p>

    </div>



</div>


    <div class="devi" id="corp">

        <div class="log">

            <h3>Faça o log in:</h3>
                <br>
                <br>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                <input placeholder="Usuario" name="usr">
                <br>
                <input type="password" name="snh" placeholder="Senha">
                <br>
                <br>

                <input type="submit" class="btnlog">

            </form>

                <br>
                <br>
                <br>
                <br>

                <button class="btn" onclick="dev()">Voltar à Pagina Inicial</button>


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
    



<div class="corp">


    <div class="painel" id="painel">

        <div class="paineltxt">

            <h2 onclick="anim(), alternarPainel(), tp()">Menu</h2>
            
            <br>
            <br>            
            <p onclick="anim(), alternarPainel(), tp()">Novidades</p>
            <p onclick="anim(), alternarPainel(), qms()">Quem Somos</p>
            <p onclick="modal()">Nos Contate</p> 
            <br>
            <br> 
            <p onclick="dev(), anim(), alternarPainel()">Acesso do Desenvolvedor</p>
            <p onclick="rep()">Repositório do Modelo</p>




            
            
            <p class="rz">AltT ltda</p>


        </div>

    </div>



    <div class="cnt" id="Nvd">

        <div class="bx">

            <h3>Novidades:</h3>

                <div class="cntbxcont" id="contselector">


                    <?php    
                    
                        shownov($novidades);

                    ?>


                </div>

            <div class="bxcont" id="bxcont"></div>
            
        </div>

    </div>


    <div class="cnt2box">

            <div class="cnt1">

                <div class="bx1">

                    <h3>Links de playlists:</h3>

                    <div class="linksbx1">

                    
                        <?php
                    
                            show($playlists);

                        ?>
                    

                    </div>

                </div>

            </div>


        <div class="cnt2">

            <div class="bx2">

                <h3>Links de coisas:</h3>

                <div class="linksbx2">
                

                    <?php

                        show($lnks);

                    ?>
                    
                
                </div>

            </div>

        </div>


    </div>



    <div class="cnt3">

        <div class="bx3">

            <h3 id="Fts" class="ttfts">Álbum de Fotos</h3>


                <div class="contfts">
                


                    <div class="ft">

                        <p>ft1</p>

                    </div>


                    <div class="ft">

                        <p>ft2</p>

                    </div>


                    <div class="ft">

                        <p>ft3</p>

                    </div>




                </div>

        </div>

    </div>

    
    <div class="fm">

        <div class="infos"></div>

        <div class="qm">

            <h3 id="Qm">Quem Somos</h3>
                    
            <p>Somos uma Start-up atualmente focada em criar aplicações web e sistemas de gestão, pretendemos também abrangir áreas como automação e implantação de dispositivos Iot's, visamos sempre entregar um serviço de qualidade, bons resultados, otimas melhorias e satisfação a nossos clientes, conte conosco para o seu negócio ou necessidade!</p>

            <p>Nossa equipe é composta por...</p>

            <p>Estamos localizados em...</p>

            <p>Entre em contato conosco para um possível orçamento ou negociação</p>

            <p onclick="modal()" class="contt">Entrar em contato</p>

        </div>

    </div>



</div>


</body>

</html>
