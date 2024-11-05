<?php

    if (empty($_POST['name']) || empty($_POST['estado']) || empty($_POST['especial'])) {
        echo "vacio";
    } else {
        include('conn.php');

        $name = $_POST['name'];
        $estatus = $_POST['estado'];
        $especial = $_POST['especial'];

        $sqlReq = "SELECT * FROM tipo_beneficio WHERE nombre_beneficio = '$name'";
        $stmtReq = $conn->prepare($sqlReq);
        $stmtReq->execute();
        $resultReq = $stmtReq->fetch(PDO::FETCH_ASSOC);

        if ($resultReq > 0) {
            $sqlReq2 = "SELECT * FROM tipo_beneficio WHERE nombre_beneficio = '$name' AND estatus = 0";
            $stmtReq2 = $conn->prepare($sqlReq2);
            $stmtReq2->execute();
            $resultReq2 = $stmtReq2->fetch(PDO::FETCH_ASSOC);

            if ($resultReq2 > 0) {
                echo "inactivo";
            } else {
                echo "existe";
            }
        } else {
            $sqlInsert = "INSERT INTO tipo_beneficio(nombre_beneficio, estatus, especial) VALUES ('$name', '$estatus', '$especial')";
            $stmtIns = $conn->prepare($sqlInsert);
            $stmtIns->execute();

            if ($stmtIns) {
                echo "registrado";
            } else {
                echo "error";
            }
        }
    }

?>