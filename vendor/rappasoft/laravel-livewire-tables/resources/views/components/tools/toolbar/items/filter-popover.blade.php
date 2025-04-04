@aware(['component', 'tableName','isBootstrap','isBootstrap4','isBootstrap5'])
@if($this->isBootstrap)
    <ul
        x-cloak
        @class([
            'dropdown-menu w-100 mt-md-5' => $this->isBootstrap4,
            'dropdown-menu w-100' => $this->isBootstrap5,
        ])
        x-bind:class="{ 'show': filterPopoverOpen }"
        role="menu"
    >
        @foreach ($this->getVisibleFilters() as $filter)
            <div
                wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}-toolbar"
                @class([
                    'p-2' => $this->isBootstrap,
                ])
                id="{{ $tableName }}-filter-{{ $filter->getKey() }}-wrapper"
            >
                {{ $filter->setGenericDisplayData($this->getFilterGenericData)->render() }}
            </div>
        @endforeach

        @if ($this->hasAppliedVisibleFiltersWithValuesThatCanBeCleared())
            <div
                @class([
                    'dropdown-divider' => $this->isBootstrap,
                ])
            >
            </div>

            <button
                wire:click.prevent="setFilterDefaults" x-on:click="filterPopoverOpen = false"
                @class([
                    'dropdown-item btn text-center' => $this->isBootstrap4,
                    'dropdown-item text-center' => $this->isBootstrap5,
                ])
            >
                @lang('livewire-tables::Clear')
            </button>
        @endif
    </ul>
@else
    <div
        x-cloak x-show="filterPopoverOpen"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-left absolute left-0 mt-2 w-full md:w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-50 dark:bg-gray-700 dark:text-white dark:divide-gray-600"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="filters-menu"
    >
        @foreach ($this->getVisibleFilters() as $filter)
            <div class="py-1" role="none">
                <div
                    class="block px-4 py-2 text-sm text-gray-700 space-y-1"
                    role="menuitem"
                    id="{{ $tableName }}-filter-{{ $filter->getKey() }}-wrapper"
                >
                    {{ $filter->setGenericDisplayData($this->getFilterGenericData)->render() }}
                </div>
            </div>
        @endforeach

        @if ($this->hasAppliedVisibleFiltersWithValuesThatCanBeCleared())
            <div class="block px-4 py-3 text-sm text-gray-700 dark:text-white" role="menuitem">
                <button
                    x-on:click="filterPopoverOpen = false"
                    wire:click.prevent="setFilterDefaults"
                    type="button"
                    class="w-full inline-flex items-center justify-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:border-gray-500 dark:hover:bg-gray-600"
                >
                    @lang('livewire-tables::Clear')
                </button>
            </div>
        @endif
    </div>
@endif