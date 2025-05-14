<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}
include('../includes/db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];
  $imagem = $_FILES['imagem']['name'];
  move_uploaded_file($_FILES['imagem']['tmp_name'], "../assets/img/produtos/$imagem");
  mysqli_query($conn, "INSERT INTO produtos (nome, preco, descricao, imagem) VALUES ('$nome', '$preco', '$descricao', '$imagem')");
  header('Location: produtos.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Admin - Novo Produto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
  <h2>Adicionar Novo Produto</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" class="form-control" name="nome" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Preço</label>
      <input type="text" class="form-control" name="preco" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição</label>
      <textarea class="form-control" name="descricao" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Imagem</label>
      <input type="file" class="form-control" name="imagem" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <button onclick="history.back()" class="btn btn-secondary">Voltar</button>
    <a href="./dashboard.php" class="btn btn-secondary">Início</a>
  </form>
</body>

</html>