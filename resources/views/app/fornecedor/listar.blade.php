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
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>
                                Nome
                            </th>
                            <th>
                                Site
                            </th>
                            <th>
                                UF
                            </th>
                            <th>
                                E-mail
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fornecedores as $fornecedor)
                            <th>
                                {{ $fornecedor->nome }}
                            </th>
                            <th>
                                {{ $fornecedor->site }}
                            </th>
                            <th>
                                {{ $fornecedor->uf }}
                            </th>
                            <th>
                                {{ $fornecedor->email }}
                            </th>
                            <th>
                                <a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a>
                            </th>
                            <th>
                                <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a>
                            </th>
                        @endforeach
                    </tbody>
                </table>
                {{ $fornecedores->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
