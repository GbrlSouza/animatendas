<?php include('../includes/header.php'); ?>
<div class="container mt-5">
  <h2>Contato</h2>
  <form action="" method="post">
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="mensagem" class="form-label">Mensagem</label>
      <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>
<?php include('../includes/footer.php'); ?>