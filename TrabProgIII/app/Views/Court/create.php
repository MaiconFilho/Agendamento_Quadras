<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Nova Quadra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Nova Quadra</h1>

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

    <form action="/court/store" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" id="id" class="form-control" value="<?= old('id') ?>" required />
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>" required />
      </div>
      <div class="mb-3">
        <label for="location" class="form-label">Local</label>
        <input type="text" name="location" id="location" class="form-control" value="<?= old('location') ?>" required />
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="1" <?= old('status') === '1' ? 'selected' : '' ?>>Ativo</option>
            <option value="0" <?= old('status') === '0' ? 'selected' : '' ?>>Inativo</option>
          </select>

      </div>
      <div class="mb-3">
        <label for="createAt" class="form-label">Data Criação</label>
        <input type="date" name="createAt" id="createAt" class="form-control" value="<?= old('createAt', date('Y-m-d')) ?>" required />
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
      <a href="/court" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
