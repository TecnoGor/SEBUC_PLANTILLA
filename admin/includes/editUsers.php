<?php

if(empty($_POST['nombres']) || empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['rol']) || empty($_POST['activo'])){
    echo 'vacio';
} else {
    include('conn.php');

    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $user = $_POST['usuario'];
    $password = MD5($_POST['password']);
    $rol = $_POST['rol'];
    $activo = $_POST['activo'];

    $ruta_indexphp = dirname(realpath(__FILE__));
    $ruta_fichero_origen = $_FILES['pfImage']['tmp_name'];
    $ruta_nuevo_destino = $ruta_indexphp . '/images/' . $_FILES['pfImage']['name'];
    $imagenFinal = $_FILES['pfImage']['name'];
    $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
    $max_tamanyo = 1024 * 1024 * 8;

    // if (empty($_FILES['pfImage'])) {
    //     $sql = "UPDATE usuarios SET user = '$user', nombres = '$nombres', password = '$password', rol = '$rol', activo = '$activo' WHERE id = $id;";
    //     $stmt = $conn->prepare($sql);
    //     $result = $stmt->execute();

    //     if ($result) {
    //         echo 'ok';
    //     } else {
    //         echo 'error';
    //     }
    // }else {
        if ( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
            $sql2 = "UPDATE usuarios SET user = '$user', nombres = '$nombres', password = '$password', rol = '$rol', activo = '$activo', imagen = '$imagenFinal' WHERE id = $id;";
            $stmt2 = $conn->prepare($sql2);
            $result2 = $stmt2->execute();
    
            if ($result2) {
                echo 'ok';
            } else {
                echo 'error';
            }
        }

    
}
?>