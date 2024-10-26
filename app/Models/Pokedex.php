<?php declare(strict_types=1);

namespace App\Models;

use App\Livewire\Utils\Dispatcher;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * App\Models\Pokedex
 *
 * @property int $id
 * @property string $name
 * @mixin \Eloquent
 **/

class Pokedex extends Model
{
    protected $table = 'pokedex';
    public $timestamps = false;

    const TABLE_ENDPOINT = "https://pokeapi.co/api/v2/pokemon";
    const APPLICATION_NAME = "Pokédex";

    private function getPokemonCountFromAPI(): int
    {
        // first get the count
        $onePokeman = file_get_contents(Pokedex::TABLE_ENDPOINT . "/?limit=1");
        $onePokeman = json_decode($onePokeman, false);
        return $onePokeman->count;
    }

    public function getPokemonpokemonDBinfo(): array
    {
        $numPokemenInDB = self::query()->count();

        $databasePath = database_path("database.sqlite");

        // Get the last modification time of the database file
        $stats = stat($databasePath);
        $lastWriteTime = $stats['mtime'];

        // Convert the timestamp to a human-readable format (optional)
        $lastWriteTimeFormatted = date('Y-m-d H:i:s', $lastWriteTime);

        $pokemonCountFromAPI = $this->getPokemonCountFromAPI();

        return [
            'numPokemonInDB' => $numPokemenInDB,
            'lastWriteTimeFormatted' => $lastWriteTimeFormatted,
            'pokemonCountFromAPI' => $pokemonCountFromAPI
        ];
    }

    public function getPayload(string $name): array
    {
        $client = new Client();

        $payload = [];

        try {
            $response = $client->get("https://pokeapi.co/api/v2/pokemon/$name");
            if ($response->getStatusCode() === Response::HTTP_OK) {
                $pokemonData = json_decode($response->getBody()->getContents(), true);

                return $pokemonData;
            } else {
                throw new Exception("Error: " . $response->getBody()->getContents());
            }
        } catch (Exception $e) {
            throw new Exception("Error: " . $e->getMessage());
        }

        return $payload;
    }


    public function seedPokedex(): void
    {
        // first get the count
        $numPokemen = $this->getPokemonCountFromAPI();

        // now get them all in chunks
        $allPokemen = file_get_contents(Pokedex::TABLE_ENDPOINT . "/?limit=$numPokemen");
        $allPokemen = json_decode($allPokemen, false);

        DB::table($this->table)->truncate();

        // no apparant way to insert chunks into table without the key getting in the way...so slow but sure way used
        $chunkSize = 10; // usually much larger number yet here just for the slider
        $index = 0;
        $array = array();

        foreach($allPokemen->results as $pokeman)
        {
            $pokedex = new Pokedex();
            $pokedex->name = $pokeman->name;
            $pokedex->save();

            $index++;
        }
    }
}

