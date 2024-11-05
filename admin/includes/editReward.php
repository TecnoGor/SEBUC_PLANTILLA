<?php
    if (empty($_POST['id']) || empty($_POST['name'])) {
        echo "vacio";
    } else {
        include('conn.php');

        $id = $_POST['id'];
        $name = $_POST['name'];
        $estatus = $_POST['estado'];
        $especial = $_POST['especial'];

        $sql = "UPDATE tipo_beneficio SET nombre_beneficio = '$name', estatus = '$estatus', especial = '$especial' WHERE id = '$id';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt) {
            echo "ok";
        } else {
            echo "error";
        }

    }


?>