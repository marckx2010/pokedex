<?php

namespace App\Http\Controllers;

class PokedexController extends Controller
{
    public function overview(string $name)
    {
        // encode the referer into a base 64 string
        $b64 = base64_encode($name . "|" . $_SERVER['HTTP_REFERER']);
        return view('pages.pokie', ['b64' => $b64]);
    }
}