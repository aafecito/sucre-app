<?php

namespace App\Http\Livewire\Asignatura;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Asignatura as Asignaturas;
use App\Models\Carrera;
use Illuminate\Support\Facades\Validator;

class AsignaturaForm extends Component
{
	public Asignaturas $asignatura;
	public $carreras = [];

	public function mount()
	{
		$this->asignatura = new Asignaturas();
		$this->carreras = Carrera::all();
	}

	protected function rules()
	{
		return [
			'asignatura.descripcion' => 'required|string|max:100',
			'asignatura.codigo'   => 'string|max:10',
			'asignatura.tipo'  => 'string|max:50',
			'asignatura.semestre'  => 'integer|min:1',
			'asignatura.id_carrera'  => 'required|integer',
		];
	}

	protected function messages()
	{
		return [
			'asignatura.descripcion.required' => 'El nombre es obligatorio',
			'asignatura.descripcion.max' => 'El nombre no debe exceder los 100 caracteres',
			'asignatura.codigo.max'   => 'El código no debe exceder los 10 caracteres',
			'asignatura.tipo.max'  => 'El tipo no debe exceder los 50 caracteres',
			'asignatura.semestre.integer'  => 'El semestre debe ser un número',
			'asignatura.id_carrera.required'  => 'La carrera es obligatoria',
		];
	}

	public function validacion()
	{
		$validator = Validator::make(
			['asignatura' => $this->asignatura->toArray()],
			[
				'asignatura.descripcion' => 'required|string|max:100',
				'asignatura.codigo'   => 'nullable|string|max:10',
				'asignatura.tipo'  => 'nullable|string|max:50',
				'asignatura.semestre'  => 'nullable|integer|min:1',
				'asignatura.id_carrera'  => 'required|integer',
			],
			[
				'asignatura.descripcion.required' => 'El nombre es obligatorio',
				'asignatura.descripcion.max' => 'El nombre no debe exceder los 100 caracteres',
				'asignatura.codigo.max'   => 'El código no debe exceder los 10 caracteres',
				'asignatura.tipo.max'  => 'El tipo no debe exceder los 50 caracteres',
				'asignatura.semestre.integer'  => 'El semestre debe ser un número',
				'asignatura.id_carrera.required'  => 'La carrera es obligatoria',
			]
		);

		if ($validator->fails()) {
			$errors = $this->setErrorBag($validator->errors());
			return false;
		}
		return true;
	}

	#[On('guardar-asignatura')]
	public function guardar()
	{
		if (!$this->validacion()) {
			return;
		}

		$this->asignatura->estado = 1;
		$resultado = $this->asignatura->save();

		if (!$resultado) {
			return;
		}

		$this->asignatura = new Asignaturas();
		$this->dispatch('asignatura-guardada');
		$this->dispatch('notify', type: 'success', message: 'Asignatura guardada exitosamente');
	}

	#[On('reset-formulario')]
	public function resetFormulario()
	{
		$this->asignatura = new Asignaturas();
		$this->resetValidation();
	}

	public function updated($property)
	{
		$this->resetErrorBag($property);
	}

	public function render()
	{
		return view('livewire.asignatura.asignatura-form', [
			'carreras' => $this->carreras,
		]);
	}
}
