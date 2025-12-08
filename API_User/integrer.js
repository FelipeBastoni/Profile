


// API

const API_URL = "../API_User/main.php";

document.addEventListener("DOMContentLoaded", () => {
  loader();
});


async function loader(){

    const resp = await fetch(API_URL);
    const dados = await resp.json();

    all = '';
    dados.nov.forEach(item => {
    
        all += item;

    });

    document.getElementById("contselector").innerHTML = all;



    playlist = "";
    dados.play.forEach(ply => {

        playlist += ply;

    });

    document.getElementById("linksbx1").innerHTML = playlist;


    
    dvs = "";
    dados.lnks.forEach(link => {

        dvs += link;

    });

    document.getElementById("linksbx2").innerHTML = dvs;



}
   
