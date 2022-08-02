<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<a href="<?= route_to('paginaDeContacto','Juan') ?>">Contacto</a> |
<a href="<?= route_to('paginaDePeliculas','') ?>">Pelis</a> |
<h1>
    <?php echo $title ?>
</h1>

<!-- Inicio del container -->
<div class="container-md">

    <?= view("dashboard/partials/_session"); ?>