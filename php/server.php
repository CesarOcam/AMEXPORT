<?php
if(isset($_POST['url'])){
    $url = $_POST['url'];

    // Crear un contexto con la opción de desactivar la verificación SSL
    $options = [
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true,
            "crypto_method" => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT
        ]
    ];
    
    // Crear el contexto
    $context = stream_context_create($options);
    
    // Obtener el contenido de la URL
    $response = file_get_contents($url, false, $context);

    // Verificar si la respuesta fue exitosa
    if ($response === false) {
        echo json_encode(['error' => 'Error al obtener el contenido']);
    } else {
        echo json_encode(['content' => $response]);
    }
}
?>
