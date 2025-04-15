<?php
header('Content-Type: application/json');

$url = "https://n8n.agentesamexport.com/webhook/scriptcase-webhook";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["error" => "Error cURL: " . curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

// Intentamos decodificar JSON (en caso de éxito del webhook)
$json = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([
        "error" => "La respuesta del webhook no es JSON válido.",
        "respuesta_cruda" => $response
    ]);
} else {
    echo json_encode($json);
}




