<?php

namespace App\Http\Livewire\Asignatura;

use Livewire\Component;
use App\Models\Asignatura as Asignaturas;
use Livewire\Attributes\On;

class Asignatura extends Component
{
	public $pag = "grid";
	public $asignaturas;

	#[On('asignatura-deleted')]
	public function mount()
	{
		$this->cargarAsignaturas();
	}


	public function cargarAsignaturas()
	{
		$this->asignaturas = Asignaturas::all();
	}

	public function cargarForm()
	{
		$this->pag = "form";
		$this->dispatch('reset-formulario')->to(AsignaturaForm::class);
	}

	#[On('asignatura-guardada')]
	public function cargarGrid()
	{
		$this->pag = "grid";
		$this->cargarAsignaturas();
	}

	public function guardarAsignatura()
	{
		$this->dispatch('guardar-asignatura')->to(AsignaturaForm::class);
	}
}
