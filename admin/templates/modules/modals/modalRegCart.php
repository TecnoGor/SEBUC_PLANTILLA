<div class="modal fade" id="modalResidence" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-gradient">
      <div class="modal-header bg-info bg-gradient bg-opacity-25">
        <h5 class="modal-title" id="exampleModalLabel"> Crear Carta de Residencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterEntrega"></div>
        <form method="POST" action="">
            <p id="errorDisplay"></p>
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="cedulaHabitanteC">Buscar Habitante</label>
                        <input class="form-control" type="number" onblur="valHabitante()" placeholder="Ingrese la Cédula del Habitante" id="cedulaHabitanteC">
                    </div>
                    
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="cedulaHabitanteC">Nacionalidad</label>
                        <input class="form-control" disabled type="text" id="nacionalidadHabitanteC">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="beneficio_id">Nombres</label>
                        <input class="form-control" type="text" disabled id="nombreHC">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="beneficio_id">Apellidos</label>
                        <input class="form-control" type="text" disabled id="apellidoHC">
                    </div>

                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="beneficio_id">Poligonal</label>
                        <input class="form-control" type="text" disabled id="poligonalHC">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="beneficio_id">¿Tiempo de Residencia?</label>
                        <input class="form-control" type="number" disabled id="timeRes">
                    </div>
                </div>


            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="valHabitante()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Buscar</button>
        <button class="btn btn-primary" onclick="downloadCarta()" type="button"><i class="bi bi-file-earmark-arrow-down"></i>Descargar Carta</button>
      </div>
    </div>
  </div>
</div>