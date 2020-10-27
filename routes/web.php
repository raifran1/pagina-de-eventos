<?php

use App\Http\Controllers\EventController;
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

// Chamada de controller através de chamada de função específica; //

// Página inicial
Route::get('/', [EventController::class, 'index'])->name('home');

// Meus Eventos
Route::get('/meus-eventos',[EventController::class, 'my_events'])->middleware(('auth'))->name('my_events');

// Rota da tela de cadastro
Route::get('/events/create', [EventController::class, 'create'])->middleware(('auth'))->name('cadastro_evento_get');

// Rota do post de cadastro
Route::post('/events/post/create-edit', [EventController::class, 'store'])->middleware(('auth'))->name('create_edit_evento_post');

// Rota da tela de edição
Route::get('/events/{event}/edit/', [EventController::class, 'edit'])->middleware(('auth'))->name('editar_evento_get');
Route::post('/events/{event}/edit/', [EventController::class, 'edit'])->middleware(('auth'))->name('editar_evento_post');

// Endpoint gerar relatório
Route::get('/events/relatorio/', [EventController::class, 'relatorios'])->middleware(('auth'))->name('events_relatorios');

// Rota da tela de deletar
Route::get('/events/{id}/delete/', [EventController::class, 'delete'])->middleware(('auth'))->name('deletar_evento_get');

// Query string para buscas
Route::get('/contact', function () {
    $busca = request('search');
    return view('contact', ['busca' => $busca]);
});

// Rota com envio de dado obrigatório pela url e definindo um valor default.
Route::get('/contact/{id}', function ($id = 1) {
    return view('contact', ['id' => $id]);
}); 

// Rota com envio de dado pela url.
Route::get('/contact_teste/{id?}', function ($id) {
    return view('contact', ['id' => $id]);
});

// rotas para o módulo built-in de autenticação
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
