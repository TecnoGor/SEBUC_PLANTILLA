<?php
	$host = 'localhost';
	$dbname = 'sebuc';
	$usrname = 'root';
	$psswd = '';


	$conn = "mysql:host=".$host.";dbname=".$dbname;
	try {

		$conn = new PDO($conn, $usrname, $psswd);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "conexion establecida";
	} catch (PDOException $e) {
		echo 'Error al establecer la conexion' . $e->getMessage();
	}
?>