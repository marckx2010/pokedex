<div class="mt-10">

    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">The database was last updated {{ $dbInfo->lastWriteTimeFormatted }}</h5>
    </div>

    @switch($color)
        @case ('green')
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">There are {{ $dbInfo->pokemonCountFromAPI }} Pokemon in the API &equals; {{ $dbInfo->numPokemonInDB }} in the database</span>
            </div>
            <button type="button" wire:click="seedPokedex" class="ml-10 mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2
                    dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Seed {{ config('app.name') }}</button>
            @break

        @case ('yellow')
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <span class="font-medium">There are {{ $dbInfo->pokemonCountFromAPI }} in the API &nequiv; {{ $dbInfo->numPokemonInDB }} in the database</span>
            </div>
            <button type="button" wire:click="seedPokedex" class="ml-10 mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2
                    dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Seed {{ config('app.name') }}</button>
            @break

        @case ('red')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">There are no pokemon in the database. Perhaps a seeding is in order?</span>
                <button type="button" wire:click="seedPokedex" class="ml-10 mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2
                    dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Seed {{ config('app.name') }}</button>
            </div>
            @break
    @endswitch

</div>
