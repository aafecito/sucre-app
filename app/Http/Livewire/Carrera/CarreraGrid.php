<?php

namespace App\Http\Livewire\Carrera;

use Livewire\Component;
use App\Models\Carrera;
use Livewire\WithPagination;
use Livewire\Attributes\On;


class CarreraGrid extends Component
{
    use WithPagination;
    public $editingId = 0;
    public $carrerasEditing;
    public $search = '';

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.carrera.carrera-grid', [
            'carreras' => Carrera::activas()
                ->where(function ($query) {
                    $query->where('descripcion', 'like', '%' . $this->search . '%')
                        ->orWhere('codigo', 'like', '%' . $this->search . '%');
                })
                ->orderBy('id_carrera', 'desc')
                ->paginate(10),
        ]);
    }

    public function editing($carrera)
    {
        $this->carrerasEditing = $carrera;
        $this->editingId = $carrera['id_carrera'];
    }

    public function cancelEditing()
    {
        $this->editingId = 0;
    }

    #[On('carrera-guardada')]
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function update()
    {
        $carrera = Carrera::findOrFail($this->editingId);

        $carrera->fill($this->carrerasEditing);
        $carrera->save();

        $this->editingId = 0;
        $this->dispatch('notify', type: 'success', message: 'Carrera editada exitosamente');
    }

    public function delete($id)
    {
        if (!$id) {
            return;
        }

        $carrera = Carrera::findOrFail($id);
        $carrera->update(['estado' => 0]);
        $this->dispatch('notify', type: 'success', message: 'Carrera eliminada exitosamente');
    }
}
