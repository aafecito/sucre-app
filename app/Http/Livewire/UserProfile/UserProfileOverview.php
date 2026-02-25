<?php

namespace App\Http\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;

class UserProfileOverview extends Component
{
    public Usuario $usuario;

    public function mount(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    protected function rules()
    {
        return [
            'usuario.primer_nombre' => 'required|max:100|min:2',
            'usuario.segundo_nombre' => 'nullable|max:100',
            'usuario.primer_apellido' => 'required|max:100|min:2',
            'usuario.segundo_apellido' => 'nullable|max:100',
            'usuario.tipo' => 'nullable|max:100',
        ];
    }

    protected function messages()
    {
        return [
            'usuario.primer_nombre.required' => 'El primer nombre es obligatorio',
            'usuario.primer_nombre.min' => 'El primer nombre debe tener al menos 2 caracteres',
            'usuario.primer_nombre.max' => 'El primer nombre no debe exceder los 100 caracteres',
            'usuario.segundo_nombre.max' => 'El segundo nombre no debe exceder los 100 caracteres',
            'usuario.primer_apellido.required' => 'El primer apellido es obligatorio',
            'usuario.primer_apellido.min' => 'El primer apellido debe tener al menos 2 caracteres',
            'usuario.primer_apellido.max' => 'El primer apellido no debe exceder los 100 caracteres',
            'usuario.segundo_apellido.max' => 'El segundo apellido no debe exceder los 100 caracteres',
            'usuario.tipo.max' => 'El tipo de usuario no debe exceder los 100 caracteres',
        ];
    }

    public function validacion()
    {
        $validator = Validator::make(
            ['usuario' => $this->usuario->toArray()],
            $this->rules(),
            $this->messages()
        );

        if ($validator->fails()) {
            $this->setErrorBag($validator->errors());
            return false;
        }
        return true;
    }

    public function guardar()
    {
        if (!$this->validacion()) {
            return;
        }

        if (env('IS_DEMO')) {
            $this->dispatch('notify', type: 'info', message: 'Esta es una versión demo. Los cambios no se guardan.');
            return;
        }

        $resultado = $this->usuario->save();

        if (!$resultado) {
            $this->dispatch('notify', type: 'error', message: 'Error al guardar los cambios.');
            return;
        }

        $this->dispatch('notify', type: 'success', message: 'Información de perfil guardada exitosamente');
    }

    public function updated($property)
    {
        // Limpia el error del campo que se está editando
        $this->resetErrorBag($property);
    }

    public function render()
    {
        return view('livewire.user-profile.user-profile-overview');
    }
}
