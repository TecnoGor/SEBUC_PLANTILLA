<h2 class="text-center" style="font-family: 'OswaldLight';">ENTREGA DE BENEFICIOS</h2><hr>

<div class="mdl-grid">

    <div class="tile-title-w-btn">
        <p><a class="btn btn-primary icon-btn" onclick="modalRegEntrega()"><i class="bi bi-plus-square m-2"></i>Entregar Beneficio</a></p>
    </div>
    
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
        
        <table id="tableEntregas" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
            <thead>

                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Nº</th>
                    <th>Nombre y Apellido</th>
                    <th>Cédula</th>
                    <th>Poligonal</th>
                    <th>Beneficio Entregado</th>
                    <th>N° Referencia</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                
                include('../../includes/conn.php');

                $sql = "SELECT e.id as id_entrega,
                               h.nombres as nombres, 
                               h.apellidos as apellidos,
                               h.cedula as cedula,
                               p.nombre as nombre,
                               tp.nombre_beneficio as nombre_beneficio,
                               e.nro_pago as nro_pago
                        FROM entrega_beneficio AS e 
                        INNER JOIN habitantes AS h ON e.id_jefe_familia = h.id_habitante
                        INNER JOIN poligonal AS p ON h.id_poligonal = p.id
                        INNER JOIN tipo_beneficio AS tp ON e.id_beneficio = tp.id WHERE tp.especial = 2;";

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $i=1;

                foreach ($result as $entregas) {
                
                    echo "<tr>";
                    echo "<td class='mdl-data-table__cell--non-numeric'>".$i."</td>";
                    echo "<td>".$entregas['nombres'] . " " . $entregas['apellidos'] ."</td>";
                    echo "<td>".$entregas['cedula']."</td>";
                    echo "<td>".$entregas['nombre']."</td>";
                    echo "<td>".$entregas['nombre_beneficio']."</td>";
                    echo "<td>".$entregas['nro_pago']."</td>";
                    // echo '<td><div class="btn-group"><a class="btn btn-primary" onclick="modalEditEntrega('. $entregas['id_entrega'] .')"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-primary" href="#"><i class="bi bi-trash fs-5"></i></a></div>' ."</td>";
                    echo "</tr>";
                    $i++;

                }

                ?>
                
            </tbody>
        </table>
    </div>
</div>