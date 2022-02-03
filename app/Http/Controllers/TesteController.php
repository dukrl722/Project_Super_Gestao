<?php

namespace App\Http\Controllers;

class TesteController
{
    public function teste(int $param1, int $param2) {
        //echo "A soma de $param1 + $param2 é:" . ($param1 + $param2);
        // return view('site.teste', ['first' => $param1, 'second' => $param2]); array associativo
        // return view('site.teste', compact('param1', 'param2')); compact
        return view('site.teste')->with('param1', $param1)->with('param2', $param2);
    }
}
