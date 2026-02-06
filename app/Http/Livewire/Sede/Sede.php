<?php

namespace App\Http\Livewire\Sede;

use Livewire\Component;
use App\Models\Sede as Sedes;
use Livewire\Attributes\On;

class Sede extends Component
{
    public $pag = "grid";
    public $sedes;

    #[On('sede-deleted')]
    public function mount()
    {
        $this->cargarSedes();
    }


    public function cargarSedes()
    {
        $this->sedes = Sedes::all();
    }

    public function cargarForm()
    {
        //$this->dispatch('console-log', message: 'Reseteando formulario');
        $this->pag = "form";
        $this->dispatch('reset-formulario')->to(SedeForm::class);
    }

    #[On('sede-guardada')]
    public function cargarGrid()
    {
        $this->pag = "grid";
        $this->cargarSedes();
    }

    public function guardarSede()
    {
        $this->dispatch('guardar-sede')->to(SedeForm::class);
        //$this->dispatch('console-log', message: 'Evento enviado');
    }
}
