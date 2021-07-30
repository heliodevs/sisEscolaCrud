<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cursoController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/cadastroCurso',  [cursoController::class,  'cadastrarCurso'])->middleware(['auth'])->name('cadastrarCurso');

Route::post('/salvarCurso',  [cursoController::class,  'salvarCurso'])->middleware(['auth']);

Route::get('/listCurso',  [cursoController::class,  'listaCurso'])->middleware(['auth'])->name('listCurso');

Route::get('/delCurso',  [cursoController::class,  'delCurso'])->middleware(['auth'])->name('delCurso');

Route::get('/editCurso',  [cursoController::class,  'editCurso'])->middleware(['auth'])->name('editCurso');

Route::post('/editCursoSalv',  [cursoController::class,  'editCursoSalv'])->middleware(['auth'])->name('editCursoSalv');

Route::get('/cadAluno',  [cursoController::class,  'cadAluno'])->middleware(['auth'])->name('cadAluno');

Route::post('/salvarAluno',  [cursoController::class,  'salvarAluno'])->middleware(['auth']);

Route::post('/editAlunoSalv',  [cursoController::class,  'editAlunoSalv'])->middleware(['auth'])->name('editAlunoSalv');

Route::get('/editAluno',  [cursoController::class,  'editAluno'])->middleware(['auth'])->name('editAluno');

Route::get('/listAluno',  [cursoController::class,  'listAluno'])->middleware(['auth'])->name('listAluno');

Route::get('/delAluno',  [cursoController::class,  'delAluno'])->middleware(['auth'])->name('delAluno');

Route::get('/buscaAluno', [cursoController::class,  'buscaAluno'])->middleware(['auth'])->name('buscaAluno');

Route::get('/impXml', [cursoController::class,  'impXml'])->middleware(['auth'])->name('impXml');

Route::post('/saveImport',  [cursoController::class,  'saveImport'])->middleware(['auth'])->name('saveImport');



require __DIR__.'/auth.php';
