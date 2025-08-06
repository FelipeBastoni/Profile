function fff(){ window.location.href="https://github.com/FelipeBastoni"; }

function anim(){

    document.getElementById('lg').classList.toggle('ativo');
    document.getElementById('lg1').classList.toggle('ativo');

}

function modal(){

    const modal = document.getElementById('md');
    modal.classList.toggle('ativo');
  

}

function action(x,y){

    
    const conta = document.getElementById('bxcont');

    conta.innerHTML = y;

    const imag = document.createElement('img');
    imag.src = x;
    imag.style.height = "100%";
    imag.style.width = "100%";

    const dev = document.createElement('div');
    dev.classList = "contnovidade";

    conta.appendChild(dev);
    dev.appendChild(imag)
    conta.classList.add("ativo");

    }


        





function alternarPainel() {

    document.getElementById("painel").classList.toggle("ativo");
    
}


document.addEventListener("keydown", function(e) {
    if (e.altKey && e.key === "t") {
        alert("AltT !");
    }
});