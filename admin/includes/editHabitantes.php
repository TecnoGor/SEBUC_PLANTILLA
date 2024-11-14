<?php

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nacionalidad = $_POST['nacionalidad'];
        $parentezco = $_POST['parentezco'];
        $genero = $_POST['genero'];
        $cedula = $_POST['cedula'];
        $fechaNac = $_POST['fechaNac'];
        $telefono = $_POST['telefono'];
        $edoCivil = $_POST['edoCivil'];
        $discapacidad = $_POST['discapacidad'];
        $pensionado = $_POST['pensionado'];
        $tipoHabitante = $_POST['tipoHabitante'];
        $poligonal = $_POST['poligonal'];

        include_once('conn.php');

        if($tipoHabitante == 1){

            $sqlInsert = "UPDATE habitantes SET nombres = '$nombre', apellidos = '$apellido', nacionalidad = '$nacionalidad', genero = '$genero', cedula = '$cedula', fecha_nacimiento = '$fechaNac', telefono = '$telefono', id_edoCivil = '$edoCivil', discapacidad = '$discapacidad', pensionado = '$pensionado', id_tipoHabitante = '$tipoHabitante', id_parentezco = '$parentezco', id_poligonal = '$poligonal' WHERE id_habitante = '$id'";
            $stmtInsert = $conn->prepare($sqlInsert);
            $resultInsert = $stmtInsert->execute();

            if ($resultInsert) {
                echo 'ok';
            } else {
                echo 'error';
            }

        }elseif($tipoHabitante == 2){
            $jefeFamilia = $_POST['jefeFamilia'];

            $sqlConsulta = "SELECT id, cedula FROM habitantes WHERE cedula = '$jefeFamilia'";
            $stmtConsulta = $conn->prepare($sqlConsulta);
            $stmtConsulta->execute();
            $resultConsulta = $stmtConsulta->fetchAll(PDO::FETCH_ASSOC);

            if($resultConsulta > 0){

                foreach($resultConsulta as $cedulaJefe){

                        $sqlInsert2="UPDATE habitantes SET nombres = '$nombre', apellidos = '$apellido', nacionalidad = '$nacionalidad', genero = '$genero', cedula = '$cedula', fecha_nacimiento = '$fechaNac', telefono = '$telefono', id_edoCivil = '$edoCivil', discapacidad = '$discapacidad', pensionado = '$pensionado', id_tipoHabitante = '$tipoHabitante', id_parentezco = '$parentezco', id_poligonal = '$poligonal', id_jefeFamilia = '" .$cedulaJefe['id']. "' WHERE id_habitante = '$id'";
                        $stmtInsert2 = $conn->prepare($sqlInsert2);
                        $resultInsert2 = $stmtInsert2->execute();
                        
                        if ($resultInsert2) {
                            echo 'ok';
                        }else {
                            echo 'cedula';
                        }

                }

            } 

        }
    

?>
