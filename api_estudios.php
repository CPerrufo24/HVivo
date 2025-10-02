
<?php
header('Content-Type: application/json');
include 'config.php';

// Validación de parámetros
$categoria = $_GET['categoria'] ?? null;
$offset = $_GET['offset'] ?? null;
$busqueda = $_GET['busqueda'] ?? null;

if (!$categoria) {
    http_response_code(400);
    echo json_encode(['error' => 'Categoría no especificada']);
    exit;
}

// Sanitizar entrada
$categoria = htmlspecialchars(trim($categoria));
if ($busqueda) {
    $busqueda = htmlspecialchars(trim($busqueda));
}

// Construir filtro
$filtro = "{Categoría}='{$categoria}'";

if ($busqueda && strlen($busqueda) > 0) {
    $busquedaLower = strtolower($busqueda);
    $filtro = "AND({Categoría}='{$categoria}', OR(FIND('{$busquedaLower}', LOWER({Nombre del estudio})), FIND('{$busquedaLower}', LOWER({Descripción}))))";
}

// Construir URL
$url = "https://api.airtable.com/v0/" . AIRTABLE_BASE_ID . "/" . AIRTABLE_TABLE_NAME .
       "?filterByFormula=" . urlencode($filtro) . "&maxRecords=20";

if ($offset) {
    $url .= "&offset=" . urlencode($offset);
}

// Realizar petición
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . AIRTABLE_TOKEN
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

// Validar respuesta
if ($error) {
    http_response_code(500);
    echo json_encode(['error' => 'Error de conexión: ' . $error]);
    exit;
}

if ($httpCode !== 200) {
    http_response_code($httpCode);
    echo json_encode(['error' => 'Error de API: ' . $httpCode]);
    exit;
}

$data = json_decode($response, true);

if (!$data) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al procesar respuesta JSON']);
    exit;
}

// Procesar y limpiar datos
if (isset($data['records']) && is_array($data['records'])) {
    foreach ($data['records'] as &$record) {
        if (isset($record['fields'])) {
            // Limpiar descripción
            if (isset($record['fields']['Descripción'])) {
                $desc = $record['fields']['Descripción'];
                if (is_array($desc)) {
                    $desc = implode(" ", $desc);
                }
                $record['fields']['Descripción'] = preg_replace('/^generated\s*/i', '', $desc);
            }
            
            // Asegurar que el precio sea string
            if (isset($record['fields']['Precio'])) {
                $record['fields']['Precio'] = (string)$record['fields']['Precio'];
            }
        }
    }
}

echo json_encode($data);
?>
