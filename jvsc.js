function fff(){ window.location.href="https://github.com/FelipeBastoni"; }

function anim(){

    document.getElementById('lg').classList.toggle('ativo');
    document.getElementById('lg1').classList.toggle('ativo');

}

function modal(){

    const modal = document.getElementById('md');
    modal.classList.toggle('ativo');
  

}

function action(){

    fetch("content.php")
        .then(response => response.text())
        .then(data => { 
            
            document.getElementById('bxcont').innerHTML = data;

        });
        
}



function alternarPainel() {

    document.getElementById("painel").classList.toggle("ativo");
    
}


document.addEventListener("keydown", function(e) {
    if (e.altKey && e.key === "t") {
        alert("AltT !");
    }
});