
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * from posts";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()){

        $novidades[] = new Novidade( $row['TEXTO'], $row['FOTO'], $row['EXTRA'], $row['NUMERO']);    

    }

}


class Novidade {

    public $txt;
    public $ft;
    public $extra;
    public $numero;


    public function __construct($txt, $ft, $extra, $numero){

        $this->txt = $txt;
        $this->ft = $ft;
        $this->extra = $extra;
        $this->numero = $numero;

    }


    public function novidades(){

        echo' 
                                        
        <div class="opt" onclick="action(\'' . $this->ft . '\', \''.$this->txt.'\')">

            <p>'.$this->extra.'
        
        </div>
        
        
        ';




    }

}






$conn->close();


?>
















<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tavern</title>

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



    <div class="itns">
    
        <p onclick="fff()">Perfil no Github</p>


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
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=felipebertaobastoni@gmail.com">felipebertaobastoni@gmail.com</a>
             
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

            <h2>Menu</h2>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>    
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <p>AltT Corp</p>


        </div>

    </div>



    <div class="cnt">

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

            <div class="bxcont" id="bxcont">




            </div>



        </div>

    </div>


    <div class=cnt2box>


            <div class="cnt1">

                <div class="bx1">

                    <h3>Links de coisas:</h3>
                    <br>
                    <br>
                    <a href="https://wplace.live/?lat=-22.19188065859941&lng=-46.751748378222665&zoom=12.838582002820917">Wplace Pinhal</a>

                </div>

            </div>


        <div class="cnt2">

            <div class="bx2">

                <h3>Links de playlists:</h3>

            </div>

        </div>


    </div>



    <div class="cnt3">

        <div class="bx3">

        <h3>D'daily Interection</h3>

        <h3>Album de Fotos</h3>


        </div>

    </div>


</div>





</body>

</html>
