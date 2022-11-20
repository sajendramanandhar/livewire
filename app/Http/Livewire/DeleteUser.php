<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DeleteUser extends Component
{
    public bool $modalStatus = false;
    public User $user;

    public function render(): View
    {
        return view('livewire.delete-user');
    }

    public function submit(): void
    {
        $this->user->delete();
        $this->modalStatus = false;
        $this->emitUp('deleted');
    }
}
