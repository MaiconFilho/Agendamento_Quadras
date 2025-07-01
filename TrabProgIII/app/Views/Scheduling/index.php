<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Lista de Agendamentos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Lista de Agendamentos</h1>
      <a href="/dashboard" class="btn btn-secondary">← Voltar ao Menu Principal</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/scheduling/create" class="btn btn-primary mb-3">Novo Agendamento</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th><th>ID Usuário</th><th>ID Quadra</th><th>Data Agendamento</th><th>Horário Início</th><th>Horário Fim</th><th>Observações</th><th>Data Criação</th><th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($schedulings as $scheduling): ?>
        <tr>
          <td><?= esc($scheduling['id']) ?></td>
          <td><?= esc($scheduling['idUser']) ?></td>
          <td><?= esc($scheduling['idCourt']) ?></td>
          <td><?= esc($scheduling['scheduleDate']) ?></td>
          <td>
            <?php 
              if (!empty($scheduling['initialTime'])) {
                echo esc(substr($scheduling['initialTime'], 0, 5));
              } else {
                echo '<span class="text-muted">-</span>';
              }
            ?>
          </td>
          <td>
            <?php 
              if (!empty($scheduling['endTime'])) {
                echo esc(substr($scheduling['endTime'], 0, 5));
              } else {
                echo '<span class="text-muted">-</span>';
              }
            ?>
          </td>
          <td><?= esc($scheduling['obs']) ?></td>
          <td><?= esc($scheduling['createAt']) ?></td>
          <td>
            <a href="/scheduling/edit/<?= $scheduling['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="/scheduling/delete/<?= $scheduling['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html> 