// const { exists } = require("grunt");

function modalEditHabitante(a){
    
    var idHabitante = a;

    $.ajax({
		url: './includes/requestHabitantes.php',
		method: 'POST',
		data: {
			id: idHabitante
		},
		success: function(data){
			
			var data = JSON.parse(data);

			if(data.status){
				document.querySelector('#id').value = data.data.id;
				document.querySelector('#nameHabitanteEdit').value = data.data.nombres;
                document.querySelector('#name2HabitanteEdit').value = data.data.apellidos;
				document.querySelector('#cedulaHabitanteEdit').value = data.data.cedula;
				document.querySelector('#edoCivilEdit').value = data.data.id_edoCivil;
                document.querySelector('#dateHabitanteEdit').value = data.data.fecha_nacimiento;
                document.querySelector('#telefonoEdit').value = data.data.telefono;
                document.querySelector('#tipoHabitanteEdit').value = data.data.id_tipoHabitante;
                document.querySelector('#poligonal_idEdit').value = data.data.id_poligonal;
                if (document.querySelector('#inputJefe')) {
                    const inputJefe = document.getElementById('inputJefe');
                    inputJefe.remove();
                }
                if (data.data.id_tipoHabitante == 1) {
                    if (document.querySelector('#inputJefe')) {
                        const inputJefe = document.getElementById('inputJefe');
                        inputJefe.remove();
                    }
                }
                if (data.data.id_tipoHabitante == 2) {
                    var containerForm = document.getElementById('divSelectHabitanteEdit');
                    const divHabField = document.createElement("div");
                    divHabField.className = "mb-3 col-md-4";
                    divHabField.id = "inputJefe";

                    const labelHabField = document.createElement("label");
                    labelHabField.className = "form-label";
                    labelHabField.textContent = "Ingrese la cedula de su Jefe de Familia";
                    const inputHabField = document.createElement("input");
                    inputHabField.type = "number";
                    inputHabField.name = "idJefeEdit"
                    inputHabField.className = "form-control";
                    inputHabField.id = "idJefeEdit";

                    containerForm.appendChild(divHabField);
                    divHabField.appendChild(labelHabField);
                    divHabField.appendChild(inputHabField);
                }

				$('#modalEditHabitante').modal('show');

			}else {
				swal('Atencion',data.msg,'error');
			}
		}
	})
}

function editHabitante() {
    var id = document.getElementById('id').value;
    var nombre = document.getElementById('nameHabitanteEdit').value;
    var apellido = document.getElementById('name2HabitanteEdit').value;
    var nacionalidad = document.getElementById('nacionalidadHabitanteEdit').value;
    var cedula = document.getElementById('cedulaHabitanteEdit').value;
    var fechaNac = document.getElementById('dateHabitanteEdit').value;
    var telefono = document.getElementById('telefonoEdit').value;
    var edoCivil = document.getElementById('edoCivilEdit').value;
    const discapacidadRadio = $("input[name='discapacidadEdit']:checked").val();
    console.log(discapacidadRadio);
    if(document.querySelector('#discapacidadEdit')){
        var discapacidadInput = $('#discapacidadEdit').val();
    }
    var discapacidad = null;
    const pensionado = $("input[name='radioHabitanteEdit2']:checked").val();
    // var pensionado = document.getElementById('radioHabitanteEdit2').value;
    var tipoHabitante = document.getElementById('tipoHabitanteEdit').value;
    var poligonal = document.getElementById('poligonal_idEdit').value;
    if (document.querySelector('#idJefeEdit')) {
        var jefeFamilia = document.getElementById('idJefeEdit').value;
    }
   
    if(discapacidadRadio == undefined){
        discapacidad = discapacidadInput;
    } else {
        discapacidad = discapacidadRadio;
    }

    $.ajax({
        url: './includes/editHabitantes.php',
        method: 'POST',
        data: {
            id:id,
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
            $('#msjEdit').html(data);
        }
    })
}

$('#discapacidadEdit1').click(function(){
    var valueRadio = document.getElementById('discapacidadEdit1').value;
    console.log(valueRadio);
    if(valueRadio == 'Si'){
        // var contenedor = document.getElementById('contenedorDiscapacidad');
        var rowContenedor = document.getElementById('rowContainerEdit');
        const radios = document.getElementById('radioDiscapacidadEdit');

        const divField = document.createElement("div");
        divField.className = "mb-3 col-md-4";

        const labelField = document.createElement("label");
        labelField.className = "form-label";
        labelField.textContent = "Especifique Discapacidad"

        const inputField = document.createElement("input");
        inputField.type = "text";
        inputField.id = "discapacidadEdit";
        inputField.name = "discapacidadEdit";
        inputField.className = "form-control";
        inputField.placeholder = "Especifique su discapacidad";

        rowContenedor.appendChild(divField);
        divField.appendChild(labelField);
        divField.appendChild(inputField);        
        radios.remove();
    }
    if (valueRadio == 'No') {
        var contenedor = document.getElementById('contenedorDiscapacidad');
        radios.style = "display:flex";

    } 
})

function jefeFamiliaEdit(){
    var tipoHabitante = document.getElementById('tipoHabitanteEdit').value;
    var containerForm = document.getElementById('divSelectHabitanteEdit');
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
        inputHabField.name = "idJefeEdit"
        inputHabField.className = "form-control";
        inputHabField.id = "idJefeEdit";

        containerForm.appendChild(divHabField);
        divHabField.appendChild(labelHabField);
        divHabField.appendChild(inputHabField);

    }
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

$('#discapacidad').click(function(){
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
        inputField.id = "discapacidadInput";
        inputField.name = "discapacidadInput";
        inputField.className = "form-control";
        inputField.placeholder = "Especifique su discapacidad";

        rowContenedor.appendChild(divField);
        divField.appendChild(labelField);
        divField.appendChild(inputField);        
        radios.style= "display: none";
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
    if (document.querySelector('#discapacidadInput')) {
        var discapacidad = document.getElementById('discapacidadInput').value;
    }else {
        var discapacidad = document.getElementById('discapacidad').value;
    }
    
    var pensionado = document.getElementById('radioHabitanteReg2').value;
    var tipoHabitante = document.getElementById('tipoHabitanteReg').value;
    var poligonal = document.getElementById('poligonal_id').value;
    if (document.querySelector('#idJefe')) {
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