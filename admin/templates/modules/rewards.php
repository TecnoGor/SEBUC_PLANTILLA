<div class="mdl-grid">

    <div class="tile-title-w-btn">
        <p><a class="btn btn-primary icon-btn" onclick="modalRegEntrega()"><i class="bi bi-plus-square m-2"></i>Entregar Beneficio</a></p>
    </div>
    
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
        
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
            <thead>
                <!-- <tr>
                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                    <th>Code</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr> -->

                

                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Nº</th>
                    <th>Nombre y Apellido</th>
                    <th>Cedula</th>
                    <th>Poligonal</th>
                    <th>Beneficio Entregado</th>
                    <th>N° Referencia</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td class="mdl-data-table__cell--non-numeric">Product Name</td>
                    <td>Product Code</td>
                    <td>7</td>
                    <td>$77</td>
                    <td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
                </tr> -->

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
                        INNER JOIN tipo_beneficio AS tp ON e.id_beneficio = tp.id;";

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