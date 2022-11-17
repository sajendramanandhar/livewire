<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.show-users', ['users' => User::paginate(10)]);
    }
}
