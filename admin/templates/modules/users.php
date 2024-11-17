<h2 class="text-center" style="font-family: 'OswaldLight';">LISTA DE USUARIOS</h2><hr>

<div class="mdl-grid">

    <div class="tile-title-w-btn">
        <p><a class="btn btn-primary icon-btn" onclick="modalRegUser()"><i class="bi bi-plus-square m-2"></i>Añadir Usuario</a></p>
    </div>
    
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
        
    
    
        
        <table id="tableUsers" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
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
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
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

                $sql = "SELECT * FROM usuarios as u INNER JOIN rol as r ON u.rol = r.id_rol";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($result as $tabla){
                    if ($tabla['activo'] == 1) {
                        echo "<tr>";
                        echo "<td class='mdl-data-table__cell--non-numeric'>".$tabla['id']."</td>";
                        echo "<td>".$tabla['nombres']."</td>";
                        echo "<td>".$tabla['user']."</td>";
                        echo "<td>".$tabla['nombre_rol']."</td>";
                        echo "<td>Activo</td>";
                        echo '<td><div class="btn-group"><a class="btn btn-primary" onclick="modalEditUser('. $tabla['id'] .')"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-primary" onclick="disableUserSelect('. $tabla['id'] .')"><i class="bi bi-trash fs-5"></i></a></div>' ."</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr>";
                        echo "<td class='mdl-data-table__cell--non-numeric'>".$tabla['id']."</td>";
                        echo "<td>".$tabla['nombres']."</td>";
                        echo "<td>".$tabla['user']."</td>";
                        echo "<td>".$tabla['nombre_rol']."</td>";
                        echo "<td>Inactivo</td>";
                        echo '<td><div class="btn-group"><a class="btn btn-primary" onclick="modalEditUser('. $tabla['id'] .')"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-primary" onclick="disableUserSelect('. $tabla['id'] .')"><i class="bi bi-trash fs-5"></i></a></div>' ."</td>";
                        echo "</tr>";
                    }

                }

                ?>
                
            </tbody>
        </table>
    </div>
</div>