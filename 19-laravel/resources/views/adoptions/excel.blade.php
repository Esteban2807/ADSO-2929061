<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Adoptions</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Photo</th>
                <th>User Full Name</th>
                <th>Pet Image</th>
                <th>Pet Name</th>
                <th>Pet Kind</th>
                <th>Adoption Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptions as $adoption)
            <tr>
                <td>{{ $adoption->id }}</td>
                <td>
                    @if ($adoption->user->photo)
                        <img src="{{ asset($adoption->user->photo) }}" style="width: 50px; height: 50px; border-radius: 9999px; object-fit: cover;" />
                    @endif
                </td>
                <td>{{ $adoption->user->fullname }}</td>
                <td>
                    @if ($adoption->pet->image)
                        <img src="{{ asset($adoption->pet->image) }}" style="width: 50px; height: 50px; border-radius: 9999px; object-fit: cover;" />
                    @endif
                </td>
                <td>{{ $adoption->pet->name }}</td>
                <td>{{ $adoption->pet->kind }}</td>
                <td>{{ $adoption->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
