<!-- app/Views/Court/deleteConfirm.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Excluir Quadra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Excluir Quadra</h1>
    <p>Tem certeza que deseja excluir a quadra <strong><?= esc($court['name']) ?></strong>?</p>

    <form action="/court/delete/<?= $court['id'] ?>" method="post">
      <button type="submit" class="btn btn-danger">Sim, excluir</button>
      <a href="/court" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
