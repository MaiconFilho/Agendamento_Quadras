<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Lista de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Lista de Usuários</h1>
      <a href="/dashboard" class="btn btn-secondary">← Voltar ao Menu Principal</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/user/create" class="btn btn-primary mb-3">Novo Usuário</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th><th>Nome</th><th>Email</th><th>Tipo</th><th>Data Criação</th><th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
          <td><?= esc($user['id']) ?></td>
          <td><?= esc($user['name']) ?></td>
          <td><?= esc($user['email']) ?></td>
          <td>
            <?php if ($user['type'] == 0): ?>
              Cliente
            <?php elseif ($user['type'] == 1): ?>
              Administrador
            <?php else: ?>
              <?= esc($user['type']) ?>
            <?php endif; ?>
          </td>
          <td><?= esc($user['createAt']) ?></td>
          <td>
            <a href="/user/edit/<?= $user['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="/user/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
