
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/main.js"></script>
    <script src="js/showActions.js"></script>
	<script src="js/html2pdf.bundle.min.js"></script>
	<script src="js/modals.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../node_modules/bootstrap-icons/font/bootstrap-icons.json"></script>
	<script src="../node_modules/chart.js/dist/chart.umd.js"></script>

<?php 

        $host = "localhost";
        $dbname = "sebuc";
        $user = "root";
        $password = "";

        $conn = "mysql:host=".$host.";dbname=".$dbname;

        try {
            $conn = new PDO($conn, $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conexion establecida";
        } catch (PDOException $e) {
            echo "Error al establecer conexion" . $e->getMessage();
        }

        $sql = "SELECT 
                    COUNT(CASE WHEN id_tipoHabitante = 1 THEN 1 END) AS countJefes,
                    COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 18 THEN 1 END) AS countMenor,
                    COUNT(CASE WHEN discapacidad != 'Ninguna' THEN 1 END) AS countDiscapacitado,
                    COUNT(CASE WHEN id_tipoHabitante = 2 THEN 1 END) AS countIntegrantes
                FROM 
                    habitantes;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $datos) {

    ?>

<script>
    const ctxI = document.getElementById('chart1');

    let countJefes = <?= $datos['countJefes'];?>;
    let countIntegrantes = <?= $datos['countIntegrantes'];?>;
    let countDiscapacitado = <?= $datos['countDiscapacitado'];?>;
    let countMenor = <?= $datos['countMenor'];?>;

    <?php

        }
?>

    new Chart(ctxI, {
        type: 'doughnut',
        data: {
        labels: ['Jefes de Familia', 'Integrantes de Familia', 'Diversidad Funcional', 'Menores de edad'],
        datasets: [{
            label: '# of Votes',
            data: [countJefes, countIntegrantes, countDiscapacitado, countMenor],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>
	<?php

		$sqlII = "SELECT 
                    COUNT(CASE WHEN id_poligonal = 1 THEN 1 END) AS countOriental,
                    COUNT(CASE WHEN id_poligonal = 2 THEN 1 END) AS countCarabobo,
                    COUNT(CASE WHEN id_poligonal = 3 THEN 1 END) AS countFJavier,
                    COUNT(CASE WHEN id_poligonal = 4 THEN 1 END) AS countPrincipal
                FROM 
                    habitantes;";

        $stmtII = $conn->prepare($sqlII);
        $stmtII->execute();
        $resultII = $stmtII->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultII as $datosII) {
    

    ?>
    <script>
        const ctxII = document.getElementById('chart2');
        var countOriental = <?= $datosII['countOriental'];?>;
        var countCarabobo = <?= $datosII['countCarabobo'];?>;
        var countFJavier = <?= $datosII['countFJavier'];?>;
        var countPrincipal = <?= $datosII['countPrincipal'];?>;
		<?php 

		}

		?>
        new Chart(ctxII, {
            type: 'bar',
            data: {
            labels: ['Oriental', 'Carabobo', 'Francisco Javier', 'Principal'],
            datasets: [{
                label: 'Cantidad de Habitantes por Poligonal',
                data: [countOriental, countCarabobo, countFJavier, countPrincipal],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
    

	<script>

		<?php
		
			$sqlIII = "SELECT 
							YEAR(fecha_entrega) AS anio,
							SUM(CASE WHEN MONTH(fecha_entrega) = 1 THEN 1 ELSE 0 END) AS enero,
							SUM(CASE WHEN MONTH(fecha_entrega) = 2 THEN 1 ELSE 0 END) AS febrero,
							SUM(CASE WHEN MONTH(fecha_entrega) = 3 THEN 1 ELSE 0 END) AS marzo,
							SUM(CASE WHEN MONTH(fecha_entrega) = 4 THEN 1 ELSE 0 END) AS abril,
							SUM(CASE WHEN MONTH(fecha_entrega) = 5 THEN 1 ELSE 0 END) AS mayo,
							SUM(CASE WHEN MONTH(fecha_entrega) = 6 THEN 1 ELSE 0 END) AS junio,
							SUM(CASE WHEN MONTH(fecha_entrega) = 7 THEN 1 ELSE 0 END) AS julio,
							SUM(CASE WHEN MONTH(fecha_entrega) = 8 THEN 1 ELSE 0 END) AS agosto,
							SUM(CASE WHEN MONTH(fecha_entrega) = 9 THEN 1 ELSE 0 END) AS septiembre,
							SUM(CASE WHEN MONTH(fecha_entrega) = 10 THEN 1 ELSE 0 END) AS octubre,
							SUM(CASE WHEN MONTH(fecha_entrega) = 11 THEN 1 ELSE 0 END) AS noviembre,
							SUM(CASE WHEN MONTH(fecha_entrega) = 12 THEN 1 ELSE 0 END) AS diciembre
						FROM 
							entrega_beneficio
						GROUP BY 
							YEAR(fecha_entrega)
						ORDER BY 
							anio;";

			$stmtIII = $conn->prepare($sqlIII);
			$stmtIII->execute();

			$resultIII = $stmtIII->fetchAll(PDO::FETCH_ASSOC);

			foreach ($resultIII as $jornadas) {
				# code...
			}

		?>

		const ctx = document.getElementById('acquisitions');
		let enero =  <?= $jornadas['enero']; ?>;
		let febrero = <?= $jornadas['febrero']; ?>;
		let marzo = <?= $jornadas['marzo']; ?>;
		let abril = <?= $jornadas['abril']; ?>;
		let mayo = <?= $jornadas['mayo']; ?>;
		let junio = <?= $jornadas['junio']; ?>;
		let julio = <?= $jornadas['julio']; ?>;
		let agosto = <?= $jornadas['agosto']; ?>;
		let septiembre = <?= $jornadas['septiembre']; ?>;
		let octubre = <?= $jornadas['octubre']; ?>;
		let noviembre = <?= $jornadas['noviembre']; ?>;
		let diciembre = <?= $jornadas['diciembre']; ?>;

		new Chart(ctx, {
			type: 'bar',
			data: {
			labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			datasets: [{
				label: 'N° de Entregas',
				data: [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre],
				borderWidth: 1
			}]
			},
			options: {
			scales: {
				y: {
				beginAtZero: true
				}
			}
			}
		});
	</script>



	<script>
		const campo1 = document.getElementById('nameBeneficioEdit');

		campo1.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/;

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
			const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo2.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo2.value = campo2.value.slice(0, -1);
			}
		});

		campo3.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo3.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo3.value = campo3.value.slice(0, -1);
			}
		});

		campo4.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo4.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo4.value = campo4.value.slice(0, -1);
			}
		});

		campo5.addEventListener('input', function() {
			// Expresión regular para permitir solo letras y números
			const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/;

			// Verifica si el valor actual coincide con la expresión regular
			if (!regex.test(campo5.value)) {
			// Si no coincide, elimina el último carácter ingresado
			campo5.value = campo5.value.slice(0, -1);
			}
		});

	</script>

</body>
</html>