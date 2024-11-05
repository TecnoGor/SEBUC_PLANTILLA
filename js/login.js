$(document).ready(function(){
	$('#logButton').on('click', function(){
		loginAdmin();
	});

})

function loginAdmin() {
	var login = $('#user').val();
	var pass = $('#password').val();

	$.ajax({
		url: './includes/login.php',
		method: 'POST',
		data: {
			login:login,
			pass:pass
		},
		success: function(data) {
			$('#msjAdmin').html(data);

			if (data.indexOf('Redirigiendo') >= 0) {
				window.location = 'admin/';
			} if (data == 'vacio') {
				swal({
					title: 'Alerta!',
					text: "Es necesario que rellene todos los campos",
					type: 'info',
					showCancelButton: false,
					confirmButtonText: 'OK',
					closeOnConfirm: false
				});
			} if (data == 'errLog') {
				swal({
					title: 'Error!',
					text: "Usuario o Contraseña Invalidos.",
					type: 'error',
					showCancelButton: false,
					confirmButtonText: 'OK',
					closeOnConfirm: false
				});
			}
		}
	})
}