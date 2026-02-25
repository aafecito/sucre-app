<?php

namespace App\Http\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Usuario;

class UserProfileProjects extends Component
{
    public Usuario $usuario;

    public function mount(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function render()
    {
        return view('livewire.user-profile.user-profile-projects');
    }
}
