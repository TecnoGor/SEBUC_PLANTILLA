<?php

    if(empty($_POST['jefeFamilia']) || empty($_POST['fecha']) || empty($_POST['beneficio_id']) || empty($_POST['referencia'])){

        echo "Vacio";

    } else {
        include('conn.php');

        $jefe = $_POST['jefeFamilia'];
        $fecha = $_POST['fecha'];
        $beneficio = $_POST['beneficio_id'];
        $referencia = $_POST['referencia'];

        

            $sqlRequest = "SELECT * FROM habitantes WHERE cedula = $jefe;";
            $stmtRequest = $conn->prepare($sqlRequest);
            $stmtRequest->execute();
            $resultJefe = $stmtRequest->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultJefe as $jefeId) {
                $sqlInsert = "INSERT INTO entrega_beneficio(id_beneficio, id_jefe_familia, fecha_entrega, nro_pago) VALUES ('$beneficio', $jefeId['id'], '$fecha', '$referencia');";
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