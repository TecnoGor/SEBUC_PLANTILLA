<div class="modal fade" id="modalRegHabitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Registrar un Nuevo Habitante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
            <div class="container" id="formContainer">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nombres</label>
                        <input class="form-control" type="text" name="nameHabitanteReg" id="nameHabitanteReg" placeholder="Introduce tu Nombre y Apellido">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Apellidos</label>
                        <input class="form-control" type="text" name="name2HabitanteReg" id="name2HabitanteReg" placeholder="Introduce tu Nombre y Apellido">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Nacionalidad</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nacionalidadHabitanteReg" id="nacionalidadHabitanteReg">
                            <label class="form-check-label" for="nacionalidadHabitanteReg">
                                Venezolano
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nacionalidadHabitanteReg" id="nacionalidadHabitanteReg" checked>
                            <label class="form-check-label" for="nacionalidadHabitanteReg">
                                Extranjero
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Cedula</label>
                        <input type="number" name="cedulaHabitanteReg" id="cedulaHabitanteReg" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input class="form-control" type="date" name="dateHabitanteReg" id="dateHabitanteReg" placeholder="Introduce tu fecha de nacimiento">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Numero Telefonico</label>
                        <input class="form-control" type="tel" name="telHabitanteReg" id="telHabitanteReg" placeholder="Numero de celular">
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="edoCivilReg">Estado Civil</label>
                        <select class="form-control" name="edoCivilReg" id="edoCivilReg">
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                            <option value="4">Divorciado</option>
                            <option value="3">Viudo</option>
                            <option value="3">Concubino</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row" id="rowContainer">
                <div class="mb-3 col-md-4" id="radioDiscapacidad">
                    <label for="" class="form-label">Posee Alguna discapacidad?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Si" name="radioHabitanteReg" id="radioHabitanteReg">
                        <label class="form-check-label" for="radioHabitanteReg">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="No" name="radioHabitanteReg" id="radioHabitanteReg" checked>
                        <label class="form-check-label" for="radioHabitanteReg">
                            No
                        </label>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="" class="form-label">Es Pensionado?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Si" name="radioHabitanteReg2" id="radioHabitanteReg2">
                        <label class="form-check-label" for="radioHabitanteReg2">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="No" name="radioHabitanteReg2" id="radioHabitanteReg2" checked>
                        <label class="form-check-label" for="radioHabitanteReg2">
                            No
                        </label>
                    </div>
                </div>
                <div class="mb-3 col-md-4">

                    <label class="form-label" for="tipoHabitanteReg">Tipo Habitante</label>
                    <select class="form-control" name="tipoHabitanteReg" onchange="jefeFamilia()" id="tipoHabitanteReg">
                        <option disabled selected>Seleccione...</option>
                        <option value="1">Jefe de Familia</option>
                        <option value="2">Integrante de Familia</option>
                    </select>
                </div>
            </div>

            <div class="row" id="divSelectHabitante">
                
            </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" onclick="addUser()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Registrar</button>
      </div>
    </div>
  </div>
</div>