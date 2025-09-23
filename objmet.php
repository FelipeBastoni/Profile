
<?php


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


class Lnks {

    public $iddv;
    public $lnk_dv;
    public $lnk_descr;


    public function __construct($iddv, $lnk_dv, $lnk_descr){

        $this->iddv = $iddv;
        $this->lnk_dv = $lnk_dv;
        $this->lnk_descr = $lnk_descr;

    }

    public function mostra(){

        echo '  
            <a href="'.$this->lnk_dv.'" target="_blank">'.$this->lnk_descr.'</a>
            <br>
        ';

    }

}


function shownov($var){

    foreach(array_reverse($var) as $item){

        $item->novidades();

    }

}


function show($var){

    foreach($var as $item){

        $item->mostra(); 

    }

}


?>