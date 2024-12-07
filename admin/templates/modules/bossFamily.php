    
        <table id="tableBosses" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Nº</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Nacionalidad</th>
                    <th>Cédula</th>
                    <th>Estado Civil</th>
                    <th>Tipo de Habitante</th>
                    <th>Tlfno / Celular</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                
                include('../../includes/conn.php');

                $sql = "SELECT h.id_habitante as idH, nombres, apellidos, nacionalidad, cedula, telefono, nombreEdoCivil, nombreTipo FROM habitantes as h INNER JOIN tipo_habitante AS th, estado_civil AS ec WHERE h.id_tipoHabitante = th.id && h.id_edoCivil = ec.id && h.id_tipoHabitante = 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $j = 1;

                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                    echo "<tr>";
                    echo '<td class="mdl-data-table__cell--non-numeric">' . $j . "</td>";
                    echo "<td>" . $row->nombres. "</td>";
                    echo "<td>" . $row->apellidos. "</td>";
                    echo "<td>" . $row->nacionalidad. "</td>";
                    echo "<td>" . $row->cedula. "</td>";
                    // echo "<td>" . $listado[$i]->sex . "</td>";
                    echo "<td>" . $row->nombreEdoCivil. "</td>";
                    // echo "<td>" . $listado[$i]->fnac . "</td>";
                    echo "<td>" . $row->nombreTipo. "</td>";
                    echo "<td>" . $row->telefono. "</td>";
                    // echo '<td><div class="btn-group"><a class="btn btn-primary" onclick="modalEditHabitante(' . $row->idH .')"><i class="bi bi-pencil-square fs-5"></i></a></div>' . '</td>';
                    // echo "<td>" . '<a href="actualizar.php?upd=' . $listado[$i]->id_cl . '" class="boton_edit" title="Editar Habitante"><img src="../fontawesome/svgs/regular/pen-to-square.svg" class="icon_edit"></a>' . "</td>";
                    echo "</tr>";
                    $j++;
                }
                ?>
            </tbody>
        </table>
