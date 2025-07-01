<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Editar Tipo de Quadra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Editar Tipo de Quadra</h1>

    <?php if(session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="/courttype/update/<?= $courtType['id'] ?>" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" id="id" class="form-control" value="<?= esc($courtType['id']) ?>" readonly />
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= esc(old('name', $courtType['name'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Descrição</label>
        <textarea name="desc" id="desc" class="form-control" rows="3"><?= esc(old('desc', $courtType['desc'])) ?></textarea>
      </div>
      <div class="mb-3">
        <label for="createAt" class="form-label">Data Criação</label>
        <input type="date" name="createAt" id="createAt" class="form-control" value="<?= esc(old('createAt', $courtType['createAt'])) ?>" required />
      </div>
      <button type="submit" class="btn btn-success">Atualizar</button>
      <a href="/courttype" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html> 