<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadcrumbDisabled extends Component
{
    public function __construct()
    {
    }

    public function render(): View
    {
        return view('components.breadcrumb-disabled');
    }
}
