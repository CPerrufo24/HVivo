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

echo "<h1>Catálogo de Estudios</h1>";

foreach ($estudios as $registro) {
  $campos = $registro['fields'] ?? [];

  $nombre        = $campos['Nombre del estudio'] ?? 'Sin título';
  $precio        = $campos['Precio'] ?? 'No disponible';
  $descripcionRaw= $campos['Descripción'] ?? 'Sin descripción';
  $descripcion   = is_array($descripcionRaw) ? implode(" ", $descripcionRaw) : $descripcionRaw;
  // Eliminar la palabra "generated" si aparece al inicio
  $descripcion = preg_replace('/^generated\s*/i', '', $descripcion);
  $categoria     = $campos['Categoría'] ?? 'Sin categoría';
  $slug          = $campos['Slug'] ?? 'Sin slug';
  $imagenUrl     = isset($campos['Imagen'][0]['url']) ? $campos['Imagen'][0]['url'] : null;

  echo "<div style='margin-bottom:2em'>";
  echo "<h2>$nombre</h2>";
  echo "<p><strong>Precio:</strong> $ $precio</p>";
  echo "<p>$descripcion</p>";

  if ($imagenUrl) {
    echo "<img src='$imagenUrl' alt='Imagen del estudio' style='max-width:300px'>";
  }

  echo "<p><strong>Categoría:</strong> $categoria</p>";
  echo "<p><a href='estudio.php?slug=$slug'>Ver más detalles</a></p>";
  echo "</div><hr>";
}
?>

