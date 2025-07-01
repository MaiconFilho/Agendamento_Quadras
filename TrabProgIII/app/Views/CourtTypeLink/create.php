<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Nova Ligação Quadra-Tipo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Criar Ligação Quadra-Tipo</h1>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="/courttypelink/store" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" id="id" class="form-control" value="<?= old('id') ?>" required />
      </div>
      <div class="mb-3">
        <label for="idCourt" class="form-label">ID Quadra</label>
        <input type="text" name="idCourt" id="idCourt" class="form-control" value="<?= old('idCourt') ?>" required />
      </div>
      <div class="mb-3">
        <label for="idCourtType" class="form-label">ID Tipo de Quadra</label>
        <input type="text" name="idCourtType" id="idCourtType" class="form-control" value="<?= old('idCourtType') ?>" required />
      </div>
      <div class="mb-3">
        <label for="createAt" class="form-label">Data Criação</label>
        <input type="date" name="createAt" id="createAt" class="form-control" value="<?= old('createAt', date('Y-m-d')) ?>" required />
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
      <a href="/courttypelink" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html> 