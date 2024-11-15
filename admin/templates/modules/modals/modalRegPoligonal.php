<div class="modal fade" id="modalRegPoligonal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-secondary bg-gradient">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Registrar una Nueva Poligonal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterEntrega"></div>
        <form method="POST" action="">
            <p id="errorDisplay"></p>
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="namePoligonalReg">Nombre de Poligonal</label>
                        <input class="form-control" type="text" id="namePoligonalReg">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="comunidad">Comunidad</label>
                        <select class="form-control" name="comunidad" id="comunidad">
                            <option disabled selected>Seleccione...</option>
                            <?php
                                
                                $sqlAddPoligonal = "SELECT * FROM comunidad";
                                $stmtAdd = $conn->prepare($sqlAddPoligonal);
                                $stmtAdd->execute();

                                $resultAdd = $stmtAdd->fetchAll(PDO::FETCH_ASSOC);

                                foreach($resultAdd as $comunidad) {
                                                    
                            ?>

                            <option value="<?php echo $comunidad['id_comunidad'];?>"><?php echo $comunidad['nombreComunidad'];?></option>
                            
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
        <button class="btn btn-primary" onclick="regPoligonal()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Registrar</button>
      </div>
    </div>
  </div>
</div>