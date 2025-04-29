<?php

namespace Modularavel\Auth\Livewire\Settings;

use Illuminate\View\View;
use Livewire\Component;
use function view;

class Appearance extends Component
{
    public function render(): View|string
    {
        return view('auth::livewire.settings.appearance');
    }
}
