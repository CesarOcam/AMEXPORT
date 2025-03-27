function scrapear() {
    // Obtiene la URL ingresada en el formulario
    var url = document.getElementById("urlInput").value;
    
    // Si no hay URL, no hacemos nada
    if (!url) {
        alert("Por favor, ingresa una URL.");
        return;
    }

    // Realiza una solicitud AJAX al servidor
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/server.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Cuando la solicitud se complete, maneja la respuesta
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            
            // Verifica si hay algún error
            if (response.error) {
                alert("Hubo un error en el scraping: " + response.error);
            } else {
                // Si no hubo error, muestra el contenido en el div 'resultado_scrap'
                document.getElementById("resultado_scrap").innerHTML = response.content;
            }
        } else {
            alert("Hubo un problema con la solicitud.");
        }
    };

    // Envía la URL al servidor
    xhr.send("url=" + encodeURIComponent(url));
}
