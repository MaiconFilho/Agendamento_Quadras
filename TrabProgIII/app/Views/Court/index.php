<!-- app/Views/Court/index.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Lista de Quadras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Lista de Quadras</h1>
      <a href="/dashboard" class="btn btn-secondary">← Voltar ao Menu Principal</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/court/create" class="btn btn-primary mb-3">Nova Quadra</a>

    <?php if(session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if (!empty($courts)): ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th><th>Nome</th><th>Local</th><th>Status</th><th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($courts as $court): ?>
          <tr>
            <td><?= esc($court['id']) ?></td>
            <td><?= esc($court['name']) ?></td>
            <td><?= esc($court['location']) ?></td>
            <td><?= esc($court['status']) ?></td>
            <td>
              <a href="/court/edit/<?= $court['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
              <a href="/court/delete/<?= $court['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Nenhuma quadra cadastrada.</p>
    <?php endif; ?>
  </div>
</body>
</html>
