<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Excluir Tipo de Quadra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Excluir Tipo de Quadra</h1>
    <p>Tem certeza que deseja excluir o tipo de quadra <strong><?= esc($courtType['name']) ?></strong>?</p>

    <form action="/courttype/delete/<?= $courtType['id'] ?>" method="post">
      <button type="submit" class="btn btn-danger">Sim, excluir</button>
      <a href="/courttype" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html> 