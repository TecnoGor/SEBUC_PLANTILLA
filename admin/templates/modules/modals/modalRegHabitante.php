<div class="modal fade" id="modalRegHabitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-secondary bg-gradient">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Registrar un Nuevo Habitante </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegister"></div>
        <form method="POST" action="">
            <div class="container" id="formContainer">

                <div class="row">
                    <div class="mb-3 col-md-4">

                        <label class="form-label">Cédula</label>
                        <input type="number" name="cedulaHabitanteReg" id="cedulaHabitanteReg" class="form-control">

                    </div>

                    <div class="mb-3 col-md-4">
                    
                        <label for="" class="form-label">Nacionalidad</label>
                        <div class="form-check">
                            <input class="form-check-input" value="Venezolano" type="radio" name="nacionalidadHabitanteReg" id="nacionalidadHabitanteReg">
                            <label class="form-check-label" for="nacionalidadHabitanteReg">
                                Venezolano
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="Extranjero" type="radio" name="nacionalidadHabitanteReg" id="nacionalidadHabitanteReg" checked>
                            <label class="form-check-label" for="nacionalidadHabitanteReg">
                                Extranjero
                            </label>
                        </div>

                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">Género</label>
                        <div class="form-check">
                            <input class="form-check-input" value="Masculino" type="radio" name="generoHabitanteReg" id="generoHabitanteReg1">
                            <label class="form-check-label" for="generoHabitanteReg">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="Femenino" type="radio" name="generoHabitanteReg" id="generoHabitanteReg2">
                            <label class="form-check-label" for="generoHabitanteReg">
                                Femenino
                            </label>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nombres</label>
                        <input class="form-control" type="text" name="nameHabitanteReg" id="nameHabitanteReg" placeholder="Introduzca los nombres del Habitante">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Apellidos</label>
                        <input class="form-control" type="text" name="name2HabitanteReg" id="name2HabitanteReg" placeholder="Introduzca los apellidos del Habitante">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">

                        <label class="form-label" for="tipoHabitanteReg">Tipo Habitante</label>
                        <select class="form-control" name="tipoHabitanteReg" onchange="jefeFamilia()" id="tipoHabitanteReg">
                            <option disabled selected>Seleccione...</option>
                            <option value="1">Jefe de Familia</option>
                            <option value="2">Integrante de Familia</option>
                        </select>

                    </div>    
                    <div class="mb-3 col-md-6">
                        <label for="idJefe" class="form-label">Jefe de Familia</label>
                        <input type="text" disabled class="form-control" id="idJefe" name="idJefe">
                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input class="form-control" type="date" name="dateHabitanteReg" id="dateHabitanteReg" placeholder="Introduce tu fecha de nacimiento">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Número Telefónico</label>
                        <input class="form-control" type="number" name="telHabitanteReg" id="telHabitanteReg" placeholder="Numero de celular">
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
                    <label for="" class="form-label">¿Posee Alguna discapacidad?</label>
                    <select name="discapacidad" id="discapacidad" class="form-control">
                        <option disabled selected> Seleccione ....</option>
                        <option value="Ninguna">Ninguna</option>
                        <option value="Discapacidades sensoriales y de la comunicación">Sensoriales y de la comunicación</option>
                        <option value="Discapacidades motrices">Motrices</option>
                        <option value="Discapacidades mentales">Mentales</option>
                        <option value="Discapacidades múltiples y otras">Múltiples y otras</option>
                    </select>
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
                
            </div>

            <div class="row" id="divSelectHabitante">

                <div class="mb-3 col-md-4">
                    <label class="form-label" for="poligonal_id">Poligonal</label>
                    <select class="form-control" name="poligonal_id" id="poligonal_id">
                        <option disabled selected>Seleccione...</option>
                        <option value="1">Oriental</option>
                        <option value="2">Carabobo</option>
                        <option value="3">Francisco Javier</option>
                        <option value="4">Principal</option>
                    </select>
                </div>
                
            </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" onclick="regHabitante()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Registrar</button>
      </div>
    </div>
  </div>
</div>