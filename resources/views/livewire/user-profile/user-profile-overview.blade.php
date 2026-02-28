<div class="card">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">{{ __('Información del Perfil') }}</h6>
  </div>
  <div class="card-body pt-4 p-3">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="usuario-primer_nombre" class="form-control-label">{{ __('Primer Nombre') }}</label>
          <div class="@error('usuario.primer_nombre')border border-danger rounded-3 @enderror">
            <input wire:model.live="usuario.primer_nombre" class="form-control" type="text"
              placeholder="Primer nombre" id="usuario-primer_nombre">
          </div>
          @error('usuario.primer_nombre')
            <div class="text-danger text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="usuario-primer_apellido" class="form-control-label">{{ __('Primer Apellido') }}</label>
          <div class="@error('usuario.primer_apellido')border border-danger rounded-3 @enderror">
            <input wire:model.live="usuario.primer_apellido" class="form-control" type="text"
              placeholder="Primer apellido" id="usuario-primer_apellido">
          </div>
          @error('usuario.primer_apellido')
            <div class="text-danger text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="usuario-segundo_nombre" class="form-control-label">{{ __('Segundo Nombre') }}</label>
          <div class="@error('usuario.segundo_nombre')border border-danger rounded-3 @enderror">
            <input wire:model.live="usuario.segundo_nombre" class="form-control" type="text"
              placeholder="Segundo nombre (opcional)" id="usuario-segundo_nombre">
          </div>
          @error('usuario.segundo_nombre')
            <div class="text-danger text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="usuario-segundo_apellido" class="form-control-label">{{ __('Segundo Apellido') }}</label>
          <div class="@error('usuario.segundo_apellido') border border-danger rounded-3 @enderror">
            <input wire:model.live="usuario.segundo_apellido" class="form-control" type="text"
              placeholder="Segundo apellido (opcional)" id="usuario-segundo_apellido">
          </div>
          @error('usuario.segundo_apellido')
            <div class="text-danger text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end gap-2 mt-4">
      <button type="button" class="btn bg-gradient-dark btn-md" @click="$wire.guardar()">
        {{ __('Guardar Cambios') }}
      </button>
    </div>

    <hr class="my-4">
  </div>
</div>
