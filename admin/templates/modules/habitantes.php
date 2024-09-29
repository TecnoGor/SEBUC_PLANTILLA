<div class="mdl-grid">
    
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
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cedula</th>
                    <th>Sexo</th>
                    <th>Nacionalidad</th>
                    <th>Estado Civil</th>
                    <!-- <th>Fecha de Nac.</th> -->
                    <th>Tipo de Habitante</th>
                    <th>Tlfno / Celular</th>
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
                
                include('../../includes/clSystem.php');

                $objList = new pSystem();

                $listado = $objList->list();

                $i = 0;
                $j=1;

                while ($i<count($listado)){
                    echo "<tr>";
                    echo '<td class="mdl-data-table__cell--non-numeric">' . $j . "</td>";
                    echo "<td>" . $listado[$i]->nom . "</td>";
                    echo "<td>" . $listado[$i]->snom . "</td>";
                    echo "<td>" . $listado[$i]->ced . "</td>";
                    echo "<td>" . $listado[$i]->sex . "</td>";
                    echo "<td>" . $listado[$i]->nacionalidad . "</td>";
                    echo "<td>" . $listado[$i]->e_civil . "</td>";
                    // echo "<td>" . $listado[$i]->fnac . "</td>";
                    echo "<td>" . $listado[$i]->tipo_habitante . "</td>";
                    echo "<td>" . $listado[$i]->cel . "</td>";
                    echo '<td><div class="btn-group"><a class="btn btn-primary"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-primary" href="#"><i class="bi bi-trash fs-5"></i></a></div>' ."</td>";
                    // echo "<td>" . '<a href="actualizar.php?upd=' . $listado[$i]->id_cl . '" class="boton_edit" title="Editar Habitante"><img src="../fontawesome/svgs/regular/pen-to-square.svg" class="icon_edit"></a>' . "</td>";
                    echo "</tr>";
                    $i++;
                    $j++;
                }
                
                ?>
                
            </tbody>
        </table>
    </div>
</div>