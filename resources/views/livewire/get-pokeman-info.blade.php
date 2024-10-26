<div class="flex justify-center">

    <style>
        .pokemon-table {
            font-family: Arial, Helvetica, sans-serif;
            width: 60%;
            margin: 15% auto 0;
        }
        th {
            padding: 6px;
            min-width: 100px;
            width: 55px;
        }
        td {
            padding: 4px;
        }
        .return-button {
            margin-top: 60px;
            height: 3rem;
            width: 10rem;
            color: white;
            background-color: #1d5cc9;
            font-style: normal;
            border: 2px solid #0059FFF5;
            border-radius: 5px;
            padding: 5px;
        }
        .poke-title {
            font-size: xx-large;
            text-align: center;
        }
        .poke-text {
            font-size: xx-large;
            text-align: center;
        }
        .poke-ability {
            width: 10rem;
            text-align: left;
            font-size: 20px;
        }
        .poke-image-th {
            width:12rem;
            height:8rem;
        }
        .poke-image {
            width:12rem;
        }
    </style>

    <div class="pokemon-table relative overflow-hidden shadow-md rounded-lg">
        <div class="poke-title">Overview of Pokemon {{$name}}</div>
        <table class=" w-full text-left">
            <thead class="uppercase bg-[#204897] text-[#e5e7eb]" style="background-color: #204897; color: #e5e7eb;">
            <tr class="w-96">
                <th class="py-1 border text-center  p-4 w-32">Name</th>
                <th class="py-1 text-center  p-4" >Image</th>
                <th class="py-1 border text-center  p-4" >Species</th>
                <th class="py-1 border text-center  p-4" >Weight</th>
                <th class="py-1 border text-center  p-4" >Height</th>
                <th class="py-1 border text-center  p-4" >Abilities</th>
            </tr>
            </thead>
            <tbody class="bg-white text-gray-500 bg-[#FFFFFF] text-[#6b7280]" style="background-color: #FFFFFF; color: #6b7280;">
            <tr class="py-5">
                <td class="py-5 border text-center p-4 mr-4" >
                    <div class="poke-text w-32 flex justify-between text-7xl font-greatvibes">{{ $name }}</div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="poke-image-th w-32 h-32 border-2 border-black flex justify-center">
                        <img class="poke-image" src="{{ $payload['sprites']['front_default'] }}" alt="Pokeman Image" />
                    </div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="poke-text">{{ $payload['species']['name'] }}</div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="poke-text poke-center text-center text-2xl">{{ $payload['weight'] }}</div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="poke-text poke-center text-2xl">{{ $payload['height'] }}</div>
                </td>
                <td class="py-5 border text-center  p-4" >
                    <div class="poke-ability text-2xl">{!! $payload['abilities'] !!}</div>
                </td>
            </tr>
            </tbody>
        </table>

        <a href="{!! $referer !!}" wire:navigate>
        <button type="button" data-tooltip-target="tooltip-default" class="return-button text-white bg-blue-500 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-lg
            px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            Return to Table
        </button>
        <a>

{{--
        <button data-tooltip-target="tooltip-default" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Default tooltip</button>

        <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Tooltip content
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
--}}

    </div>






</div>
