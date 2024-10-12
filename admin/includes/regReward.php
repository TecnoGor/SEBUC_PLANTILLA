<?php

    if(empty($_POST['jefeFamilia']) || empty($_POST['fecha']) || empty($_POST['beneficio_id']) || empty($_POST['referencia'])){

        echo "Vacio";

    } else {
        include('conn.php');

        $jefe = $_POST['jefeFamilia'];
        $fecha = $_POST['fecha'];
        $beneficio = $_POST['beneficio_id'];
        $referencia = $_POST['referencia'];

        $sql = "SELECT * FROM entrega_beneficio WHERE id_beneficio = '$beneficio' AND id_jefe_familia = '$jefe' AND fecha_entrega = '$fecha' AND nro_pago = '$referencia';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result > 0){
            echo "existe";
        } else {

            $sqlInsert = "INSERT INTO entrega_beneficio(id_beneficio, id_jefe_familia, fecha_entrega, nro_pago) VALUES ('$beneficio', '$jefe', '$fecha', '$referencia')";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->execute();

            if ($stmtInsert) {
                echo "ok";
            } else {
                echo "error";
            }
        }

    }


?>