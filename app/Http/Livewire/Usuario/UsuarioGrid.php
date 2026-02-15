<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use App\Models\Usuario;
use Livewire\WithPagination;
use Livewire\Attributes\On;


class UsuarioGrid extends Component
{
	use WithPagination;
	public $editingId = 0;
	public $usuariosEditing;
	public $search = '';

	protected $paginationTheme = 'bootstrap';


	public function render()
	{
		return view('livewire.usuario.usuario-grid', [
			'usuarios' => Usuario::activas()
				->where(function ($query) {
					$query->where('primer_nombre', 'like', '%' . $this->search . '%')
						->orWhere('primer_apellido', 'like', '%' . $this->search . '%')
						->orWhere('segundo_nombre', 'like', '%' . $this->search . '%')
						->orWhere('segundo_apellido', 'like', '%' . $this->search . '%');
				})
				->orderBy('id_usuario', 'desc')
				->paginate(10),
		]);
	}

	public function editing($usuario)
	{
		$this->usuariosEditing = $usuario;
		$this->editingId = $usuario['id_usuario'];
	}

	public function cancelEditing()
	{
		$this->editingId = 0;
	}

	#[On('usuario-guardada')]
	public function updatedSearch()
	{
		$this->resetPage();
	}

	public function update()
	{
		$usuario = Usuario::findOrFail($this->editingId);

		$usuario->fill($this->usuariosEditing);
		$usuario->save();

		$this->editingId = 0;
		$this->dispatch('notify', type: 'success', message: 'Usuario editado exitosamente');
	}

	public function delete($id)
	{
		if (!$id) {
			return;
		}

		$usuario = Usuario::findOrFail($id);
		$usuario->update(['estado' => 0]);
		$this->dispatch('notify', type: 'success', message: 'Usuario eliminado exitosamente');
	}
}
