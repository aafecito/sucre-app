<div>
  <div class="col-5 mb-3">
    <div class="input-group">
      <span class="input-group-text text-body" style="padding-right: 5px"><i class="fas fa-search"
          aria-hidden="true"></i></span>
      <input type="text" class="form-control" placeholder="Type here..." wire:model.live="search">
    </div>
  </div>
  <div class="card me-3">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center"
              style="padding:0">
              ID
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Nombre
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Código
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Semestres
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Sede
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Estado
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Acciones
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse ($carreras as $carrera)
            <tr>
              <td>
                {{ $carrera->id_carrera }}
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $carrera->id_carrera)
                  <input type="text" class="form-control" wire:model="carrerasEditing.descripcion">
                @else
                  {{ $carrera->descripcion }}
                @endif
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $carrera->id_carrera)
                  <input type="text" class="form-control" wire:model="carrerasEditing.codigo">
                @else
                  {{ $carrera->codigo }}
                @endif
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $carrera->id_carrera)
                  <input type="number" class="form-control" wire:model="carrerasEditing.semestres">
                @else
                  {{ $carrera->semestres }}
                @endif
              </td>
              <td class="align-middle text-center">
                {{ $carrera->sede->descripcion ?? 'N/A' }}
              </td>
              <td class="align-middle text-center">
                {{ $carrera->estado }}
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $carrera->id_carrera)
                  <button class="btn btn-success" wire:click="update()" style="padding: 8px 8px">
                    <i class="fas fa-save"></i>
                  </button>
                  <button wire:click="cancelEditing" class="btn btn-danger" style="padding: 8px 8px">
                    <i class="fas fa-times"></i>
                  </button>
                @else
                  <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placemant="top" title="Editar"
                    wire:click="editing({{ $carrera }})" style="padding: 8px 8px">
                    <i class="fas fa-pencil"></i>
                  </button>
                  <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placemant="top" title="Eliminar"
                    wire:click="delete({{ $carrera->id_carrera }})"
                    wire:confirm="Are you sure you want to delete this post?" style="padding: 8px 8px">
                    <i class="fas fa-trash"></i>
                  </button>
                @endif
              </td>
            </tr>
          @empty
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-3 px-3">
    {{ $carreras->links() }}
  </div>
</div>
