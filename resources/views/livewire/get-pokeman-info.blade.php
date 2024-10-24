<div class="flex justify-center">

    <div class="relative overflow-hidden shadow-md rounded-lg">
        <table class=" w-full text-left">
            <thead class="uppercase bg-[#204897] text-[#e5e7eb]" style="background-color: #204897; color: #e5e7eb;">
            <tr class="w-96">
                <td class="py-1 border text-center  p-4 w-32">Name</td>
                <td class="py-1 border text-center  p-4" >Image</td>
                <td class="py-1 border text-center  p-4" >Species?</td>
                <td class="py-1 border text-center  p-4" >Weight</td>
                <td class="py-1 border text-center  p-4" >Height</td>
                <td class="py-1 border text-center  p-4" >Abilities</td>
            </tr>
            </thead>
            <tbody class="bg-white text-gray-500 bg-[#FFFFFF] text-[#6b7280]" style="background-color: #FFFFFF; color: #6b7280;">
            <tr class="py-5">
                <td class="py-5 border text-center font-greatvibes p-4 mr-4" >
                    <div class="w-32 flex justify-between text-7xl font-greatvibes">{{ $name }}</div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="w-32 h-32 border-2 border-black flex justify-center">
                        <img src="{{ $payload['sprites']['front_default'] }}" alt="Pokeman Image" />
                    </div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    {{ $payload['species']['name'] }}
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="text-2xl">{{ $payload['weight'] }}</div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="text-2xl">{{ $payload['height'] }}</div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="text-2xl">{{ $payload['abilities'] }}</div>
                </td>
            </tr>
            </tbody>
        </table>

        <a href="/pokedex" wire:navigate>
        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm
            px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            Return to Table
        </button>
        <a>

    </div>






</div>
