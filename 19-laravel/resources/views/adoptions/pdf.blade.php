<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Adoptions</title>
    <style>
        table {
            border: 2px solid #aaa;
            border-collapse: collapse;
            width: 100%;
        }
        table th, table td {
            font-family: sans-serif;
            font-size: 10px;
            border: 2px solid #ccc;
            padding: 4px;
        }
        table tr:nth-child(odd) {
            background-color: #eee;
        }
        table th {
            background-color: #666;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; font-family: sans-serif;">All Adoptions Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Full Name</th>
                <th>Pet Name</th>
                <th>Pet Kind</th>
                <th>Adoption Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptions as $adoption)
            <tr>
                <td>{{ $adoption->id }}</td>
                <td>{{ $adoption->user->fullname }}</td>
                <td>{{ $adoption->pet->name }}</td>
                <td>{{ $adoption->pet->kind }}</td>
                <td>{{ $adoption->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
