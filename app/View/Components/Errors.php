<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Errors extends Component
{

    public function __construct(public string $key)
    {
    }

    public function render(): View
    {
        return view('components.errors');
    }
}
