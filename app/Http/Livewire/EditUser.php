<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditUser extends Component
{
    public User $user;

    public string $name;

    public string $email;

    protected function rules(): array
    {
        $rules = User::rules();
        $rules['email'][] = Rule::unique(table_name(User::class))->ignoreModel(
            $this->user
        );

        return $rules;
    }

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render(): View
    {
        return view('livewire.edit-user');
    }

    public function submit(): void
    {
        $this->user->update($this->validate());

        session()->flash('success', 'User edited successfully.');
    }
}
