<div class="p-3">
  <form>
    <div class="col-6">
      <div class="form-group">
        <label for="nombre-carrera" class="form-control-label">Nombre</label>
        <input class="form-control" type="text" placeholder="Ingeniería en Sistemas" id="nombre-carrera"
          wire:model.live="carrera.descripcion" maxlength="100">
      </div>
      <span>
        @error('carrera.descripcion')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="codigo-carrera" class="form-control-label">Código</label>
        <input class="form-control" type="text" placeholder="ING-SIS" id="codigo-carrera"
          wire:model.live="carrera.codigo" maxlength="10">
      </div>
      <span>
        @error('carrera.codigo')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="semestres-carrera" class="form-control-label">Semestres</label>
        <input class="form-control" type="number" placeholder="8" id="semestres-carrera"
          wire:model.live="carrera.semestres" min="1">
      </div>
      <span>
        @error('carrera.semestres')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="sede-carrera" class="form-control-label">Sede</label>
        <select class="form-control" id="sede-carrera" wire:model.live="carrera.id_sede">
          <option value="">Seleccionar una sede</option>
          @foreach ($sedes as $sede)
            <option value="{{ $sede->id_sede }}">{{ $sede->descripcion }}</option>
          @endforeach
        </select>
      </div>
      <span>
        @error('carrera.id_sede')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
  </form>
</div>
