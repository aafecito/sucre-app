<?php

namespace App\Http\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserProfileConfiguracion extends Component
{
    public Usuario $usuario;
    public $password_actual = '';
    public $password_nueva = '';
    public $password_confirmacion = '';
    public $mostrar_contraseña = false;

    public function mount(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function toggleMostrarContrasena()
    {
        $this->mostrar_contraseña = !$this->mostrar_contraseña;
    }

    public function cambiarContrasena()
    {
        // Validar los campos
        $this->validate([
            'password_actual' => 'required',
            'password_nueva' => 'required|min:8|same:password_confirmacion',
            'password_confirmacion' => 'required',
        ], [
            'password_actual.required' => 'Por favor, ingresa tu contraseña actual.',
            'password_nueva.required' => 'Por favor, ingresa una nueva contraseña.',
            'password_nueva.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'password_nueva.same' => 'Las contraseñas no coinciden.',
            'password_confirmacion.required' => 'Por favor, confirma tu nueva contraseña.',
        ]);

        try {
            // Obtener el usuario autenticado
            $user = auth()->user();

            // Verificar que la contraseña actual sea correcta
            if (!Hash::check($this->password_actual, $user->password)) {
                $this->dispatch('notify', type: 'error', message: 'La contraseña actual es incorrecta.');
                return;
            }

            // Verificar que la nueva contraseña sea diferente de la actual
            if (Hash::check($this->password_nueva, $user->password)) {
                $this->dispatch('notify', type: 'error', message: 'La nueva contraseña debe ser diferente a la actual.');
                return;
            }

            // Actualizar la contraseña
            /** @var User $user */
            $user->update([
                'password' => Hash::make($this->password_nueva),
            ]);

            // Limpiar los campos
            $this->password_actual = '';
            $this->password_nueva = '';
            $this->password_confirmacion = '';

            $this->dispatch('notify', type: 'success', message: '¡Contraseña cambiada correctamente!');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Error al cambiar la contraseña: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user-profile.user-profile-configuracion');
    }
}
