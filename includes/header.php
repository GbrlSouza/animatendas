<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anima Tendas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./../assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="./../../animatendas/pages/index.php">Anima Tendas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="./../../animatendas/pages/index.php">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="./../../animatendas/pages/produtos.php">Produtos</a></li>
          <li class="nav-item"><a class="nav-link" href="./../../animatendas/pages/contato.php">Contato</a></li>
          <li class="nav-item"><a class="nav-link" href="./../../animatendas/pages/sobre.php">Sobre</a></li>
        </ul>
        <a href="./../admin/login.php" class="btn btn-light fw-bold">Área restrita</a>
      </div>
    </div>
  </nav>