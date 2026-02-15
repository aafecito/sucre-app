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
              Primer Nombre
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Primer Apellido
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Segundo Apellido
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
              Tipo
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
          @forelse ($usuarios as $usuario)
            <tr>
              <td>
                {{ $usuario->id_usuario }}
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $usuario->id_usuario)
                  <input type="text" class="form-control" wire:model="usuariosEditing.primer_nombre">
                @else
                  {{ $usuario->primer_nombre }}
                @endif
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $usuario->id_usuario)
                  <input type="text" class="form-control" wire:model="usuariosEditing.primer_apellido">
                @else
                  {{ $usuario->primer_apellido }}
                @endif
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $usuario->id_usuario)
                  <input type="text" class="form-control" wire:model="usuariosEditing.segundo_apellido">
                @else
                  {{ $usuario->segundo_apellido }}
                @endif
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $usuario->id_usuario)
                  <input type="text" class="form-control" wire:model="usuariosEditing.tipo">
                @else
                  {{ $usuario->tipo }}
                @endif
              </td>
              <td class="align-middle text-center">
                {{ $usuario->estado }}
              </td>
              <td class="align-middle text-center">
                @if ($editingId === $usuario->id_usuario)
                  <button class="btn btn-success" wire:click="update()" style="padding: 8px 8px">
                    <i class="fas fa-save"></i>
                  </button>
                  <button wire:click="cancelEditing" class="btn btn-danger" style="padding: 8px 8px">
                    <i class="fas fa-times"></i>
                  </button>
                @else
                  <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placemant="top" title="Editar"
                    wire:click="editing({{ $usuario }})" style="padding: 8px 8px">
                    <i class="fas fa-pencil"></i>
                  </button>
                  <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placemant="top" title="Eliminar"
                    wire:click="delete({{ $usuario->id_usuario }})"
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
    {{ $usuarios->links() }}
  </div>
</div>
