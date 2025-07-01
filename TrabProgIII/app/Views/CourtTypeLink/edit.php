<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Editar Ligação Quadra-Tipo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-3">
  <div class="container">
    <h1>Editar Ligação Quadra-Tipo</h1>

    <?php if(session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="/courttypelink/update/<?= $courtTypeLink['id'] ?>" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" id="id" class="form-control" value="<?= esc($courtTypeLink['id']) ?>" readonly />
      </div>

      <div class="mb-3">
        <label for="idCourt" class="form-label">ID Quadra</label>
        <input type="text" name="idCourt" id="idCourt" class="form-control" value="<?= esc(old('idCourt', $courtTypeLink['idCourt'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="idCourtType" class="form-label">ID Tipo de Quadra</label>
        <input type="text" name="idCourtType" id="idCourtType" class="form-control" value="<?= esc(old('idCourtType', $courtTypeLink['idCourtType'])) ?>" required />
      </div>
      <div class="mb-3">
        <label for="createAt" class="form-label">Data Criação</label>
        <input type="date" name="createAt" id="createAt" class="form-control" value="<?= esc(old('createAt', $courtTypeLink['createAt'])) ?>" required />
      </div>
      <button type="submit" class="btn btn-success">Atualizar</button>
      <a href="/courttypelink" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html> 