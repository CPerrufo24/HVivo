<?php
include ''../../config.php'';
include 'header.php'; // mismo head/estilos del sitio

// FILTRO: debe coincidir exactamente con el valor en Airtable (espacios/acentos/mayúsculas)
$categoría = 'RAYOS X';

$url = "https://api.airtable.com/v0/" . AIRTABLE_BASE_ID . "/" . AIRTABLE_TABLE_NAME .
       "?filterByFormula=" . urlencode("{Categoría}='{$categoría}'");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Authorization: Bearer " . AIRTABLE_TOKEN
]);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
$estudios = $data['records'] ?? [];
?>

<div class="container mt-5">
  <h1 class="mb-4">Rayos X</h1>

  <?php if (empty($estudios)): ?>
    <p>No hay estudios disponibles en esta categoría.</p>
  <?php else: ?>
    <div class="row">
      <?php foreach ($estudios as $registro):
        $f = $registro['fields'] ?? [];
        $nombre    = $f['Nombre del estudio'] ?? 'Sin título';
        $precio    = $f['Precios'] ?? 'No disponible';
        $slug      = $f['Slug'] ?? '';
        $imagenUrl = isset($f['Imagen'][0]['url']) ? $f['Imagen'][0]['url'] : 'assets/images/default.jpg';
      ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="<?= $imagenUrl ?>" class="card-img-top" alt="<?= htmlspecialchars($nombre) ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlspecialchars($nombre) ?></h5>
            <p class="card-text"><strong>Precio:</strong> $<?= htmlspecialchars($precio) ?></p>
            <a href="estudio.php?slug=<?= urlencode($slug) ?>" class="btn btn-primary mt-auto">Ver más detalles</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
