<div>
    <header>
        <nav class="bg-blue-500 text-white fixed w-full z-20 top-0 start-0 border-b border-gray-200
                dark:text-white dark:bg-gray-900 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" wire:navigate class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img class="h-8" src="images/pikachu.jpeg" alt="Pikachu">
                    <span class="flex justify-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                        {{ config('app.name') }}
                    </span>
                </a>

                <div id="navbar-sticky"
                     class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                    <ul class="bg-blue-500 flex flex-col md:p-0 px-2.5 mt-4 font-medium border border-gray-100 md:flex-row md:mt-0 md:border-0 md:bg-white
                        dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="/pokedex" wire:navigate class="block p-4 bg-blue-500 pl-4 py-2 text-gray-100 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
                                md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                               {{ config('app.name') }} Table
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

    </header>
</div>
