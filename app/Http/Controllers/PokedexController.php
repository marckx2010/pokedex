<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    public function overview(string $name)
    {
        return view('pages.pokie', ['name' => $name]);
    }
}