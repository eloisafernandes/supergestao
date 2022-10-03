<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function(){ return 'login';})->name('site.login');

//passando parametros para controladores
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'produtos';})->name('app.produtos');
});
Route::fallback(function(){
    echo 'A rota acessada não pode ser encontrada, <a href="'.route("site.index").'">clique aqui</a> para ir para página inicial';
});
//redirecionamento de rotas
Route::get('/rota1', function(){
    echo 'Rota 1';

})->name('site.rota1');
//duas formas: dentro da função de callback ou fora com:
    //Route::redirect('/rota2', '/rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');


//o nome da string pode ser qualquer um, o importante é a ordem desses parâmetros
// o caractere '?' indica que o parâmetro é opcional
//Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', function (string $nomequalquer = 'Eloisa', string $categoria = 'Teste Padrão', string $assunto ="Anitta", string $mensagem = "Estátua da Anitta"){
   // echo 'Informações Principais: '.$nomequalquer.' - '.$categoria.'<br/>Assunto: '.$assunto.'<br/> Mensagem: '.$mensagem;
//});

//caso com expressões regulares e tratamento de erros
/*Route::get('/contato/{nome}/{categoria_id}', 
    function (
        string $nome = 'Eloisa', 
        int $categoria_id = 1 // 1 - Informação
        ){
            echo 'Informações Principais: '.$nome.' - '.$categoria_id;
        }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');*/