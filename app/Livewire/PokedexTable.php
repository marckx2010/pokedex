<?php

namespace App\Livewire;

use App\Models\Pokedex;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;
use Rappasoft\LaravelLivewireTables\Views\Column;


class PokedexTable extends DataTableComponent
{
    protected $model = Pokedex::class;

    /**
     * @throws DataTableConfigurationException
     */
    public function configure(): void
    {
        $all = Pokedex::query()->count();
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([5, 10, 15, 20, 50, 100, $all]);
        $this->setPerPage(15);
        $this->setEmptyMessage('No Pokemen found - try to reseed');
        $this->setColumnSelectStatus(false);

        $this->setSearchFieldAttributes([
            'class' => 'text-2xl p-2 border-2 border-grey-light',
        ]);

        $this->perPageFieldAttributes = ['default-styling' => false, 'default-colors' => true, 'class' => 'text-2xl p-2'];
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->format(
                    fn($value, $row, Column $column) => <<<HTML
                        <a class="ml-11 p-2 rounded justify-center" href="/overview/$row->name">
                            <button type="button" class="text-white bg-blue-500 text-2xl ml-11 p-2 rounded justify-center">
                                $row->name
                            </button>
                        </a>
                    HTML
                )
                ->html()
                ->searchable(),
        ];
    }
}