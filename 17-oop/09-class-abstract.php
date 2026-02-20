<?php
include_once 'class/pokemons.php';
$title    = '09-class-abstract';
$description = 'A class that cannot be instantiated, only extended from.';

include_once 'template/header.php';
echo "<section>";




$lista = new pokemons();

$res = $lista->listar();
?>
<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Tipo</td>
                <td>Entrenador</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $registro) { ?>
                <tr>
                    <td><?php echo $registro['id']; ?></td>
                    <td><?php echo $registro['name']; ?></td>
                    <td><?php echo $registro['tipo']; ?></td>
                    <td><?php echo $registro['trainer']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php
include_once 'template/footer.php';

?>