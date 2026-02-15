<?php

namespace App\Http\Livewire\Carrera;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Carrera as Carreras;
use App\Models\Sede;
use Illuminate\Support\Facades\Validator;

class CarreraForm extends Component
{
    public Carreras $carrera;
    public $sedes = [];

    public function mount()
    {
        $this->carrera = new Carreras();
        $this->sedes = Sede::all();
    }

    protected function rules()
    {
        return [
            'carrera.descripcion' => 'required|string|max:100',
            'carrera.codigo'   => 'string|max:10',
            'carrera.semestres'  => 'integer|min:1',
            'carrera.id_sede'  => 'required|integer',
        ];
    }

    protected function messages()
    {
        return [
            'carrera.descripcion.required' => 'El nombre es obligatorio',
            'carrera.descripcion.max' => 'El nombre no debe exceder los 100 caracteres',
            'carrera.codigo.max'   => 'El código no debe exceder los 10 caracteres',
            'carrera.semestres.integer'  => 'Los semestres debe ser un número',
            'carrera.id_sede.required'  => 'La sede es obligatoria',
        ];
    }

    public function validacion()
    {
        $validator = Validator::make(
            ['carrera' => $this->carrera->toArray()],
            [
                'carrera.descripcion' => 'required|string|max:100',
                'carrera.codigo'   => 'nullable|string|max:10',
                'carrera.semestres'  => 'nullable|integer|min:1',
                'carrera.id_sede'  => 'required|integer',
            ],
            [
                'carrera.descripcion.required' => 'El nombre es obligatorio',
                'carrera.descripcion.max' => 'El nombre no debe exceder los 100 caracteres',
                'carrera.codigo.max'   => 'El código no debe exceder los 10 caracteres',
                'carrera.semestres.integer'  => 'Los semestres debe ser un número',
                'carrera.id_sede.required'  => 'La sede es obligatoria',
            ]
        );

        if ($validator->fails()) {
            $errors = $this->setErrorBag($validator->errors());
            return false;
        }
        return true;
    }

    #[On('guardar-carrera')]
    public function guardar()
    {
        if (!$this->validacion()) {
            return;
        }

        $this->carrera->estado = 1;
        $resultado = $this->carrera->save();

        if (!$resultado) {
            return;
        }

        $this->carrera = new Carreras();
        $this->dispatch('carrera-guardada');
        $this->dispatch('notify', type: 'success', message: 'Carrera guardada exitosamente');
    }

    #[On('reset-formulario')]
    public function resetFormulario()
    {
        $this->carrera = new Carreras();
        $this->resetValidation();
    }

    public function updated($property)
    {
        $this->resetErrorBag($property);
    }

    public function render()
    {
        return view('livewire.carrera.carrera-form', [
            'sedes' => $this->sedes,
        ]);
    }
}
