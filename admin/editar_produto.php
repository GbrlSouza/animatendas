<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include('./../includes/db.php');

if (!isset($_GET['id'])) {
    echo "Produto não encontrado.";
    exit;
}

$id = intval($_GET['id']);

$query = mysqli_query($conn, "SELECT * FROM produtos WHERE id = $id");
if (mysqli_num_rows($query) == 0) {
    echo "Produto não encontrado.";
    exit;
}

$produto = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $preco = floatval(str_replace(',', '.', $_POST['preco']));
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);

    // Lógica da imagem
    if (!empty($_FILES['imagem']['name'])) {
        $imagem = $_FILES['imagem']['name'];
        $tmp = $_FILES['imagem']['tmp_name'];
        $caminho = '../assets/img/' . $imagem;

        move_uploaded_file($tmp, $caminho);

        $sql = "UPDATE produtos SET nome = '$nome', preco = $preco, descricao = '$descricao', imagem = '$imagem' WHERE id = $id";
    } else {
        $sql = "UPDATE produtos SET nome = '$nome', preco = $preco, descricao = '$descricao' WHERE id = $id";
    }

    mysqli_query($conn, $sql);
    header("Location: produtos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Editar Produto</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required value="<?php echo $produto['nome']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="text" class="form-control" name="preco" required value="<?php echo number_format($produto['preco'], 2, ',', '.'); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" required><?php echo $produto['descricao']; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem Atual</label><br>
            <?php if (!empty($produto['imagem'])) { ?>
                <img src="../assets/img/<?php echo $produto['imagem']; ?>" width="150" alt="Imagem atual">
            <?php } else { ?>
                <p>Sem imagem.</p>
            <?php } ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Nova Imagem (opcional)</label>
            <input type="file" class="form-control" name="imagem">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="produtos.php" class="btn btn-secondary">Cancelar</a>
        <button onclick="history.back()" class="btn btn-secondary">Voltar</button>
        <a href="./dashboard.php" class="btn btn-secondary">Início</a>
    </form>
</body>

</html>