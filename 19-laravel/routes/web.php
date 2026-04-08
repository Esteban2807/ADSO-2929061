<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::resources([
        'users' => UserController::class,
        'pets' => PetController::class,
        'adoptions' => AdoptionController::class,
    ]);
    Route::get('export/users/pdf', [UserController::class, 'pdf']);
    Route::get('export/users/excel', [UserController::class, 'excel']);
    Route::get('export/pets/pdf', [PetController::class, 'pdf']);
    Route::get('export/pets/excel', [PetController::class, 'excel']);
    Route::get('export/adoptions/pdf', [AdoptionController::class, 'pdf']);
    Route::get('export/adoptions/excel', [AdoptionController::class, 'excel']);

    // Import excel 
    Route::post('import/users', [UserController::class, 'import']);

    Route::post('search/users', [UserController::class, 'search']);
    Route::post('search/pets', [PetController::class, 'search']);
    Route::post('search/adoptions', [AdoptionController::class, 'search']);
});


require __DIR__.'/auth.php';
