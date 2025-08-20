
<?php

session_start();


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

}

$conn->close();



class Novidade {

    public $titulo_p;
    public $descricao;
    public $titulo_t;
    public $txt;
    public $ft;
    public $extra;
    public $numero;
    public $id;


    public function __construct($titulo_p, $descricao, $titulo_t, $txt, $ft, $extra, $numero, $id){

        $this->titulo_p = $titulo_p;
        $this->descricao = $descricao;
        $this->titulo_t = $titulo_t;
        $this->txt = $txt;
        $this->ft = $ft;
        $this->extra = $extra;
        $this->numero = $numero;
        $this->id = $id;


    }


    public function novidades(){

        echo' 
                                        
        <div class="opt" onclick="action(\'' . $this->id . '\',\'' . $this->ft . '\', \''.$this->txt.'\',  \''.$this->titulo_t.'\')">

            <h2>'.$this->titulo_p.'</h2>
            <p>'.$this->descricao.'</p>

        </div>
        
        
        ';




    }

}



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

                header("location: index.php");

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

            <form action="des.php" method="POST">

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
                    
                        global $novidades;

                        $nt = count($novidades);
                    
                        $n = 0;


                        while($n<$nt){

                            
                            $novidades[$n]->novidades();

 
                            $n++;

                        }
                    
                    
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

                        <a href="https://www.youtube.com/watch?v=Lc1Ll-euRSg&list=PLLkVMiSEs5fslGjVlOkkK4j7qfOg8Ode3" target="_blank">Men At Work</a>
                
                        <a href="https://www.youtube.com/watch?v=JRDgihVDEko&list=PLRVgFSDAD4puuuJ_PY1lV8Jbr4QbYTKEg" target="_blank">Dire Straits</a>
                
                        <a href="https://www.youtube.com/watch?v=ddzsgetrQyw&list=PLfqlpuz-LWL28EHinbSqNhj2nFZS-WQ-I" target="_blank">Metallica</a>

                        <a href="https://www.youtube.com/watch?v=5_hIojjA3A4&list=PL93rs4Zu5DVhR54v_4bhbq7pbRENQ7Ql9" target="_blank">Korn</a>

                        <a href="https://www.youtube.com/watch?v=kXYiU_JCYtU&list=PL9LkJszkF_Z6bJ82689htd2wch-HVbzCO" target="_blank">Linkin Park</a>
                
                        <a href="https://www.youtube.com/watch?v=hTWKbfoikeg&list=PLF1D793B61571DD4A" target="_blank">Nirvana</a>
                
                        <a href="https://www.youtube.com/watch?v=uAE6Il6OTcs&list=PLA27AEEF9709E8016" target="_blank">Alice In Chains</a>
                
                        <a href="https://www.youtube.com/watch?v=K8z8hLvjb_U&list=PLtfJT7Fg2lKXLksdwqftx0ZaQ2ilxWpEr" target="_blank">Radiohead</a>
                
                        <a href="https://www.youtube.com/watch?v=oVctwNqAUrs&list=PLPNKnwlz-OnZlnghYSZfudlnLGE6ww3nf" target="_blank">Mac DeMarco</a>
                    
                        <a href="https://www.youtube.com/watch?v=T_OWvLDIyno&list=PLgF5KLwzxU-1C0_hXVdeOUKP-UBx8_xvY" target="_blank">Kendrick Lamar</a>


                    </div>

                </div>

            </div>


        <div class="cnt2">

            <div class="bx2">

                <h3>Links de coisas:</h3>

                <div class="linksbx2">
                  
                    <a href="https://wplace.live/?lat=-22.19188065859941&lng=-46.751748378222665&zoom=12.838582002820917" target="_blank">Wplace Pinhal</a>
                    
                    <a href="https://convertio.co/pt/" target="_blank">Conversor de Arquivos</a>
                    
                    <a href="https://www.decolar.com/" target="_blank">Site da Decolar</a>
                    
                    <a href="https://theuselessweb.com/" target="_blank">Surpreenda-se</a>
                    
                    <a href="https://www.w3schools.com/" target="_blank">W3schools</a>
                
                </div>

            </div>

        </div>


    </div>



    <div class="cnt3">

        <div class="bx3">

        <h3 id="Fts" >Álbum de Fotos</h3>


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

<script>

console.log(<?php echo $_SESSION['ID'];  ?>)

</script>



</body>

</html>
