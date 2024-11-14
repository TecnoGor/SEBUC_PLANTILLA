<div class="modal fade" id="modalEditReward" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-secondary bg-gradient">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Editar Beneficio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterEntrega"></div>
        <form method="POST" id="modalEditBeneficio" action="">
        <input type="hidden" name="id" id="id">
            <p id="errorDisplay"></p>
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="nameBeneficioEdit">Nombre de Beneficio</label>
                        <input class="form-control" type="text" pattern="[a-zA-Z0-9]+" id="nameBeneficioEdit">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="estatusBeneficioEdit">Estatus</label>
                        <select class="form-control" name="estatusBeneficioEdit" id="estatusBeneficioEdit">
                            <option disabled selected>Seleccione...</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="especialBeneficioEdit">¿Es una jornada especial?</label>
                        <select class="form-control" name="especialBeneficioEdit" id="especialBeneficioEdit">
                            <option disabled selected>Seleccione...</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    
                </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="editBeneficio()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Editar</button>
      </div>
    </div>
  </div>
</div>
