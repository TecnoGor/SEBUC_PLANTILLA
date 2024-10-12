function habitantes(){
    let enlace = document.getElementsByClassName("link_disabled");
    enlace.href = "javascript:void(0)"; // Evita que el navegador siga el enlace
    document.getElementById('titlePage').textContent="Habitantes";
    
    $.get('./templates/modules/habitantes.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('templates').innerHTML=mensaje;
        const newURL = "habitantes";
        history.pushState(null, "", newURL);

    })
}

function rewards(){
    $.get('./templates/modules/rewards.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function bosses(){
    $.get('./templates/modules/bossFamily.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function handicapped(){
    $.get('./templates/modules/handicapped.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function users(){
    $.get('./templates/modules/users.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function poligonales(){
    $.get('./templates/modules/poligonales.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}