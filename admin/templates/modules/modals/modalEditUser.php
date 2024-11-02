<div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Editar un Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjError"></div>
        <form method="POST" action="">
        <input type="hidden" name="id" id="id">
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Nombres y Apellidos</label>
                        <input class="form-control" type="text" name="nameUserEdit" id="nameUserEdit">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Usuario</label>
                        <input class="form-control" type="text" name="userEdit" id="userEdit">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="password" name="psswdRedUser" id="psswdEditUser" class="form-control">
                    </div>

                </div>


                <div class="row">

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="rolEditUser">Rol</label>
                        <select class="form-control" name="rolEditUser" id="rolEditUser">
                            <option disabled selected> Seleccione ...</option>
                            <option value="1">Jefe de Comunidad</option>
                            <option value="2">Jefe de Calle</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="estadoEditUser">Estatus</label>
                        <select class="form-control" name="estadoEditUser" id="estadoEditUser">
                            <option disabled selected> Seleccione ...</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>

                </div>

            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="editUser()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Editar</button>
      </div>
    </div>
  </div>
</div>