<div>
  {{-- <pre>
        {{ json_encode($sedes, JSON_PRETTY_PRINT) }}
    </pre> --}}
  {{-- <button type="button" class="btn btn-info m-3">Nueva sede</button> --}}
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
              Codigo
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Direccion
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Telefono
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
          @forelse ($sedes as $sede)
            <tr>
              <td>
                {{ $sede->id_sede }}
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $sede->id_sede)
                  <input type="text" class="form-control" wire:model="sedesEditing.descripcion">
                @else
                  {{ $sede->descripcion }}
                @endif
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $sede->id_sede)
                  <input type="text" class="form-control" wire:model="sedesEditing.codigo">
                @else
                  {{ $sede->codigo }}
                @endif
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $sede->id_sede)
                  <input type="text" class="form-control" wire:model="sedesEditing.direccion">
                @else
                  {{ $sede->direccion }}
                @endif
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $sede->id_sede)
                  <input type="text" class="form-control" wire:model="sedesEditing.telefono">
                @else
                  {{ $sede->telefono }}
                @endif
              </td>
              <td class="align-middle text-center">
                {{ $sede->estado }}
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $sede->id_sede)
                  <button class="btn btn-success" wire:click="update()" style="padding: 8px 8px">
                    <i class="fas fa-save"></i>
                  </button>
                  <button wire:click="cancelEditing" class="btn btn-danger" style="padding: 8px 8px">
                    <i class="fas fa-times"></i>
                  </button>
                @else
                  <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placemant="top" title="Editar"
                    wire:click="editing({{ $sede }})" style="padding: 8px 8px">
                    <i class="fas fa-pencil"></i>
                  </button>
                  <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placemant="top" title="Eliminar"
                    wire:click="delete({{ $sede->id_sede }})" wire:confirm="Are you sure you want to delete this post?"
                    style="padding: 8px 8px">
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
    {{ $sedes->links() }}
  </div>
</div>
