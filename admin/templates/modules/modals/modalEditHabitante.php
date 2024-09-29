<div class="modal fade" id="modalEditHabitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
            <div class="container">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Nombres</label>
                        <input class="form-control" type="text" name="nameUserEdit" id="nameHabitanteEdit" placeholder="Introduce tu Nombre y Apellido">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Apellidos</label>
                        <input class="form-control" type="text" name="name2UserEdit" id="name2HabitanteEdit" placeholder="Introduce tu Nombre y Apellido">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Cedula</label>
                        <input type="number" name="cedulaHabitanteEdit" id="cedulaHabitanteEdit" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="rolEdit">Rol</label>
                <select class="form-control" name="rolEdit" id="rolEdit">
                    <option value="1">Administrador</option>
                    <option value="2">Escuela</option>
                    <option value="4">Profesor</option>
                    <option value="3">Técnico</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="estadoEdit">Estado</label>
                <select class="form-control" name="estadoEdit" id="estadoEdit">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>