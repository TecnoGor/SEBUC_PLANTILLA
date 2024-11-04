<div class="modal fade" id="modalRegUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Registrar un Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="msjRegisterUser"></div>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="container" id="formContainer">
                <div class="row">
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Nombres y Apellidos</label>
                        <input class="form-control" type="text" name="nameUserReg" id="nameUserReg" placeholder="Introduce tu Nombre y Apellido">
                    </div>
                    
                </div>

                <div class="row">

                  <div class="mb-3">

                    <label for="formFile" class="form-label">Imagen de perfil</label>
                    <input class="form-control" type="file" name="pfImage" id="pfImage">

                  </div>

                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Usuario</label>
                        <input class="form-control" type="text" name="userReg" id="userReg" placeholder="Introduzca el usuario">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="password" name="psswdRedUser" id="psswdRegUser" class="form-control">
                    </div>

                </div>


                <div class="row">

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="rolRegUser">Rol</label>
                        <select class="form-control" name="rolRegUser" id="rolRegUser">
                            <option disabled selected> Seleccione ...</option>
                            <option value="1">Jefe de Comunidad</option>
                            <option value="2">Jefe de Calle</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="estadoRegUser">Estatus</label>
                        <select class="form-control" name="estadoRegUser" id="estadoRegUser">
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
        <button class="btn btn-primary" onclick="regUser()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Registrar</button>
      </div>
    </div>
  </div>
</div>