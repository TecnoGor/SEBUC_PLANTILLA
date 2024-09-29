<?php
	$host = 'localhost';
	$dbname = 'comunidad';
	$usrname = 'consejo';
	$psswd = 'c0n53j0';


	$conn = "mysql:host=".$host.";dbname=".$dbname;
	try {

		$conn = new PDO($conn, $usrname, $psswd);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "conexion establecida";
	} catch (PDOException $e) {
		echo 'Error al establecer la conexion' . $e->getMessage();
	}
?>