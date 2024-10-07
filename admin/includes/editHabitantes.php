<?php

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nacionalidad = $_POST['nacionalidad'];
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

            $sqlInsert = "UPDATE habitantes SET nombres = '$nombre', apellidos = '$apellido', nacionalidad = '$nacionalidad', cedula = '$cedula', fecha_nacimiento = '$fechaNac', telefono = '$telefono', id_edoCivil = '$edoCivil', discapacidad = '$discapacidad', pensionado = '$pensionado', id_tipoHabitante = '$tipoHabitante', id_poligonal = '$poligonal' WHERE id = '$id'";
            $stmtInsert = $conn->prepare($sqlInsert);
            $resultInsert = $stmtInsert->execute();

            if ($resultInsert) {
                echo    '<div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                El habitante fue actualizado correctamente.
                            </div>
                        </div>';
            }

        }elseif($tipoHabitante == 2){
            $jefeFamilia = $_POST['jefeFamilia'];

            $sqlConsulta = "SELECT id, cedula FROM habitantes WHERE cedula = '$jefeFamilia'";
            $stmtConsulta = $conn->prepare($sqlConsulta);
            $stmtConsulta->execute();
            $resultConsulta = $stmtConsulta->fetchAll(PDO::FETCH_ASSOC);

            if($resultConsulta > 0){

                foreach($resultConsulta as $cedulaJefe){

                        $sqlInsert2="UPDATE habitantes SET nombres = '$nombre', apellidos = '$apellido', nacionalidad = '$nacionalidad', cedula = '$cedula', fecha_nacimiento = '$fechaNac', telefono = '$telefono', id_edoCivil = '$edoCivil', discapacidad = '$discapacidad', pensionado = '$pensionado', id_tipoHabitante = '$tipoHabitante', id_poligonal = '$poligonal', id_jefeFamilia = '" .$cedulaJefe['id']. "' WHERE id = '$id'";
                        $stmtInsert2 = $conn->prepare($sqlInsert2);
                        $resultInsert2 = $stmtInsert2->execute();
                        
                        if ($resultInsert2) {
                            echo    '<div class="alert alert-success d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                        <div>
                                            El habitante fue actualizado correctamente.
                                        </div>
                                    </div>';
                        }else {
                        '<div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill p-1"></i>
                            <div>
                                Asegurese de haber ingresado la cedula correcta del Jefe de Familia.
                            </div>
                        </div>';
                        }

                }

            } 

        }
    

?>
