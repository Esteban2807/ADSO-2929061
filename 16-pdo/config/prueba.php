<?php
include '../config/app.php';
include '../config/database.php';
include '../config/security.php';

$photo = $conx->prepare("SELECT photo FROM pets WHERE id = 16;");
$photo->execute();
$fotos = $photo->fetch(PDO::FETCH_ASSOC);
echo print_r($fotos);
echo $fotos['photo'];

?>