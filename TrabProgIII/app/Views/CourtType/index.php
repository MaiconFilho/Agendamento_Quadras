<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Lista de Tipos de Quadra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Lista de Tipos de Quadra</h1>
      <a href="/dashboard" class="btn btn-secondary">← Voltar ao Menu Principal</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/courttype/create" class="btn btn-primary mb-3">Novo Tipo de Quadra</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th><th>Nome</th><th>Descrição</th><th>Data Criação</th><th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($courtTypes as $courtType): ?>
        <tr>
          <td><?= esc($courtType['id']) ?></td>
          <td><?= esc($courtType['name']) ?></td>
          <td><?= esc($courtType['desc']) ?></td>
          <td><?= esc($courtType['createAt']) ?></td>
          <td>
            <a href="/courttype/edit/<?= $courtType['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="/courttype/delete/<?= $courtType['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html> 