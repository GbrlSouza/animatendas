<?php include('../includes/header.php'); ?>
<div class="container mt-5">
  <h2 class="text-center mb-4">Todos os Produtos</h2>
  <div class="row">
    <?php
      $result = mysqli_query($conn, "SELECT * FROM produtos ORDER BY nome ASC");
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-3 mb-4">';
        echo '<div class="card h-100">';
        echo '<img src="./../assets/img/'.$row['imagem'].'" class="card-img-top" alt="'.$row['nome'].'">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row['nome'].'</h5>';
        echo '<p class="card-text">R$ '.number_format($row['preco'], 2, ',', '.').'</p>';
        echo '<a href="produto.php?id='.$row['id'].'" class="btn btn-outline-primary w-100">Detalhes</a>';
        echo '</div></div></div>';
      }
    ?>
  </div>
</div>
<?php include('../includes/footer.php'); ?>