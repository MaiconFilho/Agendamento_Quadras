<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Excluir Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Excluir Usuário</h1>
    <p>Tem certeza que deseja excluir o usuário <strong><?= esc($user['name']) ?></strong>?</p>

    <form action="/user/delete/<?= $user['id'] ?>" method="post">
      <button type="submit" class="btn btn-danger">Sim, excluir</button>
      <a href="/user" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
