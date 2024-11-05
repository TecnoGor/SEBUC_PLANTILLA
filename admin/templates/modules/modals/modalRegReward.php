<div class="modal fade" id="modalRegReward" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Registrar un Nuevo Beneficio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterEntrega"></div>
        <form method="POST" action="">
            <p id="errorDisplay"></p>
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="nameBeneficio">Nombre de Beneficio</label>
                        <input class="form-control" type="text" id="nameBeneficio">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="estatusBeneficio">Estatus</label>
                        <select class="form-control" name="estatusBeneficio" id="estatusBeneficio">
                            <option disabled selected>Seleccione...</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="especialBeneficio">¿Es una jornada especial?</label>
                        <select class="form-control" name="especialBeneficio" id="especialBeneficio">
                            <option disabled selected>Seleccione...</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    
                </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="regBeneficio()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Registrar</button>
      </div>
    </div>
  </div>
</div>