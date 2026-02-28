<?php

namespace App\Http\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Usuario;
use App\Models\Asignatura;
use App\Models\DocenteAsignatura;
use Illuminate\Database\Eloquent\Collection;

class UserProfileEquipo extends Component
{
    public Usuario $usuario;
    public $asignaturas = [];
    public $asignatura_seleccionada = '';

    public function mount(Usuario $usuario)
    {
        $this->usuario = $usuario;
        $this->cargarAsignaturas();
    }

    public function cargarAsignaturas()
    {
        // Obtener todas las asignaturas disponibles
        $this->asignaturas = Asignatura::where('estado', 1)->get();
    }

    public function guardarAsignatura()
    {
        // Validar que se haya seleccionado una asignatura
        $this->validate([
            'asignatura_seleccionada' => 'required|exists:asignaturas,id_asignatura',
        ], [
            'asignatura_seleccionada.required' => 'Por favor, selecciona una asignatura.',
            'asignatura_seleccionada.exists' => 'La asignatura seleccionada no es válida.',
        ]);

        try {
            // Verificar si ya existe la relación
            $existe = DocenteAsignatura::where('id_docente', $this->usuario->id_usuario)
                ->where('id_asignatura', $this->asignatura_seleccionada)
                ->exists();

            if ($existe) {
                $this->dispatch('notify', type: 'error', message: 'Esta asignatura ya está asignada a este docente.');
                return;
            }

            // Crear la relación docente-asignatura
            DocenteAsignatura::create([
                'id_docente' => $this->usuario->id_usuario,
                'id_asignatura' => $this->asignatura_seleccionada,
                'requisito_experiencia_docente' => 0,
            ]);

            // Recargar la relación de asignaturas para mostrar el cambio sin recargar la página
            $this->usuario->load('asignaturasAsignadas');

            $this->asignatura_seleccionada = '';
            $this->dispatch('notify', type: 'success', message: '¡Asignatura asignada correctamente!');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Error al asignar la asignatura: ' . $e->getMessage());
        }
    }

    public function eliminarAsignatura($id_asignatura)
    {
        try {
            // Eliminar la relación docente-asignatura
            DocenteAsignatura::where('id_docente', $this->usuario->id_usuario)
                ->where('id_asignatura', $id_asignatura)
                ->delete();

            // Recargar la relación de asignaturas
            $this->usuario->load('asignaturasAsignadas');

            $this->dispatch('notify', type: 'success', message: '¡Asignatura eliminada correctamente!');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Error al eliminar la asignatura: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user-profile.user-profile-equipo');
    }
}
