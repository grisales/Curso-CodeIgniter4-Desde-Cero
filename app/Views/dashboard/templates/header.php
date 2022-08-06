<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/dashboard/css/style.custom.css">
    <link rel="stylesheet" href="<?= base_url() ?>/fontawesome/css/all.min.css">

    <title><?php echo $title ?></title>
</head>
<body>

<!-- Inicio del navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #228B22;">
  <a class="navbar-brand" href="<?= base_url() ?>">
    <img width="120px" src="<?= base_url() ?>/dashboard/images/logo.png" alt="Brand Navbar">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CRUD
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url() ?>/dashboard/movie"><i class="fa-solid fa-film mr-2"></i> Películas</a>
          <a class="dropdown-item" href="<?= base_url() ?>/dashboard/category"><i class="fa-solid fa-masks-theater mr-2"></i> Categorías</a>
          <a class="dropdown-item" href="<?= base_url() ?>/dashboard/user"><i class="fa fa-user mr-2"></i> Usuario</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- Fin del navbar -->

<h1 class="text-center mt-3 mb-3">
    <?php echo $title ?>
</h1>
<!-- Inicio del container -->
<div class="container-md">
  <hr>
  
    <?= view("dashboard/partials/_session"); ?>