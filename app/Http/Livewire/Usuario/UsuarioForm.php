<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Usuario as Usuarios;
use App\Models\User;
use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            'usuario.segundo_nombre'   => 'nullable|string|max:50',
            'usuario.primer_apellido'  => 'required|string|max:50',
            'usuario.segundo_apellido'  => 'nullable|string|max:50',
            'usuario.id_tipo_usuario'  => 'required|integer|exists:tipo_usuario,id_tipo_usuario',
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
            'usuario.id_tipo_usuario.required' => 'El tipo de usuario es obligatorio',
            'usuario.id_tipo_usuario.exists' => 'El tipo de usuario seleccionado no existe',
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
                'usuario.id_tipo_usuario'  => 'required|integer|exists:tipo_usuario,id_tipo_usuario',
            ],
            [
                'usuario.primer_nombre.required' => 'El primer nombre es obligatorio',
                'usuario.primer_nombre.max' => 'El primer nombre no debe exceder los 50 caracteres',
                'usuario.segundo_nombre.max'   => 'El segundo nombre no debe exceder los 50 caracteres',
                'usuario.primer_apellido.required'  => 'El primer apellido es obligatorio',
                'usuario.primer_apellido.max'  => 'El primer apellido no debe exceder los 50 caracteres',
                'usuario.segundo_apellido.max'  => 'El segundo apellido no debe exceder los 50 caracteres',
                'usuario.id_tipo_usuario.required' => 'El tipo de usuario es obligatorio',
                'usuario.id_tipo_usuario.exists' => 'El tipo de usuario seleccionado no existe',
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

        // Crear el User automáticamente
        $nuevoUser = $this->crearUserAutomatico();

        // Asignar el id_user al usuario
        $this->usuario->id_user = $nuevoUser->id;

        $resultado = $this->usuario->save();

        if (!$resultado) {
            $this->dispatch('notify', type: 'error', message: 'Error al guardar el usuario');
            return;
        }

        $this->usuario = new Usuarios();
        $this->dispatch('usuario-guardada');
        $this->dispatch('notify', type: 'success', message: 'Usuario guardado exitosamente');
    }

    /**
     * Crea automáticamente un User con los datos del Usuario
     */
    private function crearUserAutomatico(): ?User
    {
        // Generar el nombre: primer_nombre + primer_apellido
        $nombre = $this->usuario->primer_nombre . ' ' . $this->usuario->primer_apellido;

        // Generar el email: primera_letra_primer_nombre + primer_apellido + @sucre.com
        $primerLetra = substr($this->usuario->primer_nombre, 0, 1);
        $email = strtolower($primerLetra . $this->usuario->primer_apellido . '@sucre.com');

        // Crear o recuperar el User
        return User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $nombre,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('sucre123'),
            ]
        );
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
        $tiposUsuario = TipoUsuario::where('estado', true)->get();
        return view('livewire.usuario.usuario-form', [
            'tiposUsuario' => $tiposUsuario,
        ]);
    }
}
