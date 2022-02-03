<?php

namespace App\Http\Controllers;

class SobreNosController
{
    public function __construct() {
        $this->middleware('log.acesso');
    }

    public function sobreNos() {
        return view('site.sobre-nos');
    }
}
