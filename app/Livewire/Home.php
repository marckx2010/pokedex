<?php

namespace App\Livewire;

use App\Models\Pokedex;
use Livewire\Component;

class Home extends Component
{
    public $dbInfo;
    public ?string $color;
    public ?bool $showTruncateToast = false;
    public ?bool $showDBsuccessToast = false;
    public ?bool $showSpinner = false;
    public ?string $seedButtonHtml;

    private function makeSeedButtonHtml()
    {
        $appMame = config('app.name');
        $this->seedButtonHtml = <<<EOT
            <button type="button" wire:click="seedPokedex" class="ml-10 mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2
                dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Seed $appMame
            </button>
        EOT;
    }

    public function mount(): void
    {
        $this->makeSeedButtonHtml();
        $pokedex = new Pokedex();
        $this->dbInfo = $pokedex->getPokemonDBinfo();
        $this->color = ($this->dbInfo->numPokemonInDB == $this->dbInfo->pokemonCountFromAPI) ? "green" : "yellow";
        if ($this->dbInfo->numPokemonInDB == 0) {
            $this->color = 'red';
        }
    }

    public function seedPokedex(): void
    {
        $this->showSpinner = true;
        $this->showTruncateToast = true;
        $pokedex = new Pokedex();
        $pokedex->seedPokedex();
        $this->redirect('/');
        $this->dispatch('pokedex-success');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
