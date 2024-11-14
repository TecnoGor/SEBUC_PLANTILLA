<?php

    if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['nacionalidad']) || empty($_POST['genero']) || empty($_POST['fechaNac']) || empty($_POST['edoCivil']) || empty($_POST['discapacidad']) || empty($_POST['pensionado']) || empty($_POST['tipoHabitante'])){
        echo 'vacio';
    } else {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nacionalidad = $_POST['nacionalidad'];
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

        if ($cedula != '' || $cedula != null) {
            $sqlRequest = "SELECT * FROM habitantes WHERE cedula = $cedula";
            $stmtRequest = $conn->prepare($sqlRequest);
            $stmtRequest->execute();

            $resultReq = $stmtRequest->fetch(PDO::FETCH_ASSOC);

            if ($resultReq > 0) {
                echo "existe";
            } else {
                if($tipoHabitante == 1){

                    $sqlInsert = "INSERT INTO habitantes(nombres, apellidos, nacionalidad, genero, cedula, fecha_nacimiento, telefono, id_edoCivil, discapacidad, pensionado, id_tipoHabitante, id_poligonal) VALUES ('$nombre', '$apellido', '$nacionalidad', '$genero', '$cedula', '$fechaNac', '$telefono', '$edoCivil', '$discapacidad', '$pensionado', '$tipoHabitante', '$poligonal')";
                    $stmtInsert = $conn->prepare($sqlInsert);
                    $resultInsert = $stmtInsert->execute();
        
                    if ($resultInsert) {
                        echo 'ok';
                    } else {
                        echo 'error';
                    }
        
                }elseif($tipoHabitante == 2){
                    $jefeFamilia = $_POST['jefeFamilia'];
                    $parentezco = $_POST['parentezco'];
        
                    $sqlConsulta = "SELECT id_habitante, cedula FROM habitantes WHERE cedula = '$jefeFamilia' AND id_tipoHabitante = 1";
                    $stmtConsulta = $conn->prepare($sqlConsulta);
                    $stmtConsulta->execute();
                    $resultConsulta = $stmtConsulta->fetchAll(PDO::FETCH_ASSOC);
        
                    if($resultConsulta > 0){
        
                        foreach($resultConsulta as $cedulaJefe){
        
                            $sqlInsert2="INSERT INTO habitantes(nombres, apellidos, nacionalidad, genero, cedula, fecha_nacimiento, telefono, id_edoCivil, discapacidad, pensionado, id_tipoHabitante, id_parentezco, id_jefeFamilia, id_poligonal) VALUES ('$nombre', '$apellido', '$nacionalidad', '$genero', '$cedula', '$fechaNac', '$telefono', '$edoCivil', '$discapacidad', '$pensionado', '$tipoHabitante', '$parentezco','".$cedulaJefe['id_habitante']."', '$poligonal')";
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
            }    
        } else {
            $sqlRequest = "SELECT * FROM habitantes WHERE nombres = '$nombre' AND apellidos = '$apellido'";
            $stmtRequest = $conn->prepare($sqlRequest);
            $stmtRequest->execute();

            $resultReq = $stmtRequest->fetch(PDO::FETCH_ASSOC);

            if ($resultReq > 0) {
                echo "existe";
            } else {
                if($tipoHabitante == 1){

                    $sqlInsert = "INSERT INTO habitantes(nombres, apellidos, nacionalidad, genero, cedula, fecha_nacimiento, telefono, id_edoCivil, discapacidad, pensionado, id_tipoHabitante, id_poligonal) VALUES ('$nombre', '$apellido', '$nacionalidad', '$genero', '$cedula', '$fechaNac', '$telefono', '$edoCivil', '$discapacidad', '$pensionado', '$tipoHabitante', '$poligonal')";
                    $stmtInsert = $conn->prepare($sqlInsert);
                    $resultInsert = $stmtInsert->execute();
        
                    if ($resultInsert) {
                        echo 'ok';
                    } else {
                        echo 'error';
                    }
        
                }elseif($tipoHabitante == 2){
                    $jefeFamilia = $_POST['jefeFamilia'];
                    $parentezco = $_POST['parentezco'];
        
                    $sqlConsulta = "SELECT id_habitante, cedula FROM habitantes WHERE cedula = '$jefeFamilia' AND id_tipoHabitante = 1";
                    $stmtConsulta = $conn->prepare($sqlConsulta);
                    $stmtConsulta->execute();
                    $resultConsulta = $stmtConsulta->fetchAll(PDO::FETCH_ASSOC);
        
                    if($resultConsulta > 0){
        
                        foreach($resultConsulta as $cedulaJefe){
        
                            $sqlInsert2="INSERT INTO habitantes(nombres, apellidos, nacionalidad, genero, cedula, fecha_nacimiento, telefono, id_edoCivil, discapacidad, pensionado, id_tipoHabitante, id_parentezco, id_jefeFamilia, id_poligonal) VALUES ('$nombre', '$apellido', '$nacionalidad', '$genero', '$cedula', '$fechaNac', '$telefono', '$edoCivil', '$discapacidad', '$pensionado', '$tipoHabitante', '$parentezco','".$cedulaJefe['id_habitante']."', '$poligonal')";
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
            }
        }

        

    }

?>