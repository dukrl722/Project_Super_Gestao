@extends('site.layouts.basic')

@section('titulo', $title)

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <form action="{{ route('site.login') }}" method="post">
                    @csrf
                    <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Usuário" class="border-black">
                    <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha" class="border-black">
                    {{ $errors->has('usuario') or $errors->has('senha') ? $errors->first() : '' }}
                    <button type="submit" class="border-black">Acessar</button>
                </form>
                {{ isset($error) && $error != '' ? $error : '' }}
            </div>
        </div>
    </div>

@endsection
