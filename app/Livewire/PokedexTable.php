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
        $this->setPerPageAccepted([10, 15, 20, 50, 100, $all]);
        $this->setPerPage(15);
        $this->setEmptyMessage('No Pokemen found - try to reseed');
        $this->setColumnSelectStatus(false);
    }


    public function columns(): array
    {
        return [
            Column::make('Name')
                ->format(
                    fn($value, $row, Column $column) => '<a href="/overview/' . $row->name . '">'. $row->name . '</a>'
                )
                ->html()
                ->searchable(),
        ];
    }
}