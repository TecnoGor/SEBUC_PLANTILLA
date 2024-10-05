<?php
	session_start();

	if (!empty($_POST)) {
		if (empty($_POST['login']) || empty($_POST['pass'])) {
			echo '<div class="alert alert-danger"><button type="button" class="btn-close" aria-label="Close" for="msjAdmin"></button>Todos los campos son necesarios</div>';
		} else {
			require_once 'conn.php';

			$user = $_POST['login'];
			$pass = md5($_POST['pass']);

			$sql = "SELECT * FROM usuarios WHERE user = ?";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($user));

			$verify = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() > 0) {
				if ($verify['password'] == $pass) {
					$_SESSION['active'] = true;
					$_SESSION['nomUser'] = $verify['nombres'];
					$_SESSION['user'] = $verify['user'];
					$_SESSION['rol'] = $verify['rol'];

					echo '<div class="alert alert-success"><button type="button" class="btn-close" data-dismiss="alert"></button>Redirigiendo</div>';

				} else {

					echo '<div class="alert alert-danger"><button type="button" class="btn-close" data-dismiss="alert"></button>Usuario o contraseña incorrectos</div>';

				}

			} else {

				echo '<div class="alert alert-danger"><button type="button" class="btn-close" data-dismiss="alert"></button>Usuario o contraseña incorrectos</div>';

			}

		}

	}


 ?>