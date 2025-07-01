<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Lista de Ligações Quadra-Tipo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Lista de Ligações Quadra-Tipo</h1>
      <a href="/dashboard" class="btn btn-secondary">← Voltar ao Menu Principal</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/courttypelink/create" class="btn btn-primary mb-3">Nova Ligação</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th><th>ID Quadra</th><th>ID Tipo de Quadra</th><th>Data Criação</th><th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($courtTypeLinks as $courtTypeLink): ?>
        <tr>
          <td><?= esc($courtTypeLink['id']) ?></td>
          <td><?= esc($courtTypeLink['idCourt']) ?></td>
          <td><?= esc($courtTypeLink['idCourtType']) ?></td>
          <td><?= esc($courtTypeLink['createAt']) ?></td>
          <td>
            <a href="/courttypelink/edit/<?= $courtTypeLink['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="/courttypelink/delete/<?= $courtTypeLink['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html> 