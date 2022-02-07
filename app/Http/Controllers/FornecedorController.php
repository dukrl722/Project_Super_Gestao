<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use http\Env\Request;

class FornecedorController
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedor = new Fornecedor();
        $fornecedoresList = $fornecedor->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedoresList]);
    }

    public function adicionar(Request $request) {
        if ($request->input('_token') != '') {
            $msg = '';

            $rules = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :atrribute deve ser preenchido',

                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',

                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no mínimo 2 caracteres',

                'email' => 'O email deve ser válido',
            ];

            $request->validate($rules, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro feito com sucesso';
        }

        return view('app.fornecedor.adicionar');
    }
}
