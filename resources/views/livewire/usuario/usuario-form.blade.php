<div class="p-3">
  <form>
    <div class="col-6">
      <div class="form-group">
        <label for="primer-nombre-usuario" class="form-control-label">Primer Nombre</label>
        <input class="form-control" type="text" placeholder="Juan" id="primer-nombre-usuario"
          wire:model.live="usuario.primer_nombre" maxlength="50">
      </div>
      <span>
        @error('usuario.primer_nombre')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="segundo-nombre-usuario" class="form-control-label">Segundo Nombre</label>
        <input class="form-control" type="text" placeholder="Carlos" id="segundo-nombre-usuario"
          wire:model.live="usuario.segundo_nombre" maxlength="50">
      </div>
      <span>
        @error('usuario.segundo_nombre')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="primer-apellido-usuario" class="form-control-label">Primer Apellido</label>
        <input class="form-control" type="text" placeholder="Pérez" id="primer-apellido-usuario"
          wire:model.live="usuario.primer_apellido" maxlength="50">
      </div>
      <span>
        @error('usuario.primer_apellido')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="segundo-apellido-usuario" class="form-control-label">Segundo Apellido</label>
        <input class="form-control" type="text" placeholder="García" id="segundo-apellido-usuario"
          wire:model.live="usuario.segundo_apellido" maxlength="50">
      </div>
      <span>
        @error('usuario.segundo_apellido')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="tipo-usuario" class="form-control-label">Tipo</label>
        <input class="form-control" type="text" placeholder="Docente" id="tipo-usuario"
          wire:model.live="usuario.tipo" maxlength="50">
      </div>
      <span>
        @error('usuario.tipo')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
  </form>
</div>
