<div class="modal fade" id="modalRegEntrega" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-secondary bg-gradient">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Registrar un Nueva Entrega</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterEntrega"></div>
        <form method="POST" action="">
            <p id="errorDisplay"></p>
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="cedulaJefe">Cédula de Jefe de Familia</label>
                        <input class="form-control" type="number" onblur="valJefe()" id="cedulaJefe">
                    </div>
                    
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="beneficio_id">Beneficios</label>
                        <select class="form-control" name="beneficio_id" id="beneficio_id">
                            <option disabled selected>Seleccione...</option>
                                <?php
                                    include('includes/conn.php');
                                    $sqlRw = "SELECT * FROM tipo_beneficio WHERE estatus = 1 AND especial = 2;";
                                    $stmtRw = $conn->prepare($sqlRw);
                                    $stmtRw->execute();

                                    $resultRw = $stmtRw->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($resultRw as $beneficio){
                                ?>
                            
                            <option value="<?php echo $beneficio['id'];?>"><?php echo $beneficio['nombre_beneficio'];?></option>

                            <?php 
                                }
                            ?>
                        </select>
                    </div>

                </div>


                <div class="row">
                    <div class="mb-3 col-md-4">
                      <label for="">Método de Pago</label>
                      <select name="methodPago" id="methodPago" class="form-control">
                        <option value="1">Efectivo</option>
                        <option value="2">Transferencia</option>
                        <option value="3">Pago Movil</option>
                        <option value="4">BioPago</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="nroReferencia">Número de Pago:</label>
                        <input class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" id="nroReferencia">
                    </div>
                    <div class="mb-3 col-md-4">
                      <label for="montoEntrega" class="form-label">Monto</label>
                      <input type="float" class="form-control" placeholder="0,00 Bs." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" id="montoEntrega">
                    </div>
                </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="regReward()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Entregar</button>
      </div>
    </div>
  </div>
</div>