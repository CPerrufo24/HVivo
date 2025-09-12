<?php
include 'config.php';

$slug = $_GET['slug'] ?? '';

if (!$slug) {
  echo "<p>Slug no proporcionado.</p>";
  exit;
}

// Construir la URL con filtro por slug
$url = "https://api.airtable.com/v0/" . AIRTABLE_BASE_ID . "/" . AIRTABLE_TABLE_NAME .
       "?filterByFormula=" . urlencode("{Slug}='$slug'");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Authorization: Bearer " . AIRTABLE_TOKEN
]);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
$registro = $data['records'][0]['fields'] ?? null;

if (!$registro) {
  echo "<p>Estudio no encontrado.</p>";
  exit;
}

// Procesar campos con nombres reales de Airtable
$nombre        = $registro['Nombre del estudio'] ?? 'Sin título';
$precio        = $registro['Precio'] ?? 'No disponible';
$descripcionRaw= $registro['Descripción'] ?? 'Sin descripción';
$descripcion   = is_array($descripcionRaw) ? implode(" ", $descripcionRaw) : $descripcionRaw;
$descripcion   = preg_replace('/^generated\s*/i', '', $descripcion);
$categoria     = $registro['Categoría'] ?? 'Sin categoría';
$imagenUrl     = isset($registro['Imagen'][0]['url']) ? $registro['Imagen'][0]['url'] : 'assets/images/default.jpg';

// Incluir la plantilla visual
include 'plantilla_estudio.php';
