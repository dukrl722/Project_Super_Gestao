@extends('app.layouts.basic')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Fornecedor - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('app.fornecedor.adicionar') }}">Novo</a>
                </li>
                <li>
                    <a href="{{ route('app.fornecedor') }}">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina-2">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                ... Lista ...
            </div>
        </div>
    </div>
@endsection
