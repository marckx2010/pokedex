<div>
<div>
    <header>
        <nav class="bg-blue-500 text-white fixed w-full z-20 top-0 start-0 border-b border-gray-200
                dark:text-white dark:bg-gray-900 dark:border-gray-600">

            <div class="flex">
                <div class="flex-1">
                    &nbsp;
                </div>
                <div class="flex-1 mt-6">
                    <a href="/" wire:navigate class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img class="h-12" src="images/pikachu.jpeg" alt="Pikachu">
                        <span class="flex justify-center text-3xl font-semibold whitespace-nowrap dark:text-white">
                        {{ config('app.name') }}
                    </span>
                    </a>
                </div>
                <div class="flex-1">
                    <a href="/pokedex" wire:navigate class="block p-4 bg-blue-500 pl-4 py-2 text-gray-100 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
                                md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        <button type="button" class="text-2xl text-black font-bold bg-green-500 hover:text-white hover:bg-green-900 m-4 p-4 rounded">{{ config('app.name') }} Table</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>
</div>
    @if ($showBanner)
        <div class="flex justify-between"><span class="text-4xl">&nbsp; &nbsp;</span> <span class="text-4xl mb-4">Pokemon Character List</span> <span class="mt-6">Rows per page</span></div>
    @endif
</div>