<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\CustomerController;
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
Route::group(['middleware' => 'Admin', 'auth'], function () {
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
Route::middleware('auth')->group(function () {
    Route::get('myprofile/', [CustomerController::class, 'myprofile']);
    Route::put('myprofile/{id}', [CustomerController::class, 'updatemyprofile']);

    Route::get('myadoptions/', [CustomerController::class, 'myadoptions']);
    Route::get('myadoption/{id}', [CustomerController::class, 'showmyadoption']);

    Route::get('listpets/', [CustomerController::class, 'listpets']);
    Route::get('showpet/{id}', [CustomerController::class, 'showpet']);

    Route::post('makeadoption/', [CustomerController::class, 'makeadoption']);
    Route::post('search/myadoptions', [CustomerController::class, 'search']);

    Route::post('search/listpets', [CustomerController::class, 'searchpets']);
});
Route::group(['middleware' => 'Customer', 'auth'], function () {
    // Rutas del cliente
});


require __DIR__ . '/auth.php';
