<?php declare(strict_types=1);

namespace App\Models;

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

    public function getPokemonDBinfo(): object
    {
        $numPokemenInDB = self::query()->count();

        $databasePath = database_path("database.sqlite");

        // Get the last modification time of the database file
        $stats = stat($databasePath);
        $lastWriteTime = $stats['mtime'];

        // Convert the timestamp to a human-readable format (optional)
        $lastWriteTimeFormatted = date('Y-m-d H:i:s', $lastWriteTime);

        $pokemonCountFromAPI = $this->getPokemonCountFromAPI();

        return (object) [
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
                $payload = $pokemonData;
                $pokemonId = $pokemonData["id"];
                //dd($pokemonData);

                return $pokemonData;
            } else {
                throw new Exception("Error: " . $response->getBody()->getContents());
            }
        } catch (Exception $e) {
            throw new Exception("Error: " . $e->getMessage());
        }

        try {
            $response = $client->get("https://pokeapi.co/api/v2/evolution-chain/$pokemonId");
            if ($response->getStatusCode() === Response::HTTP_OK) {
                $pokemonData = json_decode($response->getBody()->getContents(), true);
                //payload[] = $pokemonData["species"];
                //dd($pokemonData);
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
        $allPokemen = json_decode($allPokemen, true);

        DB::table($this->table)->truncate();

        foreach ($allPokemen['results'] as $pokemon) {
            $pokedex = new Pokedex();
            $pokedex->name = $pokemon['name'];
            $pokedex->save();
        }
    }
}

