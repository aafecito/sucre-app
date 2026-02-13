<?php

namespace App\Http\Livewire\Sede;

use Livewire\Component;
use App\Models\Sede;
use Livewire\WithPagination;
use Livewire\Attributes\On;


class SedeGrid extends Component
{
    use WithPagination;
    public $editingId = 0;
    public $sedesEditing;
    public $blanco = 'ABC';

    public $search = '';

    protected $paginationTheme = 'bootstrap'; // Soft UI usa Bootstrap


    public function render()
    {
        $sedes = Sede::paginate(5);

        return view('livewire.sede.sede-grid', [
            'sedes' => Sede::activas()
                ->where(function ($query) {
                    $query->where('descripcion', 'like', '%' . $this->search . '%')
                        ->orWhere('codigo', 'like', '%' . $this->search . '%')
                        ->orWhere('direccion', 'like', '%' . $this->search . '%');
                })
                ->orderBy('id_sede', 'desc')
                ->paginate(10),
        ]);
    }

    public function editing($sede)
    {
        $this->sedesEditing = $sede;
        $this->editingId = $sede['id_sede'];

        //$this->dispatch('console-log', message: 'Hola desde Livewire', data: $this->editingId);
    }

    public function cancelEditing()
    {
        $this->editingId = 0;
    }

    #[On('sede-guardada')]
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function update()
    {

        $sede = Sede::findOrFail($this->editingId);

        $sede->fill($this->sedesEditing);
        $sede->save();

        //$this->dispatch('console-log', message: 'Hola desde Livewire', data: $this->sedesEditing);

        //$sede = new Sede();
        //Sede::where('id_sede', $this->editingId)->update($this->sedesEditing);

        $this->editingId = 0;
        $this->dispatch('notify', type: 'success', message: 'Sede editada exitosamente');
    }

    public function delete($id)
    {
        if (!$id) {
            return;
        }

        $sede = Sede::findOrFail($id);
        $sede->update(['estado' => 0]);
        $this->dispatch('notify', type: 'success', message: 'Sede eliminada exitosamente');
    }
    // public function render()
    // {
    //     return view('livewire.sede-grid');
    // }
}
