<div class="ms-3">
  <!-- Botones -->
  <div class="d-flex mx-2" x-data="{ pag: @entangle('pag') }">
    <button x-show="pag === 'grid' ? true : false" x-on:click="$wire.cargarForm()" type="button" class="btn btn-info">Nueva
      carrera</button>
    <button x-show="pag === 'form' ? true : false" @click="pag = 'grid'" type="button"
      class="btn btn-info">Volver</button>
    <button x-show="pag === 'form' ? true : false" x-on:click="$wire.guardarCarrera()" type="button"
      class="btn btn-success" wire:ignore>Guardar</button>
  </div>
  <!-- Paginas -->
  <div x-data="{ pag: @entangle('pag') }">
    <div x-show="pag == 'form'">
      <livewire:carrera.carrera-form />
    </div>
    <div x-show="pag == 'grid'">
      <livewire:carrera.carrera-grid />
    </div>
  </div>
</div>
