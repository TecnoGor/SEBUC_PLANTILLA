<?php

if(empty($_POST['nombres']) || empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['rol']) || empty($_POST['activo'])){
    echo 'vacio';
} else {
    include('conn.php');

    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $user = $_POST['usuario'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $activo = $_POST['activo'];

    $sql = "UPDATE usuarios SET user = '$user', nombres = '$nombres', password = '$password', rol = '$rol', activo = '$activo' WHERE id = $id;";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();

    if ($result) {
        echo 'ok';
    } else {
        echo 'error';
    }
}
?>