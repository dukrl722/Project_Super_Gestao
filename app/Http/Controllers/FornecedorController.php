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
            ->paginate(2);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedoresList, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {
        $fornecedor = new Fornecedor();

        if ($request->input('_token') != '' && $request->input('id') == '') {
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

            $fornecedor->create($request->all());

            $msg = 'Cadastro feito com sucesso';
        } else if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedorId = $fornecedor->find($request->input('id'));
            $update = $fornecedorId->update($request->all());

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id')]);
        }

        return view('app.fornecedor.adicionar');
    }

    public function editar($id, Request $request) {
        $fornecedores = new Fornecedor();

        $fornecedor = $fornecedores->find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
    }

    public function excluir($id, Request $request) {
        Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
