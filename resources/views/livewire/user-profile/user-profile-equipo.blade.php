<div class="card">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">{{ __('Asignar Equipos/Asignaturas') }}</h6>
  </div>
  <div class="card-body pt-4 p-3">
    @if ($mensaje_exito)
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $mensaje_exito }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if ($mensaje_error)
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $mensaje_error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form wire:submit.prevent="guardarAsignatura">
      <div class="mb-3">
        <label for="asignatura_seleccionada" class="form-label">{{ __('Seleccionar Asignatura') }}</label>
        <select class="form-select @error('asignatura_seleccionada') is-invalid @enderror" id="asignatura_seleccionada"
          wire:model="asignatura_seleccionada">
          <option value="">{{ __('-- Selecciona una asignatura --') }}</option>
          @foreach ($asignaturas as $asignatura)
            <option value="{{ $asignatura->id_asignatura }}">
              {{ $asignatura->codigo }} - {{ $asignatura->descripcion }}
            </option>
          @endforeach
        </select>
        @error('asignatura_seleccionada')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">
        {{ __('Asignar Asignatura') }}
      </button>
    </form>

    <hr class="my-4">

    <h6 class="mt-4">{{ __('Asignaturas Asignadas') }}</h6>
    @if ($usuario->asignaturasAsignadas && count($usuario->asignaturasAsignadas) > 0)
      <div class="table-responsive">
        <table class="table table-sm table-striped">
          <thead>
            <tr>
              <th>{{ __('Código') }}</th>
              <th>{{ __('Descripción') }}</th>
              <th>{{ __('Semestre') }}</th>
              <th>{{ __('Acciones') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usuario->asignaturasAsignadas as $asignatura)
              <tr>
                <td>{{ $asignatura->codigo }}</td>
                <td>{{ $asignatura->descripcion }}</td>
                <td>{{ $asignatura->semestre }}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-danger"
                    wire:click="eliminarAsignatura({{ $asignatura->id_asignatura }})"
                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta asignatura?')">
                    {{ __('Eliminar') }}
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div class="alert alert-info" role="alert">
        <p class="mb-0">{{ __('No hay asignaturas asignadas en este momento.') }}</p>
      </div>
    @endif
  </div>
</div>
