// const { exists } = require("grunt");

const { data } = require("browserslist");
const { url } = require("inspector");

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
                document.querySelector('#parentezcoEdit').value = data.data.id_parentezco;
                var id_jefe = document.querySelector('#idJefeEdit');
                var parentezco = document.querySelector('#parentezcoEdit');
                // if (document.querySelector('#inputJefe')) {
                //     const inputJefe = document.getElementById('inputJefe');
                //     inputJefe.remove();
                // }
                if (data.data.id_tipoHabitante == 1) {
                    
                    id_jefe.value = "";
                    id_jefe.disabled = true;
                    parentezco.disabled = true;
                }
                if (data.data.id_tipoHabitante == 2) {
                    id_jefe.removeAttribute('disabled');
                    parentezco.removeAttribute('disabled');
                }

				$('#modalEditHabitante').modal('show');

			}else {
				swal({
                    title: '¡Error!',
                    text: "Ocurrio un error al intentar editar los datos.",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
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
    var parentezco = document.getElementById('parentezcoEdit').value;
    // const discapacidadRadio = $("input[name='discapacidadEdit']:checked").val();
    // console.log(discapacidadRadio);
    var genero = $("input[name='generoHabitanteEdit']:checked").val();
    if(document.querySelector('#discapacidadEdit')){
        var discapacidadInput = $('#discapacidadEdit').val();
    }
    var discapacidad = document.getElementById('discapacidadEdit').value;
    const pensionado = $("input[name='radioHabitanteEdit2']:checked").val();
    // var pensionado = document.getElementById('radioHabitanteEdit2').value;
    var tipoHabitante = document.getElementById('tipoHabitanteEdit').value;
    var poligonal = document.getElementById('poligonal_idEdit').value;
    if (document.querySelector('#idJefeEdit')) {
        var jefeFamilia = document.getElementById('idJefeEdit').value;
    }

    $.ajax({
        url: './includes/editHabitantes.php',
        method: 'POST',
        data: {
            id:id,
            nombre:nombre,
            apellido:apellido,
            nacionalidad:nacionalidad,
            parentezco: parentezco,
            genero:genero,
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
            $('#msjEdit').html=data;
            if (data == 'ok') {
                swal({
                    title: 'Editado!',
                    text: "¡Los datos se editaron con éxito.",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
                habitantes();
            } if (data == 'cedula') {
                swal({
                    title: '¡Alerta!',
                    text: "¡Asegurese de haber ingresado la cedula del jefe de familia correctamente!",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'Ok.',
                    closeOnConfirm: false
                });
                document.getElementById('idJefeEdit').value = '';
            }if (data == 'error') {
                swal({
                    title: '¡Error!',
                    text: "Ocurrio un error al editar los datos.",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }
        }
    })
}


function modalRegHabitante(){
    $('#modalRegHabitante').modal('show');
}

function modalRegUser(){
    $('#modalRegUser').modal('show');
}

function modalRegEntrega(){
    $('#modalRegEntrega').modal('show');
}

function modalRegEntregaEspecial(){
    $('#modalRegEntregaEspecial').modal('show');
}

function modalRegReward(){
    $('#modalRegReward').modal('show');
}

function modalRegPoligonal() {
    $('#modalRegPoligonal').modal('show');
}

function modalEditPoligonal(a) {
    var id = a;
    console.log(id);
    $.ajax({
        url: './includes/requestPoligonal.php',
        method: 'POST',
        data: {
            id: id
        },
        success: function(data) {
            var data = JSON.parse(data);
            if (data.status) {
                document.querySelector('#id_poligonal').value = data.data.id;
                document.querySelector('#namePoligonalEdit').value = data.data.nombre;
                document.querySelector('#comunidadEdit').value = data.data.id_comunidad;
                $('#modalEditPoligonal').modal('show');
            }else{
                swal('Atencion',data.msg,'error');
            }
        }
    })
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
                // document.querySelector('#pfImageEdit').files[0] = data.data.imagen;
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

function editUser(){
    var id = document.getElementById('id').value;
    var nombres = document.getElementById('nameUserEdit').value;
    var pfImage = document.getElementById('pfImageEdit').files[0];
    var usuario = document.getElementById('userEdit').value;
    var password = document.getElementById('psswdEditUser').value;
    var rol = document.getElementById('rolEditUser').value;
    var activo = document.getElementById('estadoEditUser').value;

    var formData = new FormData();
    formData.append('id', id);
    formData.append('nombres', nombres);
    formData.append('pfImage', pfImage); // Agregar el archivo de imagen
    formData.append('usuario', usuario);
    formData.append('password', password);
    formData.append('rol', rol);
    formData.append('activo', activo);

    $.ajax({
        url: './includes/editUsers.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
            $('#msjError').html=data;
            if(data == 'vacio') {
                swal({
                    title: '¡Alerta!',
                    text: "¡Es necesario que rellene todos los campos!",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
                
            }
            if(data == 'ok'){
                swal({
                    title: '¡Editado!',
                   text: "Los datos se editaron con éxito.",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
                users();
            }if(data == 'error'){
                swal({
                    title: '¡Error!',
                    text: "Ocurrio un error al editar los datos.",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }
        }

    })
}

function regUser(){
    var nombres = document.getElementById('nameUserReg').value;
    var pfImage = document.getElementById('pfImage').files[0];
    var usuario = document.getElementById('userReg').value;
    var password = document.getElementById('psswdRegUser').value;
    var rol = document.getElementById('rolRegUser').value;
    var activo = document.getElementById('estadoRegUser').value;

    var formData = new FormData();
    formData.append('nombres', nombres);
    formData.append('pfImage', pfImage); // Agregar el archivo de imagen
    formData.append('usuario', usuario);
    formData.append('password', password);
    formData.append('rol', rol);
    formData.append('activo', activo);

    $.ajax({
        url: './includes/regUsers.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
            if (data == "Sucess") {
                swal({
                    title: '¡Registrado!',
                   text: "¡El usuario se registro con éxito!",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
                users();
            } if (data == "Error") {
                swal({
                    title: '¡Error!',
                    text: "Ocurrio un error al registrar el usuario.",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            } if (data == "vacio") {
                swal({
                    title: '¡Alerta!',
                    text: "¡Es necesario que rellene todos los campos!",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'Ok.',
                    closeOnConfirm: false
                });
            }
        }

    })
}

function delPoligonal(a) {
    var id = a;

    swal({
        title: '¿Estás Seguro?',
        text: "¿Estás seguro que deseas eliminar esta poligonal?",
        type: 'error',
        showCancelButton: true,
        confirmButtonText: 'Si, eliminar',
        closeOnConfirm: false
    },
    function(isConfirm){
        if (isConfirm) {
            $.ajax({
                url: './includes/delPoligonal.php',
                method: 'POST',
                data: {id: id},
                success: function(data) {
                    if (data == 'ok') {
                        swal({
                            title: '¡Eliminado!',
                            text: 'La poligonal ha sido eliminada.',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    } if (data == 'error') {
                        swal({
                            title: '¡Error!',
                            text: "Ocurrio un error al eliminar la poligonal.",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    }
                }
            })   
        }
    });
}

function disableUserSelect(a) {
    var user = a;

    swal({
        title: '¿Estás Seguro?',
        text: "¿Estás seguro que deseas eliminar este usuario?",
        type: 'error',
        showCancelButton: true,
        confirmButtonText: 'Si, eliminar',
        closeOnConfirm: false
    },
    function(isConfirm){
        if (isConfirm) {
            $.ajax({
                url: './includes/delUser.php',
                method: 'POST',
                data: {user: user},
                success: function(data) {
                    if (data == 'ok') {
                        swal({
                            title: '¡Eliminado!',
                            text: 'El usuario ha sido eliminado.',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    } if (data == 'error') {
                        swal({
                            title: '¡Error!',
                            text: "Ocurrio un error al eliminar el usuario.",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    }
                }
            })   
        }
    });

}

function jefeFamilia(){
    var tipoHabitante = document.getElementById('tipoHabitanteReg').value;
    var id_jefe = document.getElementById('idJefe');
    var parentezco = document.getElementById('parentezcoReg');
    console.log(tipoHabitante);
    
    if (tipoHabitante == 1) {

        id_jefe.value = "";
        id_jefe.disabled = true;
        parentezco.value = "";
        parentezco.disabled = true;
        
    }if(tipoHabitante == 2){
    
        id_jefe.removeAttribute('disabled');
        parentezco.removeAttribute('disabled');

    }
}

// $('#discapacidad').click(function(){
//     var valueRadio = document.getElementById('discapacidad').value;
//     console.log(valueRadio);
//     if(valueRadio == 'Si'){
//         var contenedor = document.getElementById('contenedorDiscapacidad');
//         var rowContenedor = document.getElementById('rowContainer');
//         var radios = document.getElementById('radioDiscapacidad');

//         const divField = document.createElement("div");
//         divField.className = "mb-3 col-md-4";

//         const labelField = document.createElement("label");
//         labelField.className = "form-label";
//         labelField.textContent = "Especifique Discapacidad"

//         const inputField = document.createElement("input");
//         inputField.type = "text";
//         inputField.id = "discapacidadInput";
//         inputField.name = "discapacidadInput";
//         inputField.className = "form-control";
//         inputField.placeholder = "Especifique su discapacidad";

//         rowContenedor.appendChild(divField);
//         divField.appendChild(labelField);
//         divField.appendChild(inputField);        
//         radios.style= "display: none";
//     }
// })

function regHabitante(){
    var nombre = document.getElementById('nameHabitanteReg').value;
    var apellido = document.getElementById('name2HabitanteReg').value;
    var nacionalidad = document.getElementById('nacionalidadHabitanteReg').value;
    var genero = $("input[name='generoHabitanteReg']:checked").val();
    console.log(genero);
    var cedula = document.getElementById('cedulaHabitanteReg').value;
    var fechaNac = document.getElementById('dateHabitanteReg').value;
    var telefono = document.getElementById('telHabitanteReg').value;
    var edoCivil = document.getElementById('edoCivilReg').value;
    var parentezco = document.getElementById('parentezcoReg').value;
    
    var discapacidad = document.getElementById('discapacidad').value;
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
            parentezco:parentezco,
            nacionalidad:nacionalidad,
            genero:genero,
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
            if(data == 'ok'){
                swal({
                    title: '¡Registrado!',
                   text: "Los datos se registraron con éxito.",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
                document.getElementById('nameHabitanteReg').value = '';
                document.getElementById('name2HabitanteReg').value = '';
                document.getElementById('cedulaHabitanteReg').value = '';
                document.getElementById('dateHabitanteReg').value = '';
                document.getElementById('telHabitanteReg').value = '';
                document.getElementById('edoCivilReg').value = '';
                document.getElementById('parentezcoReg').value = '';
                document.getElementById('discapacidad').value = '';
                document.getElementById('tipoHabitanteReg').value = '';
                habitantes();
            }if(data == 'error'){
                swal({
                    title: '¡Error!',
                    text: "Ocurrio un error al registrar los datos.",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }if(data == 'existe'){
                swal({
                    title: '¡Alerta!',
                   text: "¡El habitante que esta intentando registrar ya existe!",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }if(data == 'vacio'){
                swal({
                    title: '!Alerta!',
                   text: "¡Es necesario que rellene todos los campos!",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }
        }
    })

}

function regPoligonal(){
    var nombre = document.getElementById('namePoligonalReg').value;
    var comunidadID = document.getElementById('comunidad').value;

    if(nombre == '' || comunidadID == ''){

        swal({
            title: '¡Alerta!',
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
                    title: '¡Registrado!',
                   text: "¡Los datos se registraron con éxito!",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
                poligonales();
            }if(data == 'Error'){
                swal({
                    title: '¡Error!',
                    text: "Ocurrio un error al registrar los datos.",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }if(data == 'existe'){
                swal({
                    title: '¡Alerta!',
                    text: "¡La poligonal que esta intentando registrar ya existe!",
                    type: 'info',
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
                    swal({
                        title: 'Encontrado!',
                        text: "La cédula ingresada coincide con un jefe de familia!.",
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                }if(data == 'nulo'){
                    swal({
                        title: 'Alerta!',
                       text: "¡La cédula no coincide con ningun jefe de familia!",
                        type: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                    document.getElementById('cedulaJefe').value = "";
                }
            }
        })
    
    }

    
}

function valJefeEspecial(){
    var jefe = document.getElementById('cedulaJefeEspecial').value;
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
                    swal({
                        title: '¡Encontrado!',
                        text: "¡La cédula ingresada coincide con un jefe de familia!",
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                }if(data == 'nulo'){
                    swal({
                        title: '¡Alerta!',
                        text: "¡La cédula no coincide con ningun jefe de familia!",
                        type: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                    document.getElementById('cedulaJefe').value = "";
                }
            }
        })
    
    }

    
}

function regReward(){
    var jefeFamilia = document.getElementById('cedulaJefe').value;
    var beneficio_id = document.getElementById('beneficio_id').value;
    var metodo = document.getElementById('methodPago').value;
    var monto = document.getElementById('montoEntrega').value;
    var referencia = document.getElementById('nroReferencia').value;

    if (jefeFamilia == '' || beneficio_id == '' || referencia == '') {
        swal({
            title: '¡Error!',
            text: "Por favor, complete todos los campos.",
            type: 'error',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
        });
        
    }else {

        if (jefeFamilia <= 0 || referencia <= 0) {
            swal({
                title: '¡Error!',
                text: "¡Los campos numericos no deben ser negativos!",
                type: 'warning',
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
                    beneficio_id: beneficio_id,
                    metodo: metodo,
                    monto: monto,
                    referencia: referencia
                },
                success: function(data){
                    // $('#errorDisplay').html(data);
                    if(data == 'ok'){
                        swal({
                            title: '¡Éxito!',
                            text: "¡La entrega se registro con éxito!",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                        rewards();
                    } if(data == 'error') {
                        swal({
                            title: '¡Error!',
                            text: "Ocurrio un error al registrar los datos.",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    }if(data == 'existe'){
                        swal({
                            title: '¡Alerta!',
                            text: "La entrega que esta intentando registrar ya existe!",
                            type: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                        document.getElementById('cedulaJefe').value = "";
                        document.getElementById('nroReferencia').value = "";
                    }
                }
            })
        }
    }
}

function regRewardEspecial(){
    var jefeFamilia = document.getElementById('cedulaJefeEspecial').value;
    var beneficio_id = document.getElementById('beneficio_idEspecial').value;
    var metodo = document.getElementById('methodPagoEspecial').value;
    var monto = document.getElementById('montoEntregaEspecial').value;
    var referencia = document.getElementById('nroReferenciaEspecial').value;

    if (jefeFamilia == '' || beneficio_id == '') {
        swal({
            title: '¡Error!',
            text: "Por favor, complete todos los campos.",
            type: 'error',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
        });
        
    }else {

        if (jefeFamilia <= 0 || referencia < 0) {
            swal({
                title: '¡Error!',
                text: "¡Los campos numéricos no deben ser negativos!",
                type: 'warning',
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
                    beneficio_id: beneficio_id,
                    metodo: metodo,
                    monto: monto,
                    referencia: referencia
                },
                success: function(data){
                    // $('#errorDisplay').html(data);
                    if(data == 'ok'){
                        swal({
                            title: '¡Éxito!',
                            text: "¡La entrega se registro con éxito!",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                        rewardsEspecial();
                    } if(data == 'error') {
                        swal({
                            title: '¡Error!',
                           text: "Ocurrio un error al registrar los datos.",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                        document.getElementById('cedulaJefeEspecial').value = "";
                        document.getElementById('nroReferenciaEspecial').value = "";
                    }if(data == 'existe'){
                        swal({
                            title: '¡Alerta!',
                            text: "¡La entrega que esta intentando registrar ya existe!",
                            type: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                        document.getElementById('cedulaJefeEspecial').value = "";
                        document.getElementById('nroReferenciaEspecial').value = "";
                    }if (data == 'exMonth') {
                        swal({
                            title: '¡Alerta!',
                            text: "¡Este Jefe de Familia ya recibió este beneficio!",
                            type: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                        document.getElementById('cedulaJefeEspecial').value = "";
                        document.getElementById('nroReferenciaEspecial').value = "";
                    }
                }
            })
        }
    }
}

function regBeneficio(){
    var name = document.getElementById('nameBeneficio').value;
    var estado = document.getElementById('estatusBeneficio').value;
    var especial = document.getElementById('especialBeneficio').value;

    if (name == "" || estado == "") {
        swal({
            title: '¡Error!',
            text: "Por favor complete todos los campos",
            type: 'warning',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
        });
    }else {
        $.ajax({
            url: './includes/regBeneficio.php',
            method: 'POST',
            data: {
                name: name,
                estado: estado,
                especial: especial
            },
            success: function(data){
                $('#msjError').html(data);
                if (data == "registrado") {
                    swal({
                        title: '¡Éxito!',
                        text: "¡El beneficio se registro con éxito!",
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                } if (data == "existe") {
                    swal({
                        title: '¡Alerta!',
                        text: "El beneficio que esta intentando registrar ya existe!",
                        type: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                    
                } if (data == "error") {
                    swal({
                        title: '¡Error!',
                       text: "Ocurrio un error al registrar el beneficio.",
                        type: 'error',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                } if (data == "inactivo") {
                    swal({
                        title: '¡Alerta!',
                        text: "¡El beneficio que esta intentando registrar ya existe, pero se encuentra inactiva!",
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

function modalEditBeneficio(a) {
    var idBeneficio = a;

    $.ajax({
        url: './includes/requestBeneficio.php',
        method: 'POST',
        data: {
            idBeneficio: idBeneficio
        },
        success: function(data){
            var data = JSON.parse(data);

            if (data.status) {
                document.querySelector('#id').value = data.data.id;
                document.querySelector('#nameBeneficioEdit').value = data.data.nombre_beneficio;
                document.querySelector('#estatusBeneficioEdit').value = data.data.estatus;
                document.querySelector('#especialBeneficioEdit').value = data.data.especial;

                $('#modalEditReward').modal('show');
            } else {
                swal({
                    title: '¡Error!',
                    text: "Ocurrio un error al editar el beneficio.",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                });
            }
        }
    })
}

function editBeneficio(){
    var id = document.querySelector('#id').value;
    var name = document.querySelector('#nameBeneficioEdit').value;
    var estado = document.querySelector('#estatusBeneficioEdit').value;
    var especial = document.querySelector('#especialBeneficioEdit').value;

    swal({
        title: '¡Alerta!',
        text: "¿Está seguro que desea editar?",
        type: 'info',
        showCancelButton: true,
        confirmButtonText: 'OK',
        closeOnConfirm: false
    },
    function(isConfirm){
        if (isConfirm) {
            $.ajax({
                url: './includes/editReward.php',
                method: 'POST',
                data: {
                    id: id,
                    name: name,
                    estado: estado,
                    especial: especial
                },
                success: function(data){
                    if (data == 'ok') {
                        swal({
                            title: '¡Éxito!',
                            text: "¡El beneficio se edito con éxito!",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    } if (data == 'error') {
                        swal({
                            title: '¡Error!',
                            text: "Ocurrio un error al editar el beneficio.",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    } if (data == 'vacio') {
                        swal({
                            title: '¡Alerta!',
                            text: "Es necesario rellenar todos los campos.",
                            type: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        });
                    }
                }
            })
        }
    });
}