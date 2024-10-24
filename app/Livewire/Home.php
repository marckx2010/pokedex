<?php

namespace App\Livewire;

use App\Models\Pokedex;
use Livewire\Component;

class Home extends Component
{
    public $dbInfo;
    public ?string $color;

    public function mount(): void
    {
        $pokedex = new Pokedex();
        $this->dbInfo = $pokedex->getPokemonDBinfo();
        $this->color = ($this->dbInfo->numPokemonInDB==$this->dbInfo->pokemonCountFromAPI) ? "green" : "yellow";
        if ($this->dbInfo->numPokemonInDB==0) {
            $this->color = 'red';
        }
    }

    public function seedPokedex(): void
    {
        $poxedex = new Pokedex();
        $poxedex->seedPokedex();
        $this->redirect('/');
        $this->dispatcch('pokedex-success');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
