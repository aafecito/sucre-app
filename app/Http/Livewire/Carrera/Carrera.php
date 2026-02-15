<?php

namespace App\Http\Livewire\Carrera;

use Livewire\Component;
use App\Models\Carrera as Carreras;
use Livewire\Attributes\On;

class Carrera extends Component
{
    public $pag = "grid";
    public $carreras;

    #[On('carrera-deleted')]
    public function mount()
    {
        $this->cargarCarreras();
    }


    public function cargarCarreras()
    {
        $this->carreras = Carreras::all();
    }

    public function cargarForm()
    {
        $this->pag = "form";
        $this->dispatch('reset-formulario')->to(CarreraForm::class);
    }

    #[On('carrera-guardada')]
    public function cargarGrid()
    {
        $this->pag = "grid";
        $this->cargarCarreras();
    }

    public function guardarCarrera()
    {
        $this->dispatch('guardar-carrera')->to(CarreraForm::class);
    }
}
