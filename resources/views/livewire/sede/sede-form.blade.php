<div class="p-3">
  <form>
    <div class="col-6">
      <div class="form-group">
        <label for="nombre-sede" class="form-control-label">Nombre</label>
        <input class="form-control" type="text" placeholder="Sede Sur" id="nombre-sede" wire:model.live="sede.descripcion"
          maxlength="25">
      </div>
      <span>
        @error('sede.descripcion')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="codigo-sede" class="form-control-label">Código</label>
        <input class="form-control" type="text" placeholder="SUR-01" id="codigo-sede" wire:model.live="sede.codigo"
          maxlength="10">
      </div>
      <span>
        @error('sede.codigo')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="direccion-sede">Direccion</label>
        <textarea class="form-control" id="direccion-sede" rows="2" wire:model.live="sede.direccion" maxlength="500"></textarea>
      </div>
      <span>
        @error('sede.direccion')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="telefono-sede" class="form-control-label">Teléfono</label>
        <input class="form-control" type="text" placeholder="02-1234567" id="telefono-sede"
          wire:model.live="sede.telefono" maxlength="10">
      </div>
      <span>
        @error('sede.telefono')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
  </form>
  <script>
    window.addEventListener('console-log', event => {
      console.log(event.detail.message);
      console.log(event.detail.data);
    });
  </script>
</div>
