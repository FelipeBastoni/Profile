
let v = -1;



function fff(){ window.open("https://github.com/FelipeBastoni", "_blank"); }

function rep(){ window.open("https://github.com/FelipeBastoni/Profile", "_blank"); }


function anim(){

    document.getElementById('lg').classList.toggle('ativo');
    document.getElementById('lg1').classList.toggle('ativo');

}

function modal(){

    const modal = document.getElementById('md');
    modal.classList.toggle('ativo');
  

}

function action(w,x,y,z){


    const conta = document.getElementById('bxcont');


    if (v == w){

        conta.innerHTML = "";

        v = -1;

    }else{


        conta.innerHTML = "";

        const diiv = document.createElement('div');

        const title = document.createElement('h2');
        title.innerText = z;

        const br = document.createElement('br');

        const txt = document.createElement('p');
        txt.innerText = y;

        const imag = document.createElement('img');
        imag.src = x;
        imag.style.height = "100%";
        imag.style.width = "100%";

        const dev = document.createElement('div');
        dev.classList = "contnovidade";



        conta.appendChild(diiv);

        diiv.appendChild(title);
        diiv.appendChild(br);
        diiv.appendChild(txt);


        conta.appendChild(dev);
        dev.appendChild(imag);
        
        
        conta.classList.add("ativo");

        v = w;


    }


        
}




function alternarPainel() {

    document.getElementById("painel").classList.toggle("ativo");
    
}


document.addEventListener("keydown", function(e) {
    if (e.altKey && e.key === "t") {
        alert("AltT !");
    }
});



function tp(){

    const tel = document.getElementById('corp');

    if (tel.classList.contains('atv')){

        document.getElementById('corp').classList.toggle('atv');

    }
    
    document.getElementById('Nvd').scrollIntoView({ behavior: 'smooth' });


}



function qms(){
    
    const tel = document.getElementById('corp');

    if (tel.classList.contains('atv')){

        document.getElementById('corp').classList.toggle('atv');

    }

    document.getElementById('Qm').scrollIntoView({ behavior: 'smooth' });

    
}



function dev(){

    document.getElementById('corp').classList.toggle('atv');


}


function modalinfo(n){

    textos = ["Olá","Estou","E"];
    displays = ["Tudo","Bem","Com"];
    bottoms = ["Bom?","Sim!","Vc?"];

    document.getElementById('info').classList.toggle('atvinf'); 

    
    document.getElementById('infotxt').innerText= textos[n];
    document.getElementById('infodisplay').innerText=displays[n];
    document.getElementById('infobottom').innerText=bottoms[n];


}
   
