<?php

use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/oi', function () {
    return view('dashboard');
})->middleware(['auth'])->name('oi');

Route::get('/index', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');


Route::post('contacts/store', [ContactController::class, 'store'])->name('contacts.store');

Route::patch('contacts/{contact}/edit', [ContactController::class, 'update'])->name('contacts.update');

Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.delete');


require __DIR__.'/auth.php';
