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

Route::get('getall/showpet/{id}', function () {
    $pet = \App\Models\Pet::find(request()->id);
    dd($pet->toArray());
});

Route::get('getall/users', function () {
    $users = \App\Models\User::get();
    echo '<table border="1">' .
        '<tr>' .
        '<td>Document</td>' .
        '<td>Fullname</td>' .
        '<td>Gender</td>' .
        '<td>Birthdate</td>' .
        '<td>Age</td>' .
        '<td>Photo</td>' .
        '<td>Phone</td>' .
        '<td>Email</td>' .
        '<td>Active</td>' .
        '<td>Role</td>' .
        '</tr>';
    foreach ($users as $user) {
        echo 
        '<tr>' .
        '<td>' . $user->document . '</td>' .
        '<td>' . $user->fullname . '</td>' .
        '<td>' . $user->gender . '</td>' .
        '<td>' . $user->birthdate . '</td>' .
        '<td>' . (new DateTime($user->birthdate))->diff(new DateTime())->y . '</td>' .
        '<td> <img src="' . asset($user->photo) . '" alt="Photo" width="50" height="50"></td>' .
        '<td>' . $user->phone . '</td>' .
        '<td>' . $user->email . '</td>' .
        '<td>' . ($user->active == 1 ? 'Yes' : 'No') . '</td>' .
        '<td>' . $user->role . '</td>' .
        '</tr>' ;
        
    }
    echo '</table>';
});