<div class="p-3">
  <form>
    <div class="col-6">
      <div class="form-group">
        <label for="nombre-asignatura" class="form-control-label">Nombre</label>
        <input class="form-control" type="text" placeholder="Programación I" id="nombre-asignatura"
          wire:model.live="asignatura.descripcion" maxlength="100">
      </div>
      <span>
        @error('asignatura.descripcion')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="codigo-asignatura" class="form-control-label">Código</label>
        <input class="form-control" type="text" placeholder="PROG-1" id="codigo-asignatura"
          wire:model.live="asignatura.codigo" maxlength="10">
      </div>
      <span>
        @error('asignatura.codigo')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="tipo-asignatura" class="form-control-label">Tipo</label>
        <input class="form-control" type="text" placeholder="Teoría" id="tipo-asignatura"
          wire:model.live="asignatura.tipo" maxlength="50">
      </div>
      <span>
        @error('asignatura.tipo')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="semestre-asignatura" class="form-control-label">Semestre</label>
        <input class="form-control" type="number" placeholder="1" id="semestre-asignatura"
          wire:model.live="asignatura.semestre" min="1">
      </div>
      <span>
        @error('asignatura.semestre')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="carrera-asignatura" class="form-control-label">Carrera</label>
        <select class="form-control" id="carrera-asignatura" wire:model.live="asignatura.id_carrera">
          <option value="">Seleccionar una carrera</option>
          @foreach ($carreras as $carrera)
            <option value="{{ $carrera->id_carrera }}">{{ $carrera->descripcion }}</option>
          @endforeach
        </select>
      </div>
      <span>
        @error('asignatura.id_carrera')
          <div style="color:red">
            {{ $message }}
          </div>
        @enderror
      </span>
    </div>
  </form>
</div>
