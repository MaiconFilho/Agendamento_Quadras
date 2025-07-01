<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Registro de Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Registro de Usuário</h1>

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

    <form action="/user/storeRegister" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" id="id" class="form-control" value="<?= old('id') ?>" required />
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>" required />
      </div>
      <div class="mb-3">
        <label for="pwd" class="form-label">Senha</label>
        <input type="password" name="pwd" id="pwd" class="form-control" required />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required />
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Tipo</label>
        <input type="number" name="type" id="type" class="form-control" value="0" readonly />
        <small class="form-text text-muted">Tipo de usuário: Cliente (padrão)</small>
      </div>
      <div class="mb-3">
        <label for="createAt" class="form-label">Data Criação</label>
        <input type="date" name="createAt" id="createAt" class="form-control" value="<?= old('createAt', date('Y-m-d')) ?>" required />
      </div>
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">Registrar</button>
        <a href="/auth" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
</body>
</html> 