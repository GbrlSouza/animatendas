<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  if ($usuario === 'admin' && $senha === '123456') {
    $_SESSION['admin'] = true;
    header('Location: dashboard.php');
    exit;
  } else {
    $erro = "Usuário ou senha inválidos.";
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Área Administrativa</h2>
  <?php if (!empty($erro)) echo "<div class='alert alert-danger'>$erro</div>"; ?>
  <form method="post">
    <div class="mb-3">
      <label for="usuario" class="form-label">Usuário</label>
      <input type="text" class="form-control" name="usuario" required>
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label">Senha</label>
      <input type="password" class="form-control" name="senha" required>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
    <button onclick="history.back()" class="btn btn-secondary">Voltar</button>
    <a href="./../pages/index.php" class="btn btn-secondary">Home</a>
  </form>
</body>
</html>