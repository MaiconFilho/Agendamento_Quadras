<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Excluir Ligação Quadra-Tipo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Excluir Ligação Quadra-Tipo</h1>
    <p>Tem certeza que deseja excluir a ligação <strong>ID: <?= esc($courtTypeLink['id']) ?></strong>?</p>

    <form action="/courttypelink/delete/<?= $courtTypeLink['id'] ?>" method="post">
      <button type="submit" class="btn btn-danger">Sim, excluir</button>
      <a href="/courttypelink" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html> 