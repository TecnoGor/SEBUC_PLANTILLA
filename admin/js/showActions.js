const { callback } = require("chart.js/helpers");

function preparePDFH() {
    var tabla = document.getElementById('tableHab');

    html2pdf(tabla, {
        margin: 0.1,
        filename: 'Habitantes.pdf',
        html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    });
}


function habitantes(){
    $.get('./templates/modules/habitantes.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML=mensaje;
        $(document).ready( function () {
            $('#tableHab').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
            
        } );

    })
}



function hPrincipal(){
    
    $.get('./templates/modules/habitantesP.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('containTableToPrint').innerHTML=mensaje;
        $(document).ready( function () {
            $('#tableHabP').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
            
        } );
    })
}

function hOriental(){
    $.get('./templates/modules/habitantesO.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('containTableToPrint').innerHTML=mensaje;
        $(document).ready( function () {
            $('#tableHabO').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
            
        } );
    })
}

function hFJavier(){
    $.get('./templates/modules/habitantesFJ.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('containTableToPrint').innerHTML=mensaje;
        $(document).ready( function () {
            $('#tableHabFJ').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
            
        } );
    })
}

function hCarabobo(){
    
    $.get('./templates/modules/habitantesC.php', function(mensaje, estado){
        
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('containTableToPrint').innerHTML=mensaje;
        $(document).ready( function () {
            $('#tableHabC').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
            
        } );
    })
}


function rewards(){
    $.get('./templates/modules/rewards.php', function(mensaje, estado){

        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
        $(document).ready( function () {
            $('#tableEntregas').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
        });

    })
}

function rewardsEspecial(){
    $.get('./templates/modules/rewardsEspecial.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
        $(document).ready( function () {
            $('#tableEntregasEspecial').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
        });
    })
}

function bosses(){
    $.get('./templates/modules/bossFamily.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('containTableToPrint').innerHTML = mensaje;
        $(document).ready( function () {
            $('#tableBosses').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
        });
    })
}

function handicapped(){
    $.get('./templates/modules/handicapped.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('containTableToPrint').innerHTML = mensaje;
        $(document).ready( function () {
            $('#tableHandicapped').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
        });
    })
}

function users(){
    $.get('./templates/modules/users.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
        $(document).ready( function () {
            $('#tableUsers').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
        });
    })
}

function poligonales(){
    $.get('./templates/modules/poligonales.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
        $(document).ready( function () {
            $('#tablePoligonales').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
        });
    })
}

function listRewards(){
    $.get('./templates/modules/listRewards.php', function(mensaje, estado){
        document.getElementById('homeInfo').style = 'display: none';
        document.getElementById('tilesResponsive').style = 'display: none';
        document.getElementById('templates').innerHTML = mensaje;
        $(document).ready( function () {
            $('#tableBeneficios').DataTable({
                "language": {
                    "url": "./js/langDT.json"
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100]
            });
        });
    })
}

function cartResidence() {
    $('#modalResidence').modal('show');
}