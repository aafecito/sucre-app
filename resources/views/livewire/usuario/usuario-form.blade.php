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
        <label for="tipo-usuario" class="form-control-label">Tipo de Usuario</label>
        <select class="form-control" id="tipo-usuario" wire:model.live="usuario.id_tipo_usuario">
          <option value="">Seleccionar tipo de usuario</option>
          @foreach ($tiposUsuario as $tipo)
            <option value="{{ $tipo->id_tipo_usuario }}">{{ $tipo->descripcion }}</option>
          @endforeach
        </select>
      </div>
      <span>
        @error('usuario.id_tipo_usuario')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
  </form>
</div>
