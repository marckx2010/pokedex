<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Banner extends Component
{
    public ?bool $showBanner = false;

    public function mount()
    {
        $currentRouteName = Route::currentRouteName();
        $this->showBanner = ($currentRouteName == 'pokedex');
    }

    public function render()
    {
        return view('livewire.banner');
    }
}
