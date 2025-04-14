<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('conexion.php');

$url = "https://n8n.agentesamexport.com/webhook/scriptcase-webhook";

// Consulta SQL
$query = "SELECT 
    `500_iniciodepedimento`.id500_inicio_de_pedimento,
    `500_iniciodepedimento`.resultado_saai,
    `500_iniciodepedimento`.user_resultado_saai
FROM
    `500_iniciodepedimento`";


// Preparar y ejecutar la consulta usando PDO
$stmt = $pdo->prepare($query);
$stmt->execute();

// Obtener los resultados
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se obtuvieron resultados
if ($result) {
    // Construir el array con los resultados
    $numIntegraciones = [];
    
    foreach ($result as $row) {
        $numIntegraciones[] = [
            "id" => (int)$row['id500_inicio_de_pedimento'],
            "resultado" => $row['resultado_saai'],
            "usuario" => $row['user_resultado_saai']
        ];
    }
    
    // Convertir a JSON
    header('Content-Type: application/json');
    $json_data = json_encode(["chatInput" => $numIntegraciones]);

    // Configurar cURL
    $ch = curl_init();

    $url_con_parametros = $url . '?data=' . urlencode($json_data);

    curl_setopt($ch, CURLOPT_URL, $url_con_parametros);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    
    $response = curl_exec($ch);
    
    // Manejo de errores de cURL
    if (curl_errno($ch)) {
        echo json_encode(["error" => curl_error($ch)]);
    } else {
        // Validación: ¿la respuesta está vacía o es inválida?
        if (empty($response)) {
            echo json_encode(["error" => "La respuesta del webhook está vacía."]);
        } elseif (json_decode($response) === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(["error" => "La respuesta del webhook no es un JSON válido."]);
        } else {
            
            echo $response;
        }
    }
    
    $response = curl_exec($ch);

    
    curl_close($ch);
} else {
    // Si no se obtienen resultados, devuelve un JSON con un mensaje de error
    echo json_encode(["error" => "No se encontraron registros"]);
}



/**/
?>









