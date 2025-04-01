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
    xhr.open("POST", "../../php/modulos/server.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Cuando la solicitud se complete, maneja la respuesta
    xhr.onload = function() {
        console.log(xhr.responseText);
        if (xhr.status === 200) {
            // Primero verificamos si la respuesta tiene formato JSON
            try {
                // Intenta parsear como JSON
                const jsonResponse = JSON.parse(xhr.responseText);
                console.log(jsonResponse); // Si es JSON válido, lo procesamos
                
                // Verifica si hay algún error en el scraping
                if (jsonResponse.error) {
                    alert("Hubo un error en el scraping: " + jsonResponse.error);
                } else {
                    // Si no hubo error, muestra el contenido en el div 'resultado_scrap'
                    document.getElementById("resultado_scrap").innerHTML = jsonResponse.content;
                }
            } catch (error) {
                // Si no se puede parsear como JSON, asume que es HTML
                console.log("Respuesta no es JSON, se trata como HTML.");
                document.getElementById("resultado_scrap").innerHTML = xhr.responseText;
            }
        } else {
            alert("Hubo un problema con la solicitud.");
        }
    };

    // Envía la URL al servidor
    console.log("URL enviada: " + url);
    xhr.send("url=" + encodeURIComponent(url));

}
