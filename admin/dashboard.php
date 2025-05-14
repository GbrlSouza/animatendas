<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}
include('../includes/db.php');

// Consulta: total de produtos
$total_produtos = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM produtos"))['total'];

// Consulta: últimos 5 produtos
$ultimos_produtos = mysqli_query($conn, "SELECT nome, preco, created_at FROM produtos ORDER BY id DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Admin - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Painel Administrativo - Anima Tendas</span>
      <a href="./logout.php" class="btn btn-danger">Sair</a>
    </div>
  </nav>

  <div class="container mt-5">
    <h2 class="mb-4">Resumo Geral</h2>

    <div class="row mb-4">
      <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body">
            <h5 class="card-title">Total de Produtos</h5>
            <p class="card-text display-5"><?php echo $total_produtos; ?></p>
          </div>
        </div>
      </div>
      <!-- Você pode adicionar mais cards aqui futuramente -->
    </div>

    <h4 class="mt-5">Gráfico de Cadastro de Produtos (Ano Atual)</h4>
    <canvas id="produtosChart" height="100"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById('produtosChart').getContext('2d');

      const produtosChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [<?php
                    // Labels = meses
                    for ($m = 1; $m <= 12; $m++) {
                      echo '"' . date('M', mktime(0, 0, 0, $m, 1)) . '",';
                    }
                    ?>],
          datasets: [{
            label: 'Produtos cadastrados',
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            data: [<?php
                    $anoAtual = date('Y');
                    for ($m = 1; $m <= 12; $m++) {
                      $inicio = "$anoAtual-$m-01";
                      $fim = "$anoAtual-$m-31";
                      $qtd = mysqli_fetch_assoc(mysqli_query($conn, "
                SELECT COUNT(*) as total FROM produtos 
                WHERE created_at BETWEEN '$inicio' AND '$fim'
              "))['total'];
                      echo $qtd . ',';
                    }
                    ?>]
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 1
              }
            }
          }
        }
      });
    </script>
    <a href="produtos.php" class="btn btn-primary mt-3">Gerenciar Produtos</a>
    <a href="novo-produto.php" class="btn btn-success mt-3">Adicionar Novo Produto</a>
  </div>
</body>
</html>