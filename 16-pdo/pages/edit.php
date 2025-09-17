<?php
    include '../config/app.php';
    include '../config/database.php';
    include '../config/security.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Edit</title>
    <link rel="stylesheet" href="<?=$css?>stylee.css">
</head>
<body>
    <main class="edit">
        <header>
            <h2>Modificar Mascota</h2>
            <a href="dashboard.php" class="back"></a>
            <a href="../index.php" class="close"></a>
        </header>
         <?php  
            $pet = showPet($_GET['id'], $conx);
        ?>
        <figure class="photo-preview">
            <img src="../uploads/<?=$pet['photo']?>" alt="">
        </figure>
        <form action="" method="post">
            <input type="hidden" name="idPet" value="<?php echo $_GET['id'] ?>">
            <input type="text" name="name" placeholder="Nombre" value="<?= $pet['name'];?>">
           <div class="select">
                <select name="specie_id">
                    <option value="">Seleccione Especie...</option>
                    <?php $species = listSpecies($conx) ?>
                    <?php foreach ($species as $specie): ?>
                        <option value="<?= $specie['id'] ?>" <?php if (isset($_POST['specie_id']) && $_POST['specie_id'] == $specie['id']) echo "selected" ?>><?= $specie['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="select">
                <select name="breed_id">
                    <option value="">Seleccione Raza...</option>
                    <?php $breeds = listbreeds($conx) ?>
                    <?php foreach ($breeds as $breed): ?>
                        <option value="<?= $breed['id'] ?>" <?php if (isset($_POST['breed_id']) && $_POST['breed_id'] == $breed['id']) echo "selected" ?>><?= $breed['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="select">
                <select name="sex_id">
                    <option value="">Seleccione Genero...</option>
                    <?php $sexes = listSexes($conx) ?>
                    <?php foreach ($sexes as $sex): ?>
                        <option value="<?= $sex['id'] ?>" <?php if (isset($_POST['sex_id']) && $_POST['sex_id'] == $sex['id']) echo "selected" ?>><?= $sex['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button class="update">Modificar</button>
        </form>
         <?php
        if ($_POST) {
            // var_dump($_POST);
            $errors = 0;

            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    $errors++;
                }
            }
            if ($errors == 0) {
                $id        = $_POST['id'] ;
                $name      = $_POST['name'];
                $specie_id = $_POST['specie_id'];
                $breed_id  = $_POST['breed_id'];
                $sex_id    = $_POST['sex_id'];
                if (editPet($id ,$name, $specie_id, $breed_id, $sex_id, $conx)) {
                    $_SESSION['message'] = "La mascota: $name fue actualizada con exito!";
                    echo "<script>window.location.replace('dashboard.php')</script>";
                }
            } else {
                $_SESSION['error'] = "Todos los campos son requeridos!";
            }
        }
        if (isset($_SESSION['error'])) {
            include 'errors.php';
            unset($_SESSION['error']);
        }
        ?>
    </main>
     <script>
        const preview = document.querySelector('#preview');
        const upload = document.querySelector('.upload');
        const photo = document.querySelector('#photo');

        upload.addEventListener('click', function(e) {
            photo.click()
        })

        photo.addEventListener('change', function(e) {
            preview.src = window.URL.createObjectURL(this.files[0])
        })
    </script>
</body>
</html>