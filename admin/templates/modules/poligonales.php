<h2 class="text-center" style="font-family: 'OswaldLight';">LISTA DE POLIGONALES</h2><hr>

<div class="mdl-grid">

    <div class="tile-title-w-btn">
        <p><a class="btn btn-primary icon-btn" onclick="modalRegPoligonal()"><i class="bi bi-plus-square m-2"></i>Registrar Poligonal</a></p>
    </div>
    
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
        
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
            <thead>

                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Comunidad</th>
                    <th>Acciones</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
            <?php

                include('../../includes/conn.php');

                $sql = "SELECT * FROM poligonal AS p INNER JOIN comunidad AS c WHERE p.id_comunidad = c.id_comunidad";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $i = 1;

                foreach($result as $poligonal){

            ?>

                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $poligonal['nombre'];?></td>
                        <td><?php echo $poligonal['nombreComunidad'];?></td>
                        <?php echo '<td><div class="btn-group"><a class="btn btn-primary" onclick="modalEditPoligonal('. $poligonal['id'] .')"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-primary" onclick="delPoligonal('. $poligonal['id'] .')"><i class="bi bi-trash fs-5"></i></a></div>' ."</td>";?>
                    </tr>


            <?php
            
                }
            
            ?>
                
            </tbody>
        </table>
    </div>
</div>