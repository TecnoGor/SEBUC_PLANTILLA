<div class="modal fade" id="modalEditPoligonal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-secondary bg-gradient">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Editar Poligonal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterEntrega"></div>
        <form method="POST" action="">
            <p id="errorDisplay"></p>
            <input type="hidden" name="id_poligonal" id="id_poligonal">
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="namePoligonalEdit">Nombre de Poligonal</label>
                        <input class="form-control" type="text" id="namePoligonalEdit">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="comunidadEdit">Comunidad</label>
                        <select class="form-control" name="comunidadEdit" id="comunidadEdit">
                            <option disabled selected>Seleccione...</option>
                            <?php
                                
                                $sqlEditPoligonal = "SELECT * FROM comunidad";
                                $stmtEdit = $conn->prepare($sqlEditPoligonal);
                                $stmtEdit->execute();

                                $resultEdit = $stmtEdit->fetchAll(PDO::FETCH_ASSOC);

                                foreach($resultEdit as $comunidadEdit) {
                                                    
                            ?>

                            <option value="<?php echo $comunidadEdit['id_comunidad'];?>"><?php echo $comunidadEdit['nombreComunidad'];?></option>
                            
                            <?php

                                }
                            
                            ?>
                        </select>
                    </div>                    
                </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="editPoligonal()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Registrar</button>
      </div>
    </div>
  </div>
</div>