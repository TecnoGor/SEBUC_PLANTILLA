<?php

if(empty($_POST['nombres']) || empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['rol']) || empty($_POST['activo'])){
    echo "vacio";
} else {

    include('conn.php');

    $nombres = $_POST['nombres'];
    // $imagen = $_FILES['pfImage'];
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

    if ( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
        $sql = "INSERT INTO usuarios(user, nombres, password, rol, activo, imagen) VALUES ('$user', '$nombres', '$password', '$rol', '$activo', '$imagenFinal')";
        $stmt = $conn->prepare($sql);
        $resultado = $stmt->execute();
        
        if ($resultado) {
            echo "Sucess";
        }else {
            echo "Error";
        }
    }

    
}   

?>