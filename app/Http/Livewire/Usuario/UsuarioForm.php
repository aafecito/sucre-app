<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Usuario as Usuarios;
use Illuminate\Support\Facades\Validator;

class UsuarioForm extends Component
{
	public Usuarios $usuario;

	public function mount()
	{
		$this->usuario = new Usuarios();
	}

	protected function rules()
	{
		return [
			'usuario.primer_nombre' => 'required|string|max:50',
			'usuario.segundo_nombre'   => 'string|max:50',
			'usuario.primer_apellido'  => 'required|string|max:50',
			'usuario.segundo_apellido'  => 'string|max:50',
			'usuario.tipo'  => 'string|max:50',
		];
	}

	protected function messages()
	{
		return [
			'usuario.primer_nombre.required' => 'El primer nombre es obligatorio',
			'usuario.primer_nombre.max' => 'El primer nombre no debe exceder los 50 caracteres',
			'usuario.segundo_nombre.max'   => 'El segundo nombre no debe exceder los 50 caracteres',
			'usuario.primer_apellido.required'  => 'El primer apellido es obligatorio',
			'usuario.primer_apellido.max'  => 'El primer apellido no debe exceder los 50 caracteres',
			'usuario.segundo_apellido.max'  => 'El segundo apellido no debe exceder los 50 caracteres',
			'usuario.tipo.max'  => 'El tipo no debe exceder los 50 caracteres',
		];
	}

	public function validacion()
	{
		$validator = Validator::make(
			['usuario' => $this->usuario->toArray()],
			[
				'usuario.primer_nombre' => 'required|string|max:50',
				'usuario.segundo_nombre'   => 'nullable|string|max:50',
				'usuario.primer_apellido'  => 'required|string|max:50',
				'usuario.segundo_apellido'  => 'nullable|string|max:50',
				'usuario.tipo'  => 'nullable|string|max:50',
			],
			[
				'usuario.primer_nombre.required' => 'El primer nombre es obligatorio',
				'usuario.primer_nombre.max' => 'El primer nombre no debe exceder los 50 caracteres',
				'usuario.segundo_nombre.max'   => 'El segundo nombre no debe exceder los 50 caracteres',
				'usuario.primer_apellido.required'  => 'El primer apellido es obligatorio',
				'usuario.primer_apellido.max'  => 'El primer apellido no debe exceder los 50 caracteres',
				'usuario.segundo_apellido.max'  => 'El segundo apellido no debe exceder los 50 caracteres',
				'usuario.tipo.max'  => 'El tipo no debe exceder los 50 caracteres',
			]
		);

		if ($validator->fails()) {
			$errors = $this->setErrorBag($validator->errors());
			return false;
		}
		return true;
	}

	#[On('guardar-usuario')]
	public function guardar()
	{
		if (!$this->validacion()) {
			return;
		}

		$this->usuario->estado = 1;
		$resultado = $this->usuario->save();

		if (!$resultado) {
			return;
		}

		$this->usuario = new Usuarios();
		$this->dispatch('usuario-guardada');
		$this->dispatch('notify', type: 'success', message: 'Usuario guardado exitosamente');
	}

	#[On('reset-formulario')]
	public function resetFormulario()
	{
		$this->usuario = new Usuarios();
		$this->resetValidation();
	}

	public function updated($property)
	{
		$this->resetErrorBag($property);
	}

	public function render()
	{
		return view('livewire.usuario.usuario-form');
	}
}
