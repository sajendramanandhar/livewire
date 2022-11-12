<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    public function __construct(public string $for)
    {
    }

    public function render(): View
    {
        return view('components.label');
    }
}
