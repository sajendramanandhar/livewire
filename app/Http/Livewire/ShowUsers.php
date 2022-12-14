<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    public string $keyword = '';

    public string $column = 'created_at';

    public string $sortOrder = 'desc';

    public int $perPage = 10;

    protected function getListeners(): array
    {
        return ['deleted'];
    }

    public function deleted()
    {
        session()->flash('success', 'User deleted successfully.');
    }

    public function updatingKeyword(): void
    {
        $this->resetPage();
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.show-users', [
            'users' => User::search($this->keyword)
                ->orderBy($this->column, $this->sortOrder)
                ->paginate($this->perPage),
        ]);
    }
}
