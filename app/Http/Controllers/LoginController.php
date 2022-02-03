<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $error = $request->get('error') ? $request->get('error') : '';

        return view('site.login', [
            'title' => 'Login',
            'error' => $error
        ]);
    }

    public function auth(Request $request) {
        $rules = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'Usuário ou senha incorretos',
            'senha.required' => 'Usuário ou senha incorretos'
        ];

        $request->validate($rules, $feedback);

        $userRequest = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $exists = $user->where('email', $userRequest)->where('password', $password)->get()->fisrt();

        if (isset($exists->name)) {
            session_start();
            $_SESSION['nome'] = $exists->name;
            $_SESSION['email'] = $exists->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 'Usuário ou senha inválidos']);
        }
    }

    public function sair() {
        session_destroy();

        return redirect()->route('site.index');
    }
}
