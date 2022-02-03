<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use http\Env\Request;
use App\SiteContato;

class ContatoController
{
    public function contato(Request $request) {

        $motivo_contato = MotivoContato::all();

        $contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save();

        // outra maneira de fazer

        $contato->fill($request->all());

        // ou

        $contato->create($request->all());

        // a maneira de fazer utilizando fill necessita do save, já o create não necessita

        return view('site.contato', ['title' => 'Contato', 'motivo_contato' => $motivo_contato]);
    }

    public function save(Request $request) {

        $rules = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido.',

            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome não pode ter mais do que 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',

            'telefone.required' => 'O campo telefone precisa ser preenchido',

            'email.email' => 'O formato do email é inválido',

            'mensagem.max' => 'O campo não pode ter mais do que 2000 caracteres'
        ];

        $request->validate(
            $rules, $feedback
        );

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
