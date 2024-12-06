<?php

    include_once('conn.php');

    $cedula = $_POST['cedHabitante'];

    $sql = "SELECT nombres, apellidos, nacionalidad, poligonal.nombre AS namePoligonal FROM habitantes INNER JOIN poligonal ON habitantes.id_poligonal = poligonal.id WHERE cedula = '$cedula';";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $response = array('status' => false, 'msg' => 'datos no encontrados');
    } else {
        $response = array('status' => true, 'data' => $result);
    }

    echo json_encode($response,JSON_UNESCAPED_UNICODE);


?>