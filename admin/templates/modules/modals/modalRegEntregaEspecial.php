<div class="modal fade" id="modalRegEntregaEspecial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-gradient">
      <div class="modal-header bg-info bg-gradient bg-opacity-25">
        <h5 class="modal-title" id="exampleModalLabel"> Registrar un Nueva Entrega Especial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterEntrega"></div>
        <form method="POST" action="">
            <p id="errorDisplay"></p>
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="cedulaJefeEspecial">Cedula de Jefe de Familia</label>
                        <input class="form-control" type="number" onblur="valJefeEspecial()" id="cedulaJefeEspecial">
                    </div>
                    
                    <div class="mb-3 col-md-4">
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

                    <div class="mb-3 col-md-4">
                      <label for="bancoRegEspecial" class="form-label">Seleccione el banco</label>
                      <select class="form-control" name="bancoEntregaRegEspecial" id="bancoEntregaRegEspecial">
                        <option disabled selected>Seleccione...</option>
                        <option value="1">Banco de Venezuela</option>
                        <option value="2">100% Banco</option>
                        <option value="3">Bancamiga</option>
                        <option value="4">Bancaribe</option>
                        <option value="5">Banco Activo</option>
                        <option value="6">Banco Agricola de Venezuela</option>
                        <option value="7">Banco Bicentenario el Pueblo</option>
                        <option value="8">Banco Caroní</option>
                        <option value="9">Banco del Tesoro</option>
                        <option value="10">Banco Exterior</option>
                        <option value="11">Banco Fondo Comun</option>
                        <option value="12">Banco Internacional de Desarrollo</option>
                        <option value="13">Banco Mercantil</option>
                        <option value="14">Banco Nacional de Credito</option>
                        <option value="15">Banco Plaza</option>
                        <option value="16">Banco Sofitasa</option>
                        <option value="17">Banco Venezolano de Credito</option>
                        <option value="18">Bancrecer</option>
                        <option value="19">Banesco</option>
                        <option value="20">Banfanb</option>
                        <option value="21">Bangente</option>
                        <option value="22">Banplus</option>
                        <option value="23">BBVA Provincial</option>
                        <option value="24">DelSur Banco Universal</option>
                        <option value="25">Mi Banco</option>
                        <option value="26">N58 Banco Digital Banco Microfinanciero SA</option>
                      </select>
                    </div>

                </div>

                <div class="row">
                    <div class="mb-3 col-md-3">
                      <label for="">Método de Pago</label>
                      <select name="methodPagoEspecial" id="methodPagoEspecial" class="form-control">
                        <!-- <option value="1">Efectivo</option> -->
                        <option value="2">Transferencia</option>
                        <option value="3">Pago Movil</option>
                        <option value="4">BioPago</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="nroReferenciaEspecial">Numero de Pago:</label>
                        <input class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" id="nroReferenciaEspecial">
                    </div>
                    <div class="mb-3 col-md-3">
                      <label for="dtPagoEspecial" class="form-label">Fecha de Pago:</label>
                      <input type="date" name="dtPagoEspecial" id="dtPagoEspecial" class="form-control">
                    </div>
                    <div class="mb-3 col-md-3">
                      <label for="montoEntregaEspecial" class="form-label">Monto</label>
                      <input type="number" class="form-control" placeholder="0,00 Bs." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" id="montoEntregaEspecial">
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