// const { exists } = require("grunt");

// const { data } = require("browserslist");

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

function modalRegUser(){
    $('#modalRegUser').modal('show');
}

function modalEditUser(a){

    var id = a;

    $.ajax({
        url: './includes/requestUsers.php',
        method: 'POST',
        data:{
            id: id
        },
        success: function(data){
            var data = JSON.parse(data);

            if (data.status) {
                document.querySelector('#id').value = data.data.id;
                document.querySelector('#nameUserEdit').value = data.data.nombres;
                document.querySelector('#userEdit').value = data.data.user;
                document.querySelector('#rolEditUser').value = data.data.rol;
                document.querySelector('#estadoEditUser').value = data.data.activo;

                $('#modalEditUser').modal('show');
            }else {
				swal('Atencion',data.msg,'error');
			}
        }

    })
}

function regUser(){
    var nombres = document.getElementById('nameUserReg').value;
    var usuario = document.getElementById('userReg').value;
    var password = document.getElementById('psswdRegUser').value;
    var rol = document.getElementById('rolRegUser').value;
    var activo = document.getElementById('estadoRegUser').value;

    $.ajax({
        url: './includes/regUsers.php',
        method: 'POST',
        data: {
            nombres: nombres, 
            usuario: usuario, 
            password: password, 
            rol: rol,
            activo: activo
        },
        success: function(data){
            $('#msjRegisterUser').html(data);
        }

    })
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

function regPoligonal(){
    var nombre = document.getElementById('namePoligonalReg').value;
    var comunidadID = document.getElementById('comunidad').value;

    if(nombre == '' || comunidadID == ''){

        swal({
            title: 'Datos',
           text: "Es necesario rellenar todos los datos.",
            type: 'warning',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
        });

    } else {
        $.ajax({
           url:'./includes/regPoligonal.php',
           method:'POST',
           data:{
            nombre:nombre,
            comunidadID:comunidadID
           },
           success:function(data){
            if(data == 'Registrado'){
                swal({
                    title: 'Registrado!',
                   text: "Los datos se registraron con exito.",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }if(data == 'Error'){
                swal({
                    title: 'Error!',
                   text: "Ocurrio un error al registrar los datos.",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }if(data == 'existe'){
                swal({
                    title: 'Alerta!',
                   text: "La poligonal que esta intentando registrar ya existe!",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }
           }
        })
    }

}

function valJefe(){
    var jefe = document.getElementById('cedulaJefe').value;
    console.log(jefe);

    if (jefe != '') {

        console.log('lleno');

        $.ajax({
            url: './includes/valJefe.php',
            method: 'POST',
            data:{
                jefe:jefe
            },
            success: function(data){
                if(data == 'VALIDO'){
                    document.getElementById('cedulaJefe').style.borderColor='green';
                }if(data == 'nulo'){
                    swal({
                        title: 'Alerta!',
                       text: "La cedula no coincide con ningun jefe de familia!",
                        type: 'error',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                }
            }
        })
    
    }

    
}

function regReward(){
    var jefeFamilia = document.getElementById('cedulaJefe').value;
    var fecha = document.getElementById('fechaEntrega').value;
    var beneficio_id = document.getElementById('beneficio_id').value;
    var referencia = document.getElementById('nroReferencia').value;

    if (jefeFamilia == '' || fecha == '' || beneficio_id == '' || referencia == '') {
        swal({
            title: 'Error!',
            text: "Por favor complete todos los campos",
            type: 'error',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
        });
        
    }else {

        if (jefeFamilia <= 0 || referencia <= 0) {
            swal({
                title: 'Error!',
                text: "Los campos numericos no deben ser negativos!",
                type: 'error',
                showCancelButton: false,
                confirmButtonText: 'OK',
                closeOnConfirm: false
            });
        }else {
            $.ajax({
                url: './includes/regReward.php',
                method: 'POST',
                data: {
                    jefeFamilia: jefeFamilia,
                    fecha: fecha,
                    beneficio_id: beneficio_id,
                    referencia: referencia
                },
                success: function(data){
                    if(data == 'ok'){
                        swal({
                            title: 'Exito!',
                            text: "La entrega se registro con exito!",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    } if(data == 'error') {
                        swal({
                            title: 'Error!',
                           text: "Ocurrio un error al registrar los datos.",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    }if(data == 'existe'){
                        swal({
                            title: 'Alerta!',
                           text: "La entrega que esta intentando registrar ya existe!",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    }
                }
        
        
            })
        }
    }
    
    
}