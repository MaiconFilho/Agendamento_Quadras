<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Editar Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Editar Usuário</h1>

    <?php if(session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="/user/update/<?= $user['id'] ?>" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" id="id" class="form-control" value="<?= esc($user['id']) ?>" readonly />
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= esc(old('name', $user['name'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="pwd" class="form-label">Senha</label>
        <input type="password" name="pwd" id="pwd" class="form-control" />
        <small class="form-text text-muted">Deixe em branco para manter a senha atual</small>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= esc(old('email', $user['email'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Tipo</label>
        <select name="type" id="type" class="form-select" required>
          <option value="">Selecione um tipo</option>
          <option value="0" <?= (old('type', $user['type']) == '0') ? 'selected' : '' ?>>Cliente</option>
          <option value="1" <?= (old('type', $user['type']) == '1') ? 'selected' : '' ?>>Administrador</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="createAt" class="form-label">Data Criação</label>
        <input type="date" name="createAt" id="createAt" class="form-control" value="<?= esc(old('createAt', $user['createAt'])) ?>" required />
      </div>
      <button type="submit" class="btn btn-success">Atualizar</button>
      <a href="/user" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
