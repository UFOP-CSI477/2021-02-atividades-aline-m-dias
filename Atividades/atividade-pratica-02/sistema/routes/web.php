<?php

use Illuminate\Support\Facades\Route;
use App\Models\Equipamento;
use App\Models\Registro;
use App\Models\User;
use App\Http\Controllers\EquipamentoController;

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

Route::get('/principal', function () {
    return view('principal');
})->name('principal');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


// route::get('/equipamento', function () {
//     return view('lista');
// })->name('lista');

// route::get('/manutencao', function () {
//     return view('lista');
// })->name('lista');

Route::get('/', function () {
    return view('home');
});

Route::get('/users/index', function () {
    $users = User::orderBy('name')->paginate(20);
    return view('users.index', ['users' => $users]);
})->middleware(['auth']);

Route::get('/users/create', function () {
    return view('users.create');
})->middleware(['auth']);

Route::get('/manutencoes/create', function () {
    $equipamentos = Equipamento::get();
    return view('manutencoes.create', ['equipamentos' => $equipamentos]);
})->middleware(['auth']);


Route::get('/app', function () {
    return view('app');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('/equipamentos', EquipamentoController::class);
Route::resource('/manutencoes', RegistroController::class);
