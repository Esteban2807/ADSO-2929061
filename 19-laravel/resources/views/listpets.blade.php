<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List All Pets (View)</title>
    <link href="{{ asset('css/daisyui5.css') }}" rel="stylesheet" type="text/css"/>
</head>

<body class="bg-emerald-900 p-12 ">
    <h1 class="text-white p-2 text-2xl text-center mb-8">List All Pets (View)</h1>
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead class="bg-emerald-400">
                <tr class="text-white">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Kind</th>
                    <th>Breed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($pets as $pet )
                <tr>
                    <th>{{ $pet->id }}</th>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->kind }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>
                        <a  href="{{ url('view/showpet/' . $pet->id) }}">
                            <svg class="hover:scale-150 transition-all" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
                        </a>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{asset('js/tailwindcss5.js')}}"></script>

</body>

</html>