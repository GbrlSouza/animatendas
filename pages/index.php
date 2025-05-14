<?php include('./../includes/header.php'); ?>
<div class="container mt-4">

  <!-- Carrossel com SVGs -->
  <div id="mainCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./../assets/img/banner1.svg" class="d-block w-100" alt="Banner 1">
      </div>
      <div class="carousel-item">
        <img src="./../assets/img/banner2.svg" class="d-block w-100" alt="Banner 2">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>

  <section class="hero-section text-center bg-light py-5">
    <div class="container">
      <h1 class="display-4 fw-bold">Soluções em Coberturas e Estruturas</h1>
      <p class="lead">Locação de tendas, palcos, coberturas e muito mais para o seu evento.</p>
      <a href="./contato.php" class="btn btn-primary btn-lg mt-3">Solicite um Orçamento</a>
    </div>
  </section>

  <section class="features py-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4">
          <img src="./../assets/img/icone1.svg" class="mb-3" width="60">
          <h5 class="fw-bold">Atendimento Personalizado</h5>
          <p>Equipe pronta pra entender o que seu evento precisa.</p>
        </div>
        <div class="col-md-4">
          <img src="./../assets/img/icone2.svg" class="mb-3" width="60">
          <h5 class="fw-bold">Segurança e Qualidade</h5>
          <p>Materiais resistentes, tudo certificado e seguro.</p>
        </div>
        <div class="col-md-4">
          <img src="./../assets/img/icone3.svg" class="mb-3" width="60">
          <h5 class="fw-bold">Cobertura em Todo o Brasil</h5>
          <p>Levamos a estrutura onde seu evento estiver.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Produtos em destaque -->
  <h2 class="text-center mb-4">Mais Buscados</h2>
  <div class="row">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM produtos ORDER BY RAND() LIMIT 4");
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="col-md-3 mb-4">';
      echo '<div class="card h-100">';
      echo '<img src="./../assets/img/' . $row['imagem'] . '" class="card-img-top" alt="' . $row['nome'] . '">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">' . $row['nome'] . '</h5>';
      echo '<p class="card-text">R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>';
      echo '<a href="produto.php?id=' . $row['id'] . '" class="btn btn-outline-primary w-100">Ver Detalhes</a>';
      echo '</div></div></div>';
    }
    ?>
  </div>

  <!-- Seção institucional -->
  <div class="bg-light p-5 rounded mt-5 text-center">
    <h3>Bem-vindo à Anima Tendas</h3>
    <p>Especializados na fabricação de tendas para eventos, com entrega em todo o Brasil.</p>
    <a href="sobre.php" class="btn btn-primary">Saiba Mais</a>
  </div>

</div>
<?php include('./../includes/footer.php'); ?>