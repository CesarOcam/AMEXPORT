<?php
if(isset($_POST['url'])){
    $url = $_POST['url'];

    // Iniciando cURL
    $ch = curl_init();

    // Configurando la URL a la que se va a hacer la solicitud
    curl_setopt($ch, CURLOPT_URL, $url);

    // Indicamos que queremos el contenido de la página como resultado
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Desactivar la verificación SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Ejecutando cURL
    $response = curl_exec($ch);

    // Verificando si hubo algún error con la solicitud
    if(curl_errno($ch)){
        echo json_encode(['error' => curl_error($ch)]);
    } else {
        echo json_encode(['content' => $response]);
    }

    // Cerrando la conexión cURL
    curl_close($ch);
}
?>
