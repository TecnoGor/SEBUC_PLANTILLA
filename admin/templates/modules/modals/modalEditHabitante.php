<div class="modal fade" id="modalEditHabitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Editar Datos del Habitante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="msjEdit"></div>
        <form method="POST" action="">
            <input type="hidden" name="id" id="id">
            <div class="container">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nombres</label>
                        <input class="form-control" type="text" name="nameHabitanteEdit" id="nameHabitanteEdit" placeholder="Introduce tu Nombre y Apellido">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Apellidos</label>
                        <input class="form-control" type="text" name="name2HabitanteEdit" id="name2HabitanteEdit" placeholder="Introduce tu Nombre y Apellido">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Nacionalidad</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Venezolano" name="nacionalidadHabitanteEdit" id="nacionalidadHabitanteEdit" checked>
                            <label class="form-check-label" for="nacionalidadHabitanteEdit">
                                Venezolano
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Extranjero" name="nacionalidadHabitanteEdit" id="nacionalidadHabitanteEdit">
                            <label class="form-check-label" for="nacionalidadHabitanteEdit">
                                Extranjero
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Cedula</label>
                        <input type="number" name="cedulaHabitanteEdit" id="cedulaHabitanteEdit" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input class="form-control" type="date" name="dateHabitanteEdit" id="dateHabitanteEdit" placeholder="Introduce tu fecha de nacimiento">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Numero Telefonico</label>
                        <input class="form-control" type="tel" name="telefonoEdit" id="telefonoEdit" placeholder="Numero de celular">
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="edoCivilEdit">Estado Civil</label>
                        <select class="form-control" name="edoCivilEdit" id="edoCivilEdit">
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                            <option value="4">Divorciado</option>
                            <option value="3">Viudo</option>
                            <option value="3">Concubino</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row" id="rowContainerEdit">
            <div class="mb-3 col-md-4" id="radioDiscapacidad">
                    <label for="" class="form-label">Posee Alguna discapacidad?</label>
                    <select name="discapacidadEdit" id="discapacidadEdit" class="form-control">
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
                        <input class="form-check-input" type="radio" value="Si" name="radioHabitanteEdit2" id="radioHabitanteEdit2">
                        <label class="form-check-label" for="radioHabitanteEdit2">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="No" name="radioHabitanteEdit2" id="radioHabitanteEdit2">
                        <label class="form-check-label" for="radioHabitanteEdit2">
                            No
                        </label>
                    </div>
                </div>
                <div class="mb-3 col-md-4">

                    <label class="form-label" for="tipoHabitanteEdit">Tipo Habitante</label>
                    <select class="form-control" name="tipoHabitanteEdit" onchange="jefeFamiliaEdit()" id="tipoHabitanteEdit">
                        <option value="1">Jefe de Familia</option>
                        <option value="2">Integrante de Familia</option>
                    </select>
                </div>

                <div class="row" id="divSelectHabitanteEdit">

                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="poligonal_idEdit">Poligonal</label>
                        <select class="form-control" name="poligonal_idEdit" id="poligonal_idEdit">
                            <option disabled selected>Seleccione...</option>
                            <option value="1">Oriental</option>
                            <option value="2">Carabobo</option>
                            <option value="3">Francisco Javier</option>
                            <option value="4">Principal</option>
                        </select>
                    </div>
                
                </div>
            </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editHabitante()">Editar</button>
      </div>
    </div>
  </div>
</div>