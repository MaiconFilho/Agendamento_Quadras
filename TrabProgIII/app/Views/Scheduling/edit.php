<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Editar Agendamento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Editar Agendamento</h1>

    <?php if(session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="/scheduling/update/<?= $scheduling['id'] ?>" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" id="id" class="form-control" value="<?= esc($scheduling['id']) ?>" readonly />
      </div>

      <div class="mb-3">
        <label for="idUser" class="form-label">ID Usuário</label>
        <input type="text" name="idUser" id="idUser" class="form-control" value="<?= esc(old('idUser', $scheduling['idUser'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="idCourt" class="form-label">ID Quadra</label>
        <input type="text" name="idCourt" id="idCourt" class="form-control" value="<?= esc(old('idCourt', $scheduling['idCourt'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="scheduleDate" class="form-label">Data Agendamento</label>
        <input type="date" name="scheduleDate" id="scheduleDate" class="form-control" value="<?= esc(old('scheduleDate', $scheduling['scheduleDate'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="initialTime" class="form-label">Horário Início</label>
        <input type="time" name="initialTime" id="initialTime" class="form-control" value="<?= esc(old('initialTime', $scheduling['initialTime'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="endTime" class="form-label">Horário Fim</label>
        <input type="time" name="endTime" id="endTime" class="form-control" value="<?= esc(old('endTime', $scheduling['endTime'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="obs" class="form-label">Observações</label>
        <textarea name="obs" id="obs" class="form-control" rows="3"><?= esc(old('obs', $scheduling['obs'])) ?></textarea>
      </div>
      <div class="mb-3">
        <label for="createAt" class="form-label">Data Criação</label>
        <input type="date" name="createAt" id="createAt" class="form-control" value="<?= esc(old('createAt', $scheduling['createAt'])) ?>" required />
      </div>
      <button type="submit" class="btn btn-success">Atualizar</button>
      <a href="/scheduling" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html> 