<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'save'])->name('site.contato');

Route::get('/login/{error?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'auth'])->name('site.login');

Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::middleware('autenticacao')->prefix('/app')->group(function () {

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');

    Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

    Route::get('/cliente', [\App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');

    Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');

    Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');

    Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    Route::get('/produto', [\App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');

});

Route::get('/teste{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

Route::fallback(function () {
    echo 'A rota acessada não existe. Clique <a href="'. route('site.index') .'">aqui</a> para acessar a página inicial';
});

/*

Exemplo de como passar parametros

Route::get('/contato/{name}/{category}', function (string $name, int $category = 1) {
    echo 'Estamos aqui: '. $name . ' - ' . $category;
})->where('category', '[0-9]+')->where('name', '[A-Za-z]+');
*/
