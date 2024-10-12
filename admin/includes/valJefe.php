<?php

    include('conn.php');

    $jefe = $_POST['jefe'];

    $sql = "SELECT * FROM habitantes WHERE cedula = '$jefe' && id_tipoHabitante = 1;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result>0) {
        echo 'VALIDO';
    } else {
        echo 'nulo';
    }

?>