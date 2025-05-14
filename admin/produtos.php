<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}
include('../includes/db.php');
$result = mysqli_query($conn, "SELECT * FROM produtos");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Admin - Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
  <h2>Lista de Produtos</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['nome']; ?></td>
          <td>R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></td>
          <td><a href="editar_produto.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <button onclick="history.back()" class="btn btn-secondary">Voltar</button>
  <a href="./dashboard.php" class="btn btn-secondary">Início</a>
</body>

</html>