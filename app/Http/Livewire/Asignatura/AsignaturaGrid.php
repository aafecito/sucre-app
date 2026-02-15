<?php

namespace App\Http\Livewire\Asignatura;

use Livewire\Component;
use App\Models\Asignatura;
use Livewire\WithPagination;
use Livewire\Attributes\On;


class AsignaturaGrid extends Component
{
	use WithPagination;
	public $editingId = 0;
	public $asignaturasEditing;
	public $search = '';

	protected $paginationTheme = 'bootstrap';


	public function render()
	{
		return view('livewire.asignatura.asignatura-grid', [
			'asignaturas' => Asignatura::activas()
				->where(function ($query) {
					$query->where('descripcion', 'like', '%' . $this->search . '%')
						->orWhere('codigo', 'like', '%' . $this->search . '%');
				})
				->orderBy('id_asignatura', 'desc')
				->paginate(10),
		]);
	}

	public function editing($asignatura)
	{
		$this->asignaturasEditing = $asignatura;
		$this->editingId = $asignatura['id_asignatura'];
	}

	public function cancelEditing()
	{
		$this->editingId = 0;
	}

	#[On('asignatura-guardada')]
	public function updatedSearch()
	{
		$this->resetPage();
	}

	public function update()
	{
		$asignatura = Asignatura::findOrFail($this->editingId);

		$asignatura->fill($this->asignaturasEditing);
		$asignatura->save();

		$this->editingId = 0;
		$this->dispatch('notify', type: 'success', message: 'Asignatura editada exitosamente');
	}

	public function delete($id)
	{
		if (!$id) {
			return;
		}

		$asignatura = Asignatura::findOrFail($id);
		$asignatura->update(['estado' => 0]);
		$this->dispatch('notify', type: 'success', message: 'Asignatura eliminada exitosamente');
	}
}
