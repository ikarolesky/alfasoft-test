<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ContactsController::class, 'index']);


Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Contacts Routes
    Route::get('/contacts/create', [ContactsController::class, 'create'])->name('contacts.create');
    Route::post('/contacts/store', [ContactsController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/edit/{id}', [ContactsController::class, 'edit'])->name('contacts.edit');
    Route::get('/contacts/show/{id}', [ContactsController::class, 'show'])->name('contacts.view');
    Route::patch('/contacts/update/{id}', [ContactsController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/delete/{id}', [ContactsController::class, 'destroy'])->name('contacts.delete');
});

require __DIR__.'/auth.php';
