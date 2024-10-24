<?php declare(strict_types=1);

use App\Http\Controllers\PokedexController;
use App\Livewire\Home;
use App\Livewire\PokedexTable;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/pokedex', PokedexTable::class)->name('pokedex');

// called from table -
Route::view('pages/pokie', 'pages.pokie')->name('pokie');

// this then gets and displays overview info
Route::get('overview/{name}', [PokedexController::class, 'overview'])->name('overview');