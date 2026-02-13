<?php

namespace App\Http\Livewire\Sede;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Sede as Sedes;
use Illuminate\Support\Facades\Validator;

class SedeForm extends Component
{
    public Sedes $sede;

    public function mount()
    {
        $this->sede = new Sedes();
    }

    protected function rules()
    {
        return [
            'sede.descripcion' => 'required|string|max:25',
            'sede.codigo'   => 'string|max:10',
            'sede.direccion'  => 'string|max:500',
            'sede.telefono'  => 'string|max:15',
        ];
    }

    protected function messages()
    {
        return [
            'sede.descripcion.required' => 'El nombre es obligatorio',
            'sese.descripcion.max:25' => 'La descripción no debe exceder los 25 caracteres',
            'sede.codigo.max:10'   => 'El código no debe exceder los 10 caracteres',
            'sede.direccion.max:500'  => 'La dirección no debe exceder los 500 caracteres',
            'sede.telefono.max:15'  => 'El teléfono no debe exceder los 15 caracteres',
        ];
    }

    public function validacion()
    {
        $validator = Validator::make(
            ['sede' => $this->sede->toArray()],
            [
                'sede.descripcion' => 'required|string|max:25',
                'sede.codigo'   => 'nullable|string|max:10',
                'sede.direccion'  => 'nullable|string|max:500',
                'sede.telefono'  => 'nullable|string|max:10',
            ],
            [
                'sede.descripcion.required' => 'El nombre es obligatorio',
                'sede.descripcion.max' => 'El nombre no debe exceder los 25 caracteres',
                'sede.codigo.max'   => 'El código no debe exceder los 10 caracteres',
                'sede.direccion.max'  => 'La dirección no debe exceder los 500 caracteres',
                'sede.telefono.max'  => 'El teléfono no debe exceder los 10 caracteres',
            ]
        );

        if ($validator->fails()) {
            $errors = $this->setErrorBag($validator->errors());
            return false;
        }
        return true;
    }

    #[On('guardar-sede')]
    public function guardar()
    {
        if (!$this->validacion()) {
            return;
        }

        $this->dispatch('console-log', message: 'Guardando sede');
        // Crear una nueva sede
        $resultado = $this->sede->save();

        if (!$resultado) {
            return;
        }

        // Limpiar el formulario
        $this->sede = new Sedes();
        $this->dispatch('sede-guardada');
        $this->dispatch('notify', type: 'success', message: 'Sede guardada exitosamente');

    }

    #[On('reset-formulario')]
    public function resetFormulario()
    {
        $this->sede = new Sedes();
        $this->resetValidation();
    }

    public function updated($property)
    {
        // Limpia SOLO el error del campo que se está editando
        $this->resetErrorBag($property);
    }
}
