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
            try {
                const jsonResponse = JSON.parse(xhr.responseText);
                if (jsonResponse.error) {
                    alert("Error en el scraping: " + jsonResponse.error);
                } else {
                    document.getElementById("resultado_scrap").innerHTML = jsonResponse.content;
                }
            } catch (error) {
                alert("Error al procesar la respuesta del servidor.");
            }
        } else {
            alert("Hubo un problema con la solicitud.");
        }
    };
    

    // Envía la URL al servidor
    xhr.send("url=" + encodeURIComponent(url));
}
