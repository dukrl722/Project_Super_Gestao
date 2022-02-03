<?php

namespace App\Http\Controllers;

use App\MotivoContato;

class PrincipalController
{
    public function principal() {

        $motivo_contato = MotivoContato::all();

        return view('site.principal', ['motivo_contato' => $motivo_contato]);
    }
}
