<?php
	session_start();

	if (!empty($_POST)) {
		if (empty($_POST['login']) || empty($_POST['pass'])) {
			echo 'vacio';
		} else {
			require_once 'conn.php';

			$user = $_POST['login'];
			$pass = md5($_POST['pass']);

			$sql = "SELECT * FROM usuarios WHERE user = ? && activo = 1";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($user));

			$verify = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() > 0) {
				if ($verify['password'] == $pass) {
					$_SESSION['active'] = true;
					$_SESSION['nomUser'] = $verify['nombres'];
					$_SESSION['user'] = $verify['user'];
					$_SESSION['rol'] = $verify['rol'];
					$_SESSION['imagen'] = $verify['imagen'];

					echo 'Redirigiendo';

				} else {

					echo 'errLog';

				}

			} else {

				echo 'errLog';

			}

		}

	}


 ?>