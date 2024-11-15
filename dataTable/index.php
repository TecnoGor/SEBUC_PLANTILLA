<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="node_modules/datatables.net-dt/css/dataTables.dataTables.min.css"> -->
    <link rel="stylesheet" href="node_modules/datatables.net-dt/css/dataTables.dataTables.css">

    <script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" /> -->
  
<!-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script> -->
 <script src="node_modules/datatables.net/js/dataTables.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
        <table id="myTable" class="display">
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                
                include('conn.php');

                $sql = "SELECT h.id_habitante as idH, nombres, apellidos, nacionalidad, cedula, telefono, nombreEdoCivil, p.nombre AS namePoligonal, nombreTipo FROM habitantes as h INNER JOIN tipo_habitante AS th, estado_civil AS ec, poligonal AS p WHERE h.id_tipoHabitante = th.id && h.id_edoCivil = ec.id && h.id_poligonal = p.id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

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
                    echo "<td>" . $row->namePoligonal. "</td>";
                    // echo "<td>" . $listado[$i]->fnac . "</td>";
                    echo "<td>" . $row->nombreTipo. "</td>";
                    echo "<td>" . $row->telefono. "</td>";
                    echo '<td><div class="btn-group"><a class="btn btn-primary" onclick="modalEditHabitante(' . $row->idH .')"><i class="bi bi-pencil-square fs-5"></i></a></div>' . '</td>';
                    // echo "<td>" . '<a href="actualizar.php?upd=' . $listado[$i]->id_cl . '" class="boton_edit" title="Editar Habitante"><img src="../fontawesome/svgs/regular/pen-to-square.svg" class="icon_edit"></a>' . "</td>";
                    echo "</tr>";
                    $j++;
                }

                ?>
            </tbody>
        </table>
        </div>
        
    </div>

<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>