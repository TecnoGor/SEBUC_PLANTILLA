<?php

    if(empty($_POST['nombre']) || empty($_POST['comunidadID'])){

        echo "Vacio";

    } else {
        include('conn.php');

        $nombre = $_POST['nombre'];
        $comunidadID = $_POST['comunidadID'];

        $sql = "SELECT * FROM poligonal WHERE nombre = '$nombre' AND id_comunidad = '$comunidadID';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result > 0){
            echo "existe";
        } else {

            $sqlInsert = "INSERT INTO poligonal(nombre, id_comunidad) VALUES ('$nombre', '$comunidadID')";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->execute();

            if ($stmtInsert) {
                echo "Registrado";
            } else {
                echo "Error";
            }
        }

    }


?>