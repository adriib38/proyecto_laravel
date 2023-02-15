<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;

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

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

/**
 * Rutas de eventos. Para el metodo show se pasara por el middleware de autenticacion
 */

Route::resource('events', EventController::class)
->parameters(['events' => 'event'])
->names([
    'index' => 'events.index',
    'create' => 'events.create',
    'store' => 'events.store',
    'show' => 'events.show',
    'edit' => 'events.edit',
    'update' => 'events.update',
    'destroy' => 'events.destroy',
]);

// Inscribirse y desinscribirse de un evento
Route::get('events/signup/{event}', [EventController::class, 'signup'])->name('events.signup');
Route::get('events/unsignup/{event}', [EventController::class, 'unsignup'])->name('events.unsignup');


Route::middleware(["auth"])->group(function (){
    Route::resource('events', EventController::class)->only(['show']);
});

Route::middleware(["isAdmin"])->group(function (){
    Route::resource('events', EventController::class)->only(['edit']);
});

/**
 * Rutas de miembros
 */
Route::resource('members', UsersController::class)
->parameters(['members' => 'member'])
->names([
    'index' => 'members.index',
    'create' => 'members.create',
    'show' => 'members.show',
    'edit' => 'members.edit',
    'store' => 'members.store',
    'update' => 'members.update',
])->except(['destroy']);


/**
 * Rutas de mensajes
 */
Route::resource('messages', MessageController::class)
->parameters(['messages' => 'message'])
->names([
    'index' => 'messages.index',
    'create' => 'messages.create',
    'show' => 'messages.show',
    'edit' => 'messages.edit',
    'store' => 'messages.store',
])->except(['update', 'destroy']);

/** Donde estamos ruta */
Route::get('donde_estamos', function () {
    return view('donde_estamos');
})->name('donde_estamos');

/* AUTH */
Route::get('register', [LoginController::class, 'registerForm']);
Route::post('register', [LoginController::class, 'register'])->name('register');
Route::get('login', [LoginController::class, 'loginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

/* Politicas */
Route::get('politica_privacidad', function () { return view('politicas.politica_privacidad'); });
Route::get('politica_cookies', function () { return view('politicas.politica_cookies'); });
Route::get('config_politica_cookies', function () { return view('politicas.config_politica_cookies'); });
Route::get('politica_uso', function () { return view('politicas.politica_uso'); });
