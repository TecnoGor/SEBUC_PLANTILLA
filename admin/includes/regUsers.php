<?php

if(empty($_POST['nombres']) || empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['rol']) || empty($_POST['activo'])){
    echo    '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill p-1"></i>
                    <div>
                        Es necesario Rellenar todos los campos.
                    </div>
                </div>';
} else {

    include('conn.php');

    $nombres = $_POST['nombres'];
    $user = $_POST['usuario'];
    $password = MD5($_POST['password']);
    $rol = $_POST['rol'];
    $activo = $_POST['activo'];

    $sql = "INSERT INTO usuarios(user, nombres, password, rol, activo) VALUES ('$user', '$nombres', '$password', '$rol', '$activo')";
    $stmt = $conn->prepare($sql);
    $resultado = $stmt->execute();
    
    if ($resultado) {
        echo    '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        El usuario fue agregado correctamente.
                    </div>
                </div>';
    }else {
        echo    '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill p-1"></i>
                    <div>
                        Error al agregar el usuario.
                    </div>
                </div>';
    }
}   

?>