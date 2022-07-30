<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="<?= route_to('paginaDeContacto','Juan') ?>">Contacto</a> |
<a href="<?= route_to('paginaDePeliculas','') ?>">Pelis</a> |
<!-- <a href="<?= route_to('nuevaPelicula','') ?>">Nueva Peli</a> -->
<h1 style="color:blue;">
    <?php echo $title ?>
</h1>

<div style="color:red;"><?= view("dashboard/partials/_session"); ?></div>