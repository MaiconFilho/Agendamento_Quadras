<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Excluir Agendamento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Excluir Agendamento</h1>
    <p>Tem certeza que deseja excluir o agendamento <strong>ID: <?= esc($scheduling['id']) ?></strong>?</p>

    <form action="/scheduling/delete/<?= $scheduling['id'] ?>" method="post">
      <button type="submit" class="btn btn-danger">Sim, excluir</button>
      <a href="/scheduling" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html> 