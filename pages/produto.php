<?php include('../includes/header.php'); ?>
<div class="container mt-5">
  <?php
  $id = intval($_GET['id']);
  $query = mysqli_query($conn, "SELECT * FROM produtos WHERE id = $id LIMIT 1");
  if ($produto = mysqli_fetch_assoc($query)) {
  ?>
    <div class="row">
      <div class="col-md-6">
        <img src="./../assets/img/<?php echo $produto['imagem']; ?>" class="img-fluid" alt="<?php echo $produto['nome']; ?>">
      </div>
      <div class="col-md-6">
        <h1><?php echo $produto['nome']; ?></h1>
        <p class="lead">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
        <p><?php echo $produto['descricao']; ?></p>
        <button onclick="history.back()" class="btn btn-secondary">Voltar</button>
        <a href="./index.php" class="btn btn-secondary">Início</a>
      </div>
    </div>
  <?php } else {
    echo "<p>Produto não encontrado.</p>";
  } ?>
</div>
<?php include('../includes/footer.php'); ?>