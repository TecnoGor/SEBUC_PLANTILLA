<div class="modal fade" id="modalRegEntregaEspecial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-secondary bg-gradient">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Registrar un Nueva Entrega Especial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterEntrega"></div>
        <form method="POST" action="">
            <p id="errorDisplay"></p>
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="cedulaJefeEspecial">Cedula de Jefe de Familia</label>
                        <input class="form-control" type="number" onblur="valJefeEspecial()" id="cedulaJefeEspecial">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="beneficio_idEspecial">Beneficios</label>
                        <select class="form-control" name="beneficio_idEspecial" id="beneficio_idEspecial">
                            <option disabled selected>Seleccione...</option>
                                <?php
                                    include('includes/conn.php');
                                    $sqlRwE = "SELECT * FROM tipo_beneficio WHERE estatus = 1 AND especial = 1;";
                                    $stmtRwE = $conn->prepare($sqlRwE);
                                    $stmtRwE->execute();

                                    $resultRwE = $stmtRwE->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($resultRwE as $beneficioE){
                                ?>
                            
                            <option value="<?php echo $beneficioE['id'];?>"><?php echo $beneficioE['nombre_beneficio'];?></option>

                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    

                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="nroReferenciaEspecial">Numero de Pago:</label>
                        <input class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" id="nroReferenciaEspecial">
                    </div>
                </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="regRewardEspecial()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Entregar</button>
      </div>
    </div>
  </div>
</div>