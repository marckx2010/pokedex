<?php declare(strict_types=1);

namespace App\Livewire;

use App\Models\Pokedex;
use Livewire\Component;

class GetPokemanInfo extends Component
{
    public ?string $name = null;
    public ?array $payload;

    public function mount(string $name)
    {
        $this->name = $name;
        $pokedex = new Pokedex();
        $this->payload = $pokedex->getPayload($name);
        $a = "";
        foreach ($this->payload['abilities'] as $ability) {
            $a .= "abilitiy: " . $ability['ability']['name'] . PHP_EOL . "Is hidden: " . $ability['is_hidden'] . PHP_EOL . "Slot: " . $ability['slot'] . PHP_EOL;
        }
        $this->payload['abilities'] = $a;
    }

    public function render()
    {
        return view('livewire.get-pokeman-info');
    }
}
