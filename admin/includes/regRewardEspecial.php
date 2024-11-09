<?php

    if(empty($_POST['jefeFamilia']) || empty($_POST['beneficio_id'])){

        echo "Vacio";

    } else {
        include('conn.php');

        $jefe = $_POST['jefeFamilia'];
        $beneficio = $_POST['beneficio_id'];
        $referencia = $_POST['referencia'];

        

            $sqlRequest = "SELECT * FROM habitantes WHERE cedula = $jefe;";
            $stmtRequest = $conn->prepare($sqlRequest);
            $stmtRequest->execute();
            $resultJefe = $stmtRequest->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultJefe as $jefeId) {
                $idJefe = $jefeId['id_habitante'];

                

                $sqlRequest2 = "SELECT * FROM entrega_beneficio WHERE nro_pago = '$referencia' AND fecha_entrega >= DATE_FORMAT(NOW(), '%Y-%m-01') AND fecha_entrega < DATE_FORMAT(NOW() + INTERVAL 1 MONTH, '%Y-%m-01');";
                $stmtRequest2 = $conn->prepare($sqlRequest2);
                $stmtRequest2->execute();

                $resultEntrega = $stmtRequest2->fetch(PDO::FETCH_ASSOC);

                if ($resultEntrega > 0) {
                    echo "existe";
                } else {

                    $sqlRequestII = "SELECT * FROM entrega_beneficio WHERE id_jefe_familia = '$idJefe' AND id_beneficio = '$beneficio' AND fecha_entrega >= DATE_FORMAT(NOW(), '%Y-%m-01') AND fecha_entrega < DATE_FORMAT(NOW() + INTERVAL 1 MONTH, '%Y-%m-01');";
                    $stmtRequestII = $conn->prepare($sqlRequestII);
                    $stmtRequestII->execute();

                    $resultEntregaII = $stmtRequestII->fetch(PDO::FETCH_ASSOC);

                    if ($resultEntregaII > 0) {
                        echo "exMonth";
                    }else {
                        $sqlInsert = "INSERT INTO entrega_beneficio(entrega_beneficio.id_beneficio, id_jefe_familia, nro_pago) VALUES ($beneficio, $idJefe, $referencia);";
                        $stmtInsert = $conn->prepare($sqlInsert);
                        $stmtInsert->execute();

                        if ($stmtInsert) {
                            echo "ok";
                        } else {
                            echo "error";
                        }
                    }
                                        
                }
            }

            

    }


?>