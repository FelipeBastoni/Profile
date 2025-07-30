function fff(){ window.location.href="https://github.com/FelipeBastoni"; }

function anim(){

    document.getElementById('lg').classList.toggle('ativo');
    document.getElementById('lg1').classList.toggle('ativo');

}

function modal(){

    const modal = document.getElementById('md');
    const mdativo = modal.style.display === 'block';
    modal.style.display = mdativo ? 'none' : 'block';

}


function alternarPainel() {

    document.getElementById("painel").classList.toggle("ativo");
    
}