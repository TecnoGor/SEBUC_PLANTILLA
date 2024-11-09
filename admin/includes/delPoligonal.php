<?php
    if(empty($_POST['id'])){
        echo "vacio";
    } else {
        include('conn.php');

        $id = $_POST['id'];

        $sql = "DELETE FROM poligonal WHERE id = '$id';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt) {
            echo 'ok';
        } else {
            echo 'error';
        }
    }

?>