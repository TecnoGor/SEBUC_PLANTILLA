const { exists } = require("grunt");

function modalEditHabitante(){
    $('#modalEditHabitante').modal('show');
}

function modalRegHabitante(){
    $('#modalRegHabitante').modal('show');
}


function jefeFamilia(){
    var tipoHabitante = document.getElementById('tipoHabitanteReg').value;
    var containerForm = document.getElementById('divSelectHabitante');
    console.log(tipoHabitante);
    if(tipoHabitante == 2){
        // const divRowField = document.createElement("div");
        // divRowField.className = "row";
        const divHabField = document.createElement("div");
        divHabField.className = "mb-3 col-md-4";
        const labelHabField = document.createElement("label");
        labelHabField.className = "form-label";
        labelHabField.textContent = "Ingrese la cedula de su Jefe de Familia";
        const inputHabField = document.createElement("input");
        inputHabField.type = "number";
        inputHabField.name = "idJefe"
        inputHabField.className = "form-control";
        inputHabField.id = "idJefe";

        containerForm.appendChild(divHabField);
        divHabField.appendChild(labelHabField);
        divHabField.appendChild(inputHabField);

    }
}

$('#radioHabitanteReg').click(function(){
    var valueRadio = document.getElementById('discapacidad').value;
    console.log(valueRadio);
    if(valueRadio == 'Si'){
        var contenedor = document.getElementById('contenedorDiscapacidad');
        var rowContenedor = document.getElementById('rowContainer');
        var radios = document.getElementById('radioDiscapacidad');

        const divField = document.createElement("div");
        divField.className = "mb-3 col-md-4";

        const labelField = document.createElement("label");
        labelField.className = "form-label";
        labelField.textContent = "Especifique Discapacidad"

        const inputField = document.createElement("input");
        inputField.type = "text";
        inputField.id = "discapacidad";
        inputField.name = "discapacidad";
        inputField.className = "form-control";
        inputField.placeholder = "Especifique su discapacidad";

        rowContenedor.appendChild(divField);
        divField.appendChild(labelField);
        divField.appendChild(inputField);        
        radios.style= "display: none";
    }
    if (valueRadio == 'No') {
        var contenedor = document.getElementById('contenedorDiscapacidad');
        contenedor.style = "display:none";
    } 
})

function regHabitante(){
    var nombre = document.getElementById('nameHabitanteReg').value;
    var apellido = document.getElementById('name2HabitanteReg').value;
    var nacionalidad = document.getElementById('nacionalidadHabitanteReg').value;
    var cedula = document.getElementById('cedulaHabitanteReg').value;
    var fechaNac = document.getElementById('dateHabitanteReg').value;
    var telefono = document.getElementById('telHabitanteReg').value;
    var edoCivil = document.getElementById('edoCivilReg').value;
    var discapacidad = document.getElementById('discapacidad').value;
    var pensionado = document.getElementById('radioHabitanteReg2').value;
    var tipoHabitante = document.getElementById('tipoHabitanteReg').value;
    var poligonal = document.getElementById('poligonal_id').value;
    if (exists(document.getElementById('idJefe'))) {
        var jefeFamilia = document.getElementById('idJefe').value;
    }
   


    $.ajax({
        url: './includes/regHabitantes.php',
        method: 'POST',
        data: {
            nombre:nombre,
            apellido:apellido,
            nacionalidad:nacionalidad,
            cedula:cedula,
            fechaNac:fechaNac,
            telefono:telefono,
            edoCivil:edoCivil,
            discapacidad:discapacidad,
            pensionado:pensionado,
            tipoHabitante:tipoHabitante,
            poligonal:poligonal,
            jefeFamilia:jefeFamilia
        },
        success: function(data){
            $('#msjRegister').html(data);
        }
    })

}