<?php

namespace App\Http\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Usuario;


class UserProfile extends Component
{
    public Usuario $usuario;
    public $activeTab = 'overview';

    public function mount()
    {
        $authUser = auth()->user();
        $this->usuario = Usuario::where('id_user', $authUser->id)->firstOrFail();
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.user-profile.user-profile');
    }
}
