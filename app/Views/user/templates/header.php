<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/user/css/style.custom.css">

    <title> <?php echo "Login :: ".$site ?></title>
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
        <!-- <a class="nav-link" href="">Logout <span class="sr-only">(current)</span></a> -->
      </li>
  </ul>
  </div>
</nav>
<!-- Fin del navbar -->

<!-- Inicio del container -->
<div class="container-md">