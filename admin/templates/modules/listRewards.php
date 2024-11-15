<h2 class="text-center" style="font-family: 'OswaldLight';">BENEFICIOS</h2><hr>

<div class="mdl-grid">

    <div class="tile-title-w-btn">
        <p><a class="btn btn-primary icon-btn" onclick="modalRegReward()"><i class="bi bi-plus-square m-2"></i>Registrar Beneficio</a></p>
    </div>
    
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
        
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
            <thead>

                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Estatus</th>
                    <th>¿Jornada Especial?</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                include('../../includes/conn.php');

                $sql = "SELECT tb.id, tb.nombre_beneficio, e.nombre_estatus, tb.especial FROM tipo_beneficio AS tb
						INNER JOIN estatus AS e ON e.id_estatus = tb.estatus;";

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $i=1;

                foreach ($result as $entregas) {
                
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>" . $entregas['nombre_beneficio'] . "</td>";
                    echo "<td>" . $entregas['nombre_estatus'] . "</td>";
					if ($entregas['especial'] == 1) {
						echo "<td>". "Si" ."</td>";
					}elseif ($entregas['especial'] == 2){
						echo "<td>". "No" ."</td>";
					}
                    echo '<td><div class="btn-group"><a class="btn btn-primary" onclick="modalEditBeneficio('. $entregas['id'] .')"><i class="bi bi-pencil-square fs-5"></i></a></div>' ."</td>";
                    echo "</tr>";
                    // <a class="btn btn-primary" onclick="delReward('. $entregas['id'] .')"><i class="bi bi-trash fs-5"></i></a>
                    $i++;

                }

                ?>
                
            </tbody>
        </table>
    </div>
</div>