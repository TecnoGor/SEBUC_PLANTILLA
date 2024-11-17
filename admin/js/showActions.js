function habitantes(){
    $.get('./templates/modules/habitantes.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML=mensaje;
        $(document).ready( function () {
            $('#tableHab').DataTable();
        } );

    })
}

function hPrincipal(){
    
    $.get('./templates/modules/habitantesP.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML=mensaje;

    })
}

function hOriental(){
    $.get('./templates/modules/habitantesO.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML=mensaje;

    })
}

function hFJavier(){
    $.get('./templates/modules/habitantesFJ.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML=mensaje;

    })
}

function hCarabobo(){
    
    $.get('./templates/modules/habitantesC.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML=mensaje;

    })
}


function rewards(){
    $.get('./templates/modules/rewards.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function rewardsEspecial(){
    $.get('./templates/modules/rewardsEspecial.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function bosses(){
    $.get('./templates/modules/bossFamily.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function handicapped(){
    $.get('./templates/modules/handicapped.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function users(){
    $.get('./templates/modules/users.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function poligonales(){
    $.get('./templates/modules/poligonales.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}

function listRewards(){
    $.get('./templates/modules/listRewards.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
    })
}