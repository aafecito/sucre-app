<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use App\Models\Usuario as Usuarios;
use Livewire\Attributes\On;

class Usuario extends Component
{
	public $pag = "grid";
	public $usuarios;

	#[On('usuario-deleted')]
	public function mount()
	{
		$this->cargarUsuarios();
	}


	public function cargarUsuarios()
	{
		$this->usuarios = Usuarios::all();
	}

	public function cargarForm()
	{
		$this->pag = "form";
		$this->dispatch('reset-formulario')->to(UsuarioForm::class);
	}

	#[On('usuario-guardada')]
	public function cargarGrid()
	{
		$this->pag = "grid";
		$this->cargarUsuarios();
	}

	public function guardarUsuario()
	{
		$this->dispatch('guardar-usuario')->to(UsuarioForm::class);
	}
}
