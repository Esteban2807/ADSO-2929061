<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC: Model | View | Controller</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-black min-h-[100dvh] flex flex-col text-white">
    <h1 class="text-2xl font-semibold text-center">MVC</h1>
    <small class="text-center text-xl">Model| View | Controller</small>

    <h2 class="mt-10 text-center text-xl font-bold border-b-1 pb-2">List Pokemons</h2>
    <table class="table border-collapse border-white border-2">
        <a href="" class="btn btn-success flex mx-auto w-[200px] my-4">Add Pokemon</a>
        <thead>
            <th class="bg-white text-black font-bold border-white border-2">Id</th>
            <td class="bg-white text-black font-bold border-white border-2">Name</td>
            <th class="bg-white text-black font-bold border-white border-2">Type</th>
            <th class="bg-white text-black font-bold border-white border-2" colspan="3">Actions</th>
        </thead>
        <tbody>
            <?php foreach ($data as $pokemon) { ?>
                <tr>
                    <td class="border-white border-1"><?= $pokemon['id']  ?></td>
                    <td class="border-white border-1"><?= $pokemon['name']  ?></td>
                    <td class="border-white border-1"><?= $pokemon['tipo']  ?></td>
                    <td class="border-white border-l-1">Consultar</td>
                    <td class="border-white border-y-1">
                        <form action="index.php?page=eliminar" method="POST">
                            <input type="hidden" name="id" value="<?= $pokemon['id'] ?>">
                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 256 256">
                                    <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                                </svg></button>
                        </form>
                    </td>
                    <td class="border-white border-r-1">
                        <form action="index.php?page=eliminar" method="POST">
                            <input type="hidden" name="id" value="<?= $pokemon['id'] ?>">
                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 256 256"><path d="M224,128a96,96,0,0,1-94.71,96H128A95.38,95.38,0,0,1,62.1,197.8a8,8,0,0,1,11-11.63A80,80,0,1,0,71.43,71.39a3.07,3.07,0,0,1-.26.25L44.59,96H72a8,8,0,0,1,0,16H24a8,8,0,0,1-8-8V56a8,8,0,0,1,16,0V85.8L60.25,60A96,96,0,0,1,224,128Z"></path></svg></button>
                        </form></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>