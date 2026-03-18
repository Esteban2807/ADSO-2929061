<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List All Pets (View)</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('css/daisyui5.css') }}" rel="stylesheet" type="text/css"/>
</head>

<body class="bg-emerald-900 p-12 h-100vh">
    <h1 class="text-white p-2 text-2xl text-center mb-8">List One Pet</h1>
    <div class="flex flex-1 flex-col justify-center items-center bg-base-100 rounded-box border border-base-content/5 p-4">
        <div class="avatar">
            <div class="ring-primary ring-offset-base-100 w-24 rounded-full ring-2 ring-offset-2">
                <img src="https://img.daisyui.com/images/profile/demo/spiderperson@192.webp" />
            </div>
        </div>
        <div class="flex flex-col items-center justify-center">
            <ul>
                <li>ID:{{ $pet->id }}</li>
                <li>Name:{{ $pet->name }}</li>
                <li>Kind:{{ $pet->kind }}</li>
                <li>Breed:{{ $pet->breed }}</li>
            </ul>
        </div>
    </div>
    <script src="{{asset('js/tailwindcss5.js')}}"></script>
</body>

</html>