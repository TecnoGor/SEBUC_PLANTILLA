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
			}
		}
	})
}