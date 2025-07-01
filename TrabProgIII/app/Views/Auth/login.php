<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
<div class="container">
  <h2>Login</h2>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <form action="/auth/login" method="post">
    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" name="email" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="pwd" class="form-label">Senha</label>
      <input type="password" name="pwd" class="form-control" required />
    </div>
    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-primary">Entrar</button>
      <a href="/user/register" class="btn btn-outline-secondary">Registre-se</a>
    </div>
  </form>
</div>
</body>
</html>
