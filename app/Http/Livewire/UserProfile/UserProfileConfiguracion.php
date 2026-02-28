<?php

namespace App\Http\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UserProfileConfiguracion extends Component
{
    public Usuario $usuario;
    public $password_actual = '';
    public $password_nueva = '';
    public $password_confirmacion = '';
    public $mensaje_exito = '';
    public $mensaje_error = '';

    public function mount(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function cambiarContrasena()
    {
        // Validar los campos
        $this->validate([
            'password_actual' => 'required',
            'password_nueva' => 'required|min:8|confirmed',
            'password_confirmacion' => 'required',
        ], [
            'password_actual.required' => 'Por favor, ingresa tu contraseña actual.',
            'password_nueva.required' => 'Por favor, ingresa una nueva contraseña.',
            'password_nueva.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'password_nueva.confirmed' => 'Las contraseñas no coinciden.',
            'password_confirmacion.required' => 'Por favor, confirma tu nueva contraseña.',
        ]);

        try {
            // Obtener el usuario autenticado
            $user = auth()->user();

            // Verificar que la contraseña actual sea correcta
            if (!Hash::check($this->password_actual, $user->password)) {
                $this->mensaje_error = 'La contraseña actual es incorrecta.';
                return;
            }

            // Verificar que la nueva contraseña sea diferente de la actual
            if (Hash::check($this->password_nueva, $user->password)) {
                $this->mensaje_error = 'La nueva contraseña debe ser diferente a la actual.';
                return;
            }

            // Actualizar la contraseña
            $user->update([
                'password' => Hash::make($this->password_nueva),
            ]);

            // Limpiar los campos
            $this->password_actual = '';
            $this->password_nueva = '';
            $this->password_confirmacion = '';
            $this->mensaje_exito = '¡Contraseña cambiada correctamente!';

            // Limpiar el mensaje de éxito después de 3 segundos
            $this->dispatch('limpiarMensaje');
        } catch (\Exception $e) {
            $this->mensaje_error = 'Error al cambiar la contraseña: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.user-profile.user-profile-configuracion');
    }
}
