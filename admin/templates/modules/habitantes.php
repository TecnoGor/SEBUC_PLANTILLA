<br>

<h2 class="text-center" style="font-family: 'OswaldLight';">LISTA DE HABITANTES</h2><hr>

<div class="d-grid gap-2 ms-3 d-md-block">
    <!-- <div class="btn-group p-2"> -->
        <div class="d-grid gap-2 col-4 mx-auto">
        <a class="btn btn-primary icon-btn" onclick="modalRegHabitante()"><i class="bi bi-plus-square m-2"></i>Añadir Habitante</a>    
        </div>
    
    <!-- <button class="btn btn-danger" onclick="preparePDFH()"><i class="bi bi-file-earmark-pdf"></i> Imprimir en PDF </button> -->
    <!-- </div> -->
</div> 
<hr>



<div class="row">
    <div class="col-md-6">
    <h5 class="text-center"> Tipos de Habitantes </h5>
        <div class="d-grip gap-2 col-10 mx-auto">
            <button class="btn btn-primary mx-auto" onclick="habitantes()"> Habitantes </button>
            <button class="btn btn-primary mx-auto" onclick="bosses()"> Jefe de Familia </button>
            <button class="btn btn-primary mx-auto" onclick="handicapped()"> Diversidad Funcional </button>
        </div>
    </div>

    <div class="col-md-6">
        <h5 class="text-center"> Poligonales </h5>
        <div class="d-grip gap-2 col-10 mx-auto">
            <button class="btn btn-primary mx-auto" onclick="hPrincipal()"> Principal </button>
            <button class="btn btn-primary mx-auto" onclick="hOriental()"> Oriental </button>
            <button class="btn btn-primary mx-auto" onclick="hFJavier()"> Francisco Javier </button>
            <button class="btn btn-primary mx-auto" onclick="hCarabobo()"> Carabobo </button>
        </div>
        
    </div>
    
</div>

<hr>
<div class="mdl-grid">
    
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop" id="containTableToPrint">
    
        <table id="tableHab" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
            <thead>

                <tr>
                    <th>Nº</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Nacionalidad</th>
                    <th>Cédula</th>
                    <th>Estado Civil</th>
                    <th>Poligonal</th>
                    <!-- <th>Fecha de Nac.</th> -->
                    <th>Tipo de Habitante</th>
                    <th>Tlfno / Celular</th>
                    <th class="actionsHidden">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                
                include('../../includes/conn.php');

                $sql = "SELECT h.id_habitante as idH, nombres, apellidos, nacionalidad, cedula, telefono, nombreEdoCivil, p.nombre AS namePoligonal, nombreTipo FROM habitantes as h INNER JOIN tipo_habitante AS th, estado_civil AS ec, poligonal AS p WHERE h.id_tipoHabitante = th.id && h.id_edoCivil = ec.id && h.id_poligonal = p.id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $j = 1;

                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                    echo "<tr>";
                    echo '<td>' . $j . "</td>";
                    echo "<td>" . $row->nombres. "</td>";
                    echo "<td>" . $row->apellidos. "</td>";
                    echo "<td>" . $row->nacionalidad. "</td>";
                    echo "<td>" . $row->cedula. "</td>";
                    // echo "<td>" . $listado[$i]->sex . "</td>";
                    echo "<td>" . $row->nombreEdoCivil. "</td>";
                    echo "<td>" . $row->namePoligonal. "</td>";
                    // echo "<td>" . $listado[$i]->fnac . "</td>";
                    echo "<td>" . $row->nombreTipo. "</td>";
                    echo "<td>" . $row->telefono. "</td>";
                    echo '<td class="actionsHidden"><div class="btn-group"><a class="btn btn-primary" onclick="modalEditHabitante(' . $row->idH .')"><i class="bi bi-pencil-square fs-5"></i></a></div>' . '</td>';
                    // echo "<td>" . '<a href="actualizar.php?upd=' . $listado[$i]->id_cl . '" class="boton_edit" title="Editar Habitante"><img src="../fontawesome/svgs/regular/pen-to-square.svg" class="icon_edit"></a>' . "</td>";
                    echo "</tr>";
                    $j++;
                }
                ?>
                
            </tbody>
        </table>
    </div>
    
</div>

