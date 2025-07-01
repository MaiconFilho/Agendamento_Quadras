<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .quadra-card {
      cursor: pointer;
      transition: transform 0.2s;
      height: 100%;
    }
    .quadra-card:hover {
      transform: scale(1.02);
    }
    .carousel-item {
      padding: 0 10px;
    }
    .carousel-control-prev,
    .carousel-control-next {
      width: 5%;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: rgba(0,0,0,0.5);
      border-radius: 50%;
      padding: 10px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
  <a class="navbar-brand" href="#">Quadra+ Dashboard</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="/user">Usuários</a></li>
      <li class="nav-item"><a class="nav-link" href="/court">Quadras</a></li>
      <li class="nav-item"><a class="nav-link" href="/scheduling">Agendamentos</a></li>
      <li class="nav-item"><a class="nav-link" href="/auth/logout">Sair</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
  <h2 class="mb-4">Quadras Disponíveis</h2>

  <?php if (empty($courts)): ?>
    <div class="alert alert-info">
      <h4>Nenhuma quadra disponível no momento.</h4>
      <p>Entre em contato com o administrador para mais informações.</p>
    </div>
  <?php else: ?>
    <div id="quadrasCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php 
        $totalCourts = count($courts);
        $courtsPerSlide = 3; // Número de quadras por slide
        $slides = ceil($totalCourts / $courtsPerSlide);
        
        for ($i = 0; $i < $slides; $i++): 
          $startIndex = $i * $courtsPerSlide;
          $endIndex = min($startIndex + $courtsPerSlide, $totalCourts);
        ?>
          <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
            <div class="row">
              <?php for ($j = $startIndex; $j < $endIndex; $j++): ?>
                <?php $court = $courts[$j]; ?>
                <div class="col-md-4">
                  <div class="card quadra-card" onclick="location.href='/scheduling/create?user_id=<?= $loggedUserId ?>&court_id=<?= $court['id'] ?>'">
                    <div class="card-body">
                      <h5 class="card-title"><?= esc($court['name']) ?></h5>
                      <p class="card-text">
                        <strong>Local:</strong> <?= esc($court['location']) ?><br>
                        <strong>Status:</strong> 
                        <span class="badge bg-success">Ativo</span>
                      </p>
                      <p class="text-primary fw-bold text-center mb-0" style="font-size: 1.1rem; cursor: pointer;">
                        Clique aqui para agendar
                      </p>
                    </div>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
          </div>
        <?php endfor; ?>
      </div>
      
      <?php if ($slides > 1): ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#quadrasCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#quadrasCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
        </button>
        
        <div class="carousel-indicators">
          <?php for ($i = 0; $i < $slides; $i++): ?>
            <button type="button" data-bs-target="#quadrasCarousel" data-bs-slide-to="<?= $i ?>" 
                    class="<?= $i === 0 ? 'active' : '' ?>" aria-current="<?= $i === 0 ? 'true' : 'false' ?>" 
                    aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
