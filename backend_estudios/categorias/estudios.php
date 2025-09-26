<?php
include 'config.php';

// Construir la URL de la API
$url = "https://api.airtable.com/v0/" . AIRTABLE_BASE_ID . "/" . AIRTABLE_TABLE_NAME;

// Configurar la petición cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Authorization: Bearer " . AIRTABLE_TOKEN
]);

// Ejecutar la petición
$response = curl_exec($ch);
curl_close($ch);

// Procesar la respuesta
$data = json_decode($response, true);
$estudios = $data['records'] ?? [];

<h1>Catálogo de Estudios</h1>

<div class="grid-estudios">
<?php foreach ($estudios as $registro): 
  $campos = $registro['fields'] ?? [];

  $nombre        = $campos['Nombre del estudio'] ?? 'Sin título';
  $precio        = $campos['Precio'] ?? 'No disponible';
  $descripcionRaw= $campos['Descripción'] ?? 'Sin descripción';
  $descripcion   = is_array($descripcionRaw) ? implode(" ", $descripcionRaw) : $descripcionRaw;
  $descripcion   = preg_replace('/^generated\s*/i', '', $descripcion);
  $slug          = $campos['Slug'] ?? 'Sin slug';
?>
  <div class="tarjeta-estudio">
    <h3><?= htmlspecialchars($nombre) ?></h3>
    <p class="descripcion"><?= htmlspecialchars($descripcion) ?></p>
    <p class="precio">$<?= htmlspecialchars($precio) ?></p>
    <a href="/vivo/estudio.php?slug=<?= urlencode($slug) ?>" class="btn-detalles">Ver más detalles</a>
  </div>
<?php endforeach; ?>
</div>