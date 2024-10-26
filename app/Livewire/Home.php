<?php

namespace App\Livewire;

use App\Models\Pokedex;
use Livewire\Component;

class Home extends Component
{
    public ?array $pokemonpokemonDBinfo = [];
    public ?string $color = null;
    public ?bool $showSpinner = false;
    public ?array $pokemonSeedButtonHtml = [];
    private function createSeedButtonHtml(): void
    {
        $appMame = config('app.name');

        $pokedex = new Pokedex();
        $this->pokemonpokemonDBinfo = $pokedex->getPokemonpokemonDBinfo();
        $randomKey = str()->random(50);

        if ($this->pokemonpokemonDBinfo['numPokemonInDB'] == 0) {
            $this->color = 'red';

            $alert = <<<ALERT
            <div class="text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="text-xl">There are zero Pokemon in the database. Perhaps a seeding is in order?</span>
            </div>
            ALERT;

            $button = <<<BUTTON
            <button type="button" wire:click="seedPokedex" wire:key="$randomKey"
                class="mt-2 text-white $this->color-seeder-button focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-500 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Seed $appMame
            </button>
            BUTTON;

            $this->pokemonSeedButtonHtml = [
                'alert' => $alert,
                'button' => $button,
                'suggestion' => 'Definitely seed the database.'
            ];
        } else {
            $this->color = ($this->pokemonpokemonDBinfo['numPokemonInDB'] == $this->pokemonpokemonDBinfo['pokemonCountFromAPI']) ? 'green' : 'yellow';

            //$this->color = 'yellow';
            //$this->color = 'green';

            if ($this->color == 'yellow') {
                $randomKey = str()->random(50);

                $alert = <<<ALERT
                <div class="text-xl text-red-800 rounded-lg bg-white dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    <span class="font-xl">There are {$this->pokemonpokemonDBinfo['pokemonCountFromAPI']} Pokemon on the API &nequiv;{$this->pokemonpokemonDBinfo['numPokemonInDB']} in the database.</span>
                </div>
                ALERT;

                $button = <<<BUTTON
                <button type="button" wire:click="seedPokedex" wire:key="$randomKey"
                    class="mt-2 focus:outline-none text-black $this->color-seeder-button focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:focus:ring-yellow-900">
                    Seed $appMame
                </button>
                BUTTON;

                $this->pokemonSeedButtonHtml = [
                    'alert' => $alert,
                    'button' => $button,
                    'suggestion' => "Besides discovering the reason for the anomaly, seeding the database is strongly suggested."
                ];
            } else {
                if ($this->color == 'green') {
                    $randomKey = str()->random(50);

                    $alert = <<<ALERT
                    <div class="text-xl text-black rounded-lg bg-white dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="text-xl">There are {$this->pokemonpokemonDBinfo['pokemonCountFromAPI']} Pokemon on the API &equals;  {$this->pokemonpokemonDBinfo['numPokemonInDB']} in the database.
                    </div>
                    ALERT;

                    $button = <<<BUTTON
                    <button type="button" wire:click="seedPokedex" wire:key="$randomKey"
                        class="mt-4 focus:outline-none text-white $this->color-seeder-button focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Seed $appMame
                    </button>
                    BUTTON;

                    $this->pokemonSeedButtonHtml = [
                        'alert' => $alert,
                        'button' => $button,
                        'suggestion' => "No seeding necessary."
                    ];
                }
            }
        }
    }

    public function mount(): void
    {
        $this->createSeedButtonHtml();
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
