<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('helloworld', function () {
    return '<h1>Hello World! 👻</h1>';
});

Route::get('getallpets', function () {
    $pets = \App\Models\Pet::take(10)->get();
    dd($pets->toArray());
});

Route::get('sayhello/{name}', function ($name) {
    return '<h1>Hello  '  . $name . '! 👻</h1>';
});

Route::get('view/showpet/{id}', function () {
    $pet = \App\Models\Pet::find(request()->id);
    return view('showpet')->with('pet', $pet);
});

Route::get('challenge', function () {
    $users = \App\Models\User::get();
    echo '<table border="1">' .
        '<tr>' .
        '<td>Document</td>' .
        '<td>Fullname</td>' .
        '<td>Birthdate</td>' .
        '<td>Age</td>' .
        '<td>Photo</td>' .
        '<td>Email</td>' .
        '<td>Active</td>' .
        '<td>Role</td>' .
        '<td>Created At</td>' .
        '</tr>';
    foreach ($users as $user) {
        echo 
        '<tr>' .
        '<td>' . $user->document . '</td>' .
        '<td>' . $user->fullname . '</td>' .
        '<td>' . $user->birthdate . '</td>' .
        '<td>' . (new DateTime($user->birthdate))->diff(new DateTime())->y . '</td>' .
        '<td> <img src="' . asset($user->photo) . '" alt="Photo" width="50" height="50"></td>' .
        '<td>' . $user->email . '</td>' .
        '<td>' . ($user->active == 1 ? 'Yes' : 'No') . '</td>' .
        '<td>' . $user->role . '</td>' .
        '<td>' . $user->created_at->diffForHumans() . '</td>' .
        '</tr>' ;
        
    }
    echo '</table>';
});
Route::get('view/allpets', function(){
    $pets = App\Models\Pet::all();
    return view('listpets')->with('pets', $pets);
});