<?php declare(strict_types=1);

namespace App\Livewire;

use App\Models\Pokedex;
use Livewire\Component;

class GetPokemanInfo extends Component
{
    public ?string $name = null;
    public ?array $payload;
    public ?string $referer = null;

    /**
     * @throws \Exception
     */
    public function mount(string $b64): void
    {
        // try to decode both the name and referer
        $b64 = explode("|", base64_decode($b64));

        if (sizeof($b64) == 2) {
            $name = $b64[0];
            $this->referer = $b64[1];
        } else {
            $this->referer = "/pokedex";
            $name = $b64;
        }

        $check = <<<STYLE
            <span style="color: green">&#x2714;</span> 
         STYLE;

        $X = <<<STYLE
            <span style="color: red">&times;</span>
        STYLE;

        $this->name = trim($name);
        $pokedex = new Pokedex();
        $this->payload = $pokedex->getPayload($name);
        $a = "";
        foreach ($this->payload['abilities'] as $ability) {
            $name = "<div>Name: " . $ability['ability']['name'] . "</div>";
            $checkOrX = ($ability['is_hidden']) ? $check : $X;
            $hidden = "<div>Is hidden: $checkOrX</div>";
            $slot = "<div>Slot: " . $ability['slot'] . "</div><br/><br/>";
            $a .= "$name $hidden  $slot";
        }

        $this->payload['abilities'] = $a;
    }

    public function render()
    {
        return view('livewire.get-pokeman-info');
    }
}
