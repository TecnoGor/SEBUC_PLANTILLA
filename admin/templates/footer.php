	
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/jquery-3.7.0.min.js"></script>
	<script src="js/main.js"></script>
    <script src="js/showActions.js"></script>
	<script src="js/modals.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../node_modules/bootstrap-icons/font/bootstrap-icons.json"></script>
	<script>
		const campo1 = document.getElementById('nameBeneficioEdit');

		campo1.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-Z]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo1.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo1.value = campo1.value.slice(0, -1);
			}
		});
	</script>

	<script>
		const campo2 = document.getElementById('nameHabitanteEdit');
		const campo3 = document.getElementById('name2HabitanteEdit');
		const campo4 = document.getElementById('nameHabitanteReg');
		const campo5 = document.getElementById('name2HabitanteReg');

		campo2.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-Z]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo2.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo2.value = campo2.value.slice(0, -1);
			}
		});

		campo3.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-Z]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo3.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo3.value = campo3.value.slice(0, -1);
			}
		});

		campo4.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-Z]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo4.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo4.value = campo4.value.slice(0, -1);
			}
		});

		campo5.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-Z-á]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo5.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo5.value = campo5.value.slice(0, -1);
			}
		});

	</script>
</body>
</html>