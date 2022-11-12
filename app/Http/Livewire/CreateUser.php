<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateUser extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'max:255',
                'string',
                'email',
                'unique:'.User::class,
            ],
            'password' => User::passwordRules(),
        ];
    }

    public function render(): View
    {
        return view('livewire.create-user');
    }

    public function submit(): void
    {
        User::create($this->validate());

        $this->reset();

        session()->flash('success', 'User created successfully.');
    }
}
