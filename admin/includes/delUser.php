<?php
    if(empty($_POST['user'])){
        echo "vacio";
    } else {
        include('conn.php');

        $user = $_POST['user'];

        $sql = "DELETE FROM usuarios WHERE id = '$user';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt) {
            echo 'ok';
        } else {
            echo 'error';
        }
    }

?>